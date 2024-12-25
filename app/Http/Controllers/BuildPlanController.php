<?php
namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Order;
use App\Models\Meal;
use App\Models\MealType;
use App\Models\UserMeal;
use App\Models\Goal;

use Illuminate\Support\Facades\DB;

class BuildPlanController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $user = Auth::user();
            $goal_id = $user->goal_id; 
            $goal = Goal::find($goal_id);
            $userName = $user->name; 

            \Log::info('Logged-in user: ', ['name' => $userName, 'goal_id' => $goal_id]);

          
            $plans = Plan::where('goal_id', $goal_id)
                        ->where('availability', 1) 
                         ->with('planType')
                         ->get();
        } else {
            $plans = Plan::with('planType')->get();
            $userName = 'Guest';
        }

        return view('meals.build_plan', compact('plans', 'userName','goal'));
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
    public function storeDays($plan,$nb)
    {
        $planId = $plan; 
        $days = $nb;

       
        session(['selected_days' => $days]);

        return redirect()->route('chooseMeals', ['planId' => $planId, 'days' => $days]);
    }
    
    public function chooseMeals($planId, $days)
    {
        $plan = Plan::findOrFail($planId);

        // Get the meal types included in the plan
        $types = DB::table('plan_type_meals')
            ->where('plan_type_id', $plan->plan_type_id)
            ->pluck('meal_type_id');
           

        // Check the user's restrictions
        $userRestrictions = Auth::user()->restriction_id;
        
        // Query meals based on meal type, goal, availability, and restrictions
        $mealsQuery = Meal::whereIn('meal_type_id', $types)
            ->where('goal_id', Auth::user()->goal_id)
            ->where('availability', 1);
        

        // If the user has restrictions, filter meals accordingly
        if ($userRestrictions) {
            $mealsQuery->whereHas('restrictions', function ($query) use ($userRestrictions) {
                $query->whereIn('restriction_id', $userRestrictions);
            });
        }

        // Get the filtered meals grouped by meal type
        $mealsByType = $mealsQuery->get()->groupBy('meal_type_id');

        // Create an array for the number of days
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
    public function getMealDetails($mealId)
    {
        $meal = Meal::select('meals.*', 'goals.name as goal_name')
            ->join('goals', 'meals.goal_id', '=', 'goals.id')
            ->findOrFail($mealId);

        return response()->json($meal);
    }

}
