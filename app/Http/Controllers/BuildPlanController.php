<?php
namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Order;
use App\Models\Meal;
use App\Models\MealType;
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
    
        // Create an array for days (1, 2, 3, ...)
        $daysArray = range(1, $days); 
        
    
        // Pass the daysArray, plan, and user_id to the view
        return view('meals.choose_meals', [
            'plan' => $plan,
            'mealsByType' => $mealsByType,
            'daysArray' => $daysArray,
           
        ]);
    }
    
    
    
    public function storeUserMealPlan(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|integer',
            'dates' => 'required|array',
            'meals' => 'required|array',
            'meals.*' => 'array',
            'meals.*.*' => 'integer',
        ]);
    
        // Retrieve form data
        $dates = $request->input('dates');
        $meals = $request->input('meals');
        $plan_id = $request->input('plan_id');  // Retrieve the plan_id from the request
    
        // Prepare an array to hold the plan data
        $planData = [];
    
        // Loop over dates and associate meals with each day
        foreach ($dates as $day => $date) {
            $planData[] = [
                'day' => $day,
                'date' => $date,
                'meals' => isset($meals[$day]) ? $meals[$day] : [],
            ];
        }
    
        // Pass the plan_id, planData, and user_id to the view
        return view('meals.plan_summary', [
            'planData' => $planData,
            'user_id' => Auth::user()->id,
            'plan_id' => $plan_id,  // Pass plan_id to the view
        ]);
    }
    
}
