<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlanType;
use App\Models\MealType;

class PlanTypeController extends Controller
{
    public function index()
    {
        $planTypes = PlanType::all();

        return view('plan-types.index', compact('planTypes'));
    }

    public function create()
    {
        $meal_types = MealType::all();
    
       return view('plan-types.create', ['meal_types' => $meal_types]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'meal_types' => 'required',
            'meal_types.*' => 'exists:meal_types,id',
            
        ]);

        // Create a new Plan instance
        $plan_type = new PlanType();
        $plan_type->description = $validated['description'];
        $plan_type->name = $validated['name'];
        
        $plan_type->save();
        $plan_type->mealTypes()->attach($validated['meal_types']);
        return redirect('/plan-types')->with('success', 'Plan created successfully!');
    }
    public function edit($id)
    {
        $plan_type = PLanType::findOrFail($id);
        $meal_types = MealType::all(); 
    
        return view('plan-types.edit', compact('plan_type', 'meal_types'));
    }

    public function update(Request $request, $id)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'meal_types' => 'required',
            'meal_types.*' => 'exists:meal_types,id',
        ]);

        $plan_type = PlanType::find($id);
        $plan_type->description = $validated['description'];
        $plan_type->name = $validated['name'];

        
        $plan_type->save();
        $plan_type->mealTypes()->attach($validated['meal_types']);
      
        return redirect()->route('plan-types.index')->with('success', 'Meal updated successfully!');
    }


}
