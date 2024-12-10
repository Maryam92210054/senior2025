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
    public function index() {
        $meals=Meal:: paginate(10);

        return view('meals.index',['meals'=>$meals]); 
    }
    public function show($mealId) {
        //select * from meals where id=$
        $singleMealFromDb= Meal::find($mealId);
        if (is_null( $singleMealFromDb)){
            return redirect()->route('meals.index');
        }
        return view('meals.show',['meal'=>$singleMealFromDb]);
    
    }
    public function create()
    {
        // Fetch the goals and types from the database
        $goals = Goal::all(); 
        $types = MealType::all();   
        $restrictions = Restriction::all();   
    
        return view('meals.create', ['goals' => $goals, 'types' => $types,'restrictions'=>$restrictions]);
    }
    
    public function store(Request $request)
    {
        // Validate the input
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
            // Get the original image name
            $imageName = $request->file('meal_image')->getClientOriginalName();
        
            // Store the image in the public/mealsImages folder directly
            $request->file('meal_image')->move(public_path('mealsImages'), $imageName);
        }
        

        // Create a new Meal instance
        $meal = new Meal();
        $meal->name = $validated['name'];
        $meal->description = $validated['description'];
        $meal->health_info = $validated['health_info'];
        $meal->goal_id = $validated['goal_id'];
        $meal->meal_type_id = $validated['meal_type_id'];
        $meal->meal_image = $imageName; // Save only the file name

        // Save the meal to the database
        $meal->save();

        // Attach restrictions if any were selected
        if (!empty($validated['restrictions'])) {
            $meal->restrictions()->attach($validated['restrictions']);
        }

        // Redirect or respond
        return redirect('/meals')->with('success', 'Meal created successfully!');
    }
    public function edit($id)
    {
        // Retrieve the meal by ID
        $meal = Meal::findOrFail($id);
    
        // Fetch related data
        $goals = Goal::all(); // Assuming you have a Goal model
        $types = MealType::all(); // Assuming you have a MealType model
        $restrictions = Restriction::all(); // Assuming you have a Restriction model
    
        // Pass the data to the edit view
        return view('meals.edit', compact('meal', 'goals', 'types', 'restrictions'));
    }

    public function update(Request $request, $mealId)
    {
        // Validate the input
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

        // Find the meal by ID
        $meal = Meal::find($mealId);

        // Handle image upload if a new image is provided
        $imageName = $meal->meal_image; // Keep the old image name by default

        if ($request->hasFile('meal_image')) {
            // Get the original image name
            $imageName = $request->file('meal_image')->getClientOriginalName();
            
            // Remove the old image from storage (if it exists)
            if ($meal->meal_image && file_exists(public_path('mealsImages/' . $meal->meal_image))) {
                unlink(public_path('mealsImages/' . $meal->meal_image)); // Delete old image
            }

            // Store the new image in the public/mealsImages folder
            $request->file('meal_image')->move(public_path('mealsImages'), $imageName);
        }

        // Update the meal details
        $meal->name = $validated['name'];
        $meal->description = $validated['description'];
        $meal->health_info = $validated['health_info'];
        $meal->goal_id = $validated['goal_id'];
        $meal->meal_type_id = $validated['meal_type_id'];
        $meal->meal_image = $imageName; // Save the image name (not path)

        // Save the meal to the database
        $meal->save();

        // Update restrictions (many-to-many relationship)
        if (!empty($validated['restrictions'])) {
            $meal->restrictions()->sync($validated['restrictions']);
        }

        // Redirect or respond
        return redirect()->route('meals.show', $mealId)->with('success', 'Meal updated successfully!');
    }

    public function destroy($mealId) {
        $meal = Meal::findOrFail($mealId);  // Use findOrFail to ensure it throws an error if the post doesn't exist
        $meal->delete();
        return redirect()->route('meals.index');

    }
}