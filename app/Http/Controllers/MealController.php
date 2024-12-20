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
        $goals = Goal::with('meals')->get();
        
        return view('viewMeals', compact('goals'));
    }
    public function index(Request $request) {
        $search = $request->input('search');

        $meals = Meal::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->paginate(10); 

        return view('meals.index', compact('meals', 'search'));
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

    public function destroy($mealId) {
        $meal = Meal::findOrFail($mealId);  
        $meal->delete();
        return redirect()->route('meals.index');

    }
}