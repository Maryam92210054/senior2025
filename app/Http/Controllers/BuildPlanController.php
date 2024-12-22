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

       
        session(['selected_days' => $days]);

        return redirect()->route('chooseMeals', ['planId' => $planId, 'days' => $days]);
    }
    
    public function chooseMeals($planId, $days)
    {
        $plan = Plan::findOrFail($planId);
    
      
        $types = DB::table('plan_type_meals')
            ->where('plan_type_id', $plan->plan_type_id)
            ->pluck('meal_type_id');
    
        
        $mealsByType = Meal::whereIn('meal_type_id', $types)
            ->where('goal_id', Auth::user()->goal_id)
            ->where('availability', 1)
            ->get()
            ->groupBy('meal_type_id');
    
       
        $daysArray = range(1, $days); 
        
    
       
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
    
      
        $dates = $request->input('dates');
        $meals = $request->input('meals');
        $plan_id = $request->input('plan_id'); 
    
     
        $planData = [];
    
        
        foreach ($dates as $day => $date) {
            $planData[] = [
                'day' => $day,
                'date' => $date,
                'meals' => isset($meals[$day]) ? $meals[$day] : [],
            ];
        }
    
       
        return view('meals.plan_summary', [
            'planData' => $planData,
            'user_id' => Auth::user()->id,
            'plan_id' => $plan_id, 
        ]);
    }
    public function viewPlan($planId)
    {
        $plan = Plan::findOrFail($planId);  // Fetch the selected plan
        $user = Auth::user();  // Get the logged-in user
        
        // Retrieve the meal types for the plan
        $mealTypes = [];
        foreach ($plan->meals as $mealId) {
            $meal = \App\Models\Meal::find($mealId);
            if (!in_array($meal->meal_type_id, $mealTypes)) {
                $mealTypes[] = $meal->meal_type_id;
            }
        }
    
        // Prepare the meal data to show in the view
        $mealData = [];
        foreach ($plan->meals as $mealId) {
            $meal = \App\Models\Meal::find($mealId);
            $mealData[] = [
                'meal' => $meal,
                'mealType' => \App\Models\MealType::find($meal->meal_type_id)
            ];
        }
    
        return view('meals.view_plan', compact('plan', 'user', 'mealTypes', 'mealData'));
    }

   
    public function showPlan($planId)
    {
        // Retrieve the plan from the database
        $plan = Plan::find($planId);
    
        // Pass the plan to the view
        return view('layouts.nav2', compact('plan'));
    }


}
