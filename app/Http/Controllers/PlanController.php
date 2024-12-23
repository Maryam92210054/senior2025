<?php

namespace App\Http\Controllers;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Models\Goal;
use App\Models\PlanType;

class PlanController extends Controller
{

     public function index()
    {
        $plans = Plan::all();
        return view('plans.index', ['plans' => $plans]);
    }
    public function show($planId) {
        
        $plan= Plan::find($planId);
        if (is_null( $plan)){
            return redirect()->route('plans.index');
        }
        return view('plans.show',['plan'=>$plan]);
    
    }
    public function create()
    {
       // Fetch the goals and types from the database
       $goals = Goal::all(); 
       $types = PlanType::all();   
    
       return view('plans.create', ['goals' => $goals, 'types' => $types]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string',
            'goal_id' => 'required|exists:goals,id',
            'plan_type_id' => 'required|exists:plan_types,id',
            'price' => 'required|numeric|min:0',
        ]);

        // Create a new Plan instance
        $plan = new Plan();
        $plan->description = $validated['description'];
        $plan->price = $validated['price'];
        $plan->goal_id = $validated['goal_id'];
        $plan->plan_type_id = $validated['plan_type_id'];
        // Redirect or respond
        $plan->save();
        return redirect('/plans')->with('success', 'Plan created successfully!');
    }
    public function edit($id)
    {
        $plan = Plan::findOrFail($id);
        $goals = Goal::all(); // Assuming you have a Goal model
        $types = PlanType::all(); // Assuming you have a MealType model

        return view('plans.edit', compact('plan', 'goals', 'types'));
    }

    public function update(Request $request, $planId)
    {
        // Validate the input
        $validated = $request->validate([
           'description' => 'required|string',
            'goal_id' => 'required|exists:goals,id',
            'plan_type_id' => 'required|exists:plan_types,id',
            'price' => 'required|numeric|min:0',
        ]);

        // Find the plan by ID
        $plan = Plan::find($planId);
        $plan->description = $validated['description'];
        $plan->price = $validated['price'];
        $plan->goal_id = $validated['goal_id'];
        $plan->plan_type_id = $validated['plan_type_id'];

        // Save the meal to the database
        $plan->save();

        // Redirect or respond
        return redirect()->route('plans.index', $planId)->with('success', 'Plan updated successfully!');
    }

    public function toggleAvailability( $id)
    {
        $plan = Plan::findOrFail($id);

        $plan->availability = !$plan->availability;
        $plan->save();

        return response()->json([
            'availability' => $plan->availability
        ]);
    }

}