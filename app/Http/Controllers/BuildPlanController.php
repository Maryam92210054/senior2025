<?php
namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Order;
use App\Models\Meal;
use App\Models\UserMeal;
use Illuminate\Support\Facades\DB;

class BuildPlanController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $user = Auth::user();
            $goal_id = $user->goal_id; 
            $userName = $user->name; 

            \Log::info('Logged-in user: ', ['name' => $userName, 'goal_id' => $goal_id]);

            // Fetch plans based on user's goal_id
            $plans = Plan::where('goal_id', $goal_id)
                         ->with('planType')
                         ->get();
        } else {
            $plans = Plan::with('planType')->get();
            $userName = 'Guest';
        }

        return view('meals.build_plan', compact('plans', 'userName'));
    }

    public function chooseDays($planId)
    {
        $plan = Plan::with('planType')->findOrFail($planId);
        $user = Auth::user();

        // Ensure meals are filtered by the logged-in user's goal_id
        $mealTypes = $plan->planType->mealTypes;
        $mealsByType = [];
        foreach ($mealTypes as $mealType) {
            $mealsByType[$mealType->id] = Meal::where('meal_type_id', $mealType->id)
                                               ->where('goal_id', $user->goal_id) // Filter by user's goal_id
                                               ->get();
        }

        return view('meals.choose_days', compact('plan', 'mealsByType'));
    }
    public function storeDays(Request $request)
    {
        $planId = $request->input('plan_id'); 
        $days = $request->input('days');

        // Store the selected days in session 
        session(['selected_days' => $days]);

        return redirect()->route('chooseMeals', ['planId' => $planId, 'days' => $days]);
    }
    
        public function chooseMeals($planId, $days)
    {
        // Find the plan and ensure it exists
        $plan = Plan::findOrFail($planId);

        // Retrieve meal types associated with the plan's type
        $types = DB::table('plan_type_meals')
            ->where('plan_type_id', $plan->plan_type_id)
            ->pluck('meal_type_id');
        // Filter meals by meal_type_id and the logged-in user's goal_id
        $mealsByType = Meal::whereIn('meal_type_id', $types)
            ->where('goal_id', Auth::user()->goal_id) // Ensure meals are filtered by the user's goal_id
            ->get()
            ->groupBy('meal_type_id');

       $meals = Meal::where('goal_id', $plan->goal_id)->get();
       return view('meals.choose_meals', compact('plan', 'mealsByType','days'));
    }




    public function storeUserMealPlan(Request $request)
    {
        $validated = $request->validate([
            'plan_id' => 'required|exists:plans,id',
            'meals' => 'required|array',
            'dates' => 'required|array', // Validate the dates array
        ]);

        $plan = Plan::findOrFail($validated['plan_id']);
        $meals = $validated['meals'];
        $dates = $validated['dates']; // Retrieve the dates

        $mealDetails = [];
        foreach ($meals as $mealTypeId => $days) {
            foreach ($days as $day => $mealId) {
                $mealDetails[] = [
                    'meal_type' => \App\Models\MealType::find($mealTypeId)->name,
                    'day' => $day,
                    'date' => $dates[$day], // Include the selected date
                    'meal' => Meal::find($mealId),
                ];
            }
    }

    return view('meals.plan_summary', compact('plan', 'mealDetails'));
}



public function processPlanSelection(Request $request)
{
    $planId = $request->input('plan_id');
    $days = $request->input('days');
    $selectedMeals = $request->input('meals');
    $selectedDates = $request->input('dates'); 

    $mealsSummary = [];
    foreach ($selectedMeals as $mealTypeId => $mealIds) {
        foreach ($mealIds as $day => $mealId) {
            $meal = Meal::find($mealId);
            $mealsSummary[] = [
                'meal_type' => MealType::find($mealTypeId)->name,
                'meal_name' => $meal->name,
                'meal_description' => $meal->description,
                'day' => $day,
                'date' => $selectedDates[$day], // Store the selected date
            ];
        }
    }

    return view('meals.plan_summary', compact('planId', 'days', 'mealsSummary'));
}

}
