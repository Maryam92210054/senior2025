<?php
namespace App\Http\Controllers;
use App\Models\Meal;
use App\Models\Goal;
use App\Models\MealType;
use App\Models\Restriction;
use Illuminate\Http\Request;


class MealController extends Controller
{
    public function meals()
    {
        $goals = Goal::with(['meals' => function ($query) {
            $query->where('availability', 1); 
        }])->get(); 
        
        return view('viewMeals', compact('goals'));
    }
    public function index(Request $request)
    {
        // Retrieve all meal types, goals, and restrictions for the filter form
        $types = MealType::all();
        $goals = Goal::all();
        $restrictions = Restriction::all();

        // Initialize the meals query
        $mealsQuery = Meal::query();

        // Apply search filter
        if ($search = $request->input('search')) {
            $mealsQuery->where('name', 'like', '%' . $search . '%');
        }

        // Apply meal type filter
        if ($mealTypeId = $request->input('meal_type_id')) {
            $mealsQuery->where('meal_type_id', $mealTypeId);
        }

        // Apply goal filter
        if ($goalId = $request->input('goal_id')) {
            $mealsQuery->where('goal_id', $goalId);
        }

        // Apply dietary restrictions filter
        if ($restrictionIds = $request->input('restrictions')) {
            $mealsQuery->whereHas('restrictions', function ($query) use ($restrictionIds) {
                $query->whereIn('restrictions.id', $restrictionIds);
            });
        }

        // Paginate the filtered results
        $meals = $mealsQuery->paginate(10);

        // Pass data to the view
        return view('meals.index', compact('meals', 'search', 'types', 'goals', 'restrictions'));
    }


    public function show($mealId) {
       
        $singleMealFromDb= Meal::find($mealId);
        if (is_null( $singleMealFromDb)){
            return redirect()->route('meals.index');
        }
        return view('meals.show',['meal'=>$singleMealFromDb]);
    
    }
    public function create()
    {
       
        $goals = Goal::all(); 
        $types = MealType::all();   
        $restrictions = Restriction::all();   
    
        return view('meals.create', ['goals' => $goals, 'types' => $types,'restrictions'=>$restrictions]);
    }
    
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'health_info' => 'required|string',
            'goal_id' => 'required|exists:goals,id',
            'meal_type_id' => 'required|exists:meal_types,id',
            'restrictions' => 'nullable|array',
            'restrictions.*' => 'exists:restrictions,id',
            'meal_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('meal_image')) {
          
            $imageName = $request->file('meal_image')->getClientOriginalName();
        
          
            $request->file('meal_image')->move(public_path('mealsImages'), $imageName);
        }
        

      
        $meal = new Meal();
        $meal->name = $validated['name'];
        $meal->description = $validated['description'];
        $meal->health_info = $validated['health_info'];
        $meal->goal_id = $validated['goal_id'];
        $meal->meal_type_id = $validated['meal_type_id'];
        $meal->meal_image = $imageName; 

       
        $meal->save();

       
        if (!empty($validated['restrictions'])) {
            $meal->restrictions()->attach($validated['restrictions']);
        }

      
        return redirect('/meals')->with('success', 'Meal created successfully!');
    }
    public function edit($id)
    {
       
        $meal = Meal::findOrFail($id);
    
     
        $goals = Goal::all(); 
        $types = MealType::all(); 
        $restrictions = Restriction::all(); 
    
      
        return view('meals.edit', compact('meal', 'goals', 'types', 'restrictions'));
    }

    public function update(Request $request, $mealId)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'health_info' => 'required|string',
            'goal_id' => 'required|exists:goals,id',
            'meal_type_id' => 'required|exists:meal_types,id',
            'restrictions' => 'nullable|array',
            'restrictions.*' => 'exists:restrictions,id',
            'meal_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

       
        $meal = Meal::find($mealId);

       
        $imageName = $meal->meal_image;

        if ($request->hasFile('meal_image')) {
         
            $imageName = $request->file('meal_image')->getClientOriginalName();
            
           
            if ($meal->meal_image && file_exists(public_path('mealsImages/' . $meal->meal_image))) {
                unlink(public_path('mealsImages/' . $meal->meal_image)); 
            }

           
            $request->file('meal_image')->move(public_path('mealsImages'), $imageName);
        }

       
        $meal->name = $validated['name'];
        $meal->description = $validated['description'];
        $meal->health_info = $validated['health_info'];
        $meal->goal_id = $validated['goal_id'];
        $meal->meal_type_id = $validated['meal_type_id'];
        $meal->meal_image = $imageName; 

      
        $meal->save();

      
        if (!empty($validated['restrictions'])) {
            $meal->restrictions()->sync($validated['restrictions']);
        }

      
        return redirect()->route('meals.show', $mealId)->with('success', 'Meal updated successfully!');
    }


    public function toggleAvailability( $id)
    {
        $meal = Meal::findOrFail($id);

        $meal->availability = !$meal->availability;
        $meal->save();

        return response()->json([
            'availability' => $meal->availability
        ]);
    }


}