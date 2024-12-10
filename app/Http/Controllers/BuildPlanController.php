<?php
namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request; // Correct namespace for Request

use App\Models\Plan;
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
    
     
        $mealTypes = $plan->planType->mealTypes;
    
      
        $mealsByType = [];
        foreach ($mealTypes as $mealType) {
            $mealsByType[$mealType->id] = Meal::where('meal_type_id', $mealType->id)
                                               ->where('goal_id', Auth::user()->goal_id)
                                               ->get();
        }
    
        return view('meals.choose_days', compact('plan', 'mealsByType'));
    }
    
    
    public function processPlanDays(Request $request)
{
    $validated = $request->validate([
        'plan_id' => 'required|exists:plans,id',
        'days' => 'required|integer|min:1|max:7',
    ]);

    $plan = Plan::findOrFail($request->input('plan_id'));
    $days = $validated['days'];

    
    $mealsByType = Meal::where('goal_id', Auth::user()->goal_id)
        ->get()
        ->groupBy('meal_type_id');

    return view('meals.choose_meals', compact('plan', 'mealsByType', 'days'));
}
public function processPlanSelection(Request $request)
{
    $planId = $request->input('plan_id');
    $days = $request->input('days');
    $selectedMeals = $request->input('meals');

    $mealsSummary = [];
    foreach ($selectedMeals as $mealTypeId => $mealIds) {
        foreach ($mealIds as $mealId) {
            $meal = Meal::find($mealId);
            $mealsSummary[] = [
                'meal_type' => MealType::find($mealTypeId)->name,
                'meal_name' => $meal->name,
                'meal_description' => $meal->description,
            ];
        }
    }

    return view('meals.plan_summary', compact('planId', 'days', 'mealsSummary'));
}
    public function storeUserMealPlan(Request $request)
{
    $validated = $request->validate([
        'plan_id' => 'required|exists:plans,id',
        'meals' => 'required|array',
    ]);

    $plan = Plan::findOrFail($validated['plan_id']);
    $meals = $validated['meals'];


    $mealDetails = [];
    foreach ($meals as $mealTypeId => $days) {
        foreach ($days as $day => $mealId) {
            $mealDetails[] = [
                'meal_type' => \App\Models\MealType::find($mealTypeId)->name,
                'day' => $day,
                'meal' => Meal::find($mealId),
            ];
        }
    }

    return view('meals.plan_summary', compact('plan', 'mealDetails'));
}
    public function showUserMealPlan($planId)
    {
        $userMeals = UserMeal::where('user_id', Auth::id())
            ->where('plan_id', $planId)
            ->with(['meal', 'mealType'])
            ->get()
            ->groupBy('day');

        return view('meals.user_meal_plan', compact('userMeals'));
    }
  public function chooseMeals($planId)
{
 
    $days = session('selected_days', 0);

   
    $plan = Plan::findOrFail($planId);

  
    $mealTypeIds = DB::table('plan_type_meals')
        ->where('plan_type_id', $plan->plan_type_id)
        ->pluck('meal_type_id');

    
    $mealsByType = Meal::whereIn('meal_type_id', $mealTypeIds)
        ->get()
        ->groupBy('meal_type_id');

    return view('meals.choose_meals', compact('plan', 'mealsByType', 'days'));
}


public function storeDays(Request $request)
{
    $validated = $request->validate([
        'plan_id' => 'required|exists:plans,id',
        'days' => 'required|integer|min:1|max:7', 
    ]);

  
    session([
        'selected_plan_id' => $validated['plan_id'],
        'selected_days' => $validated['days'],
    ]);

    return redirect()->route('chooseMeals', ['planId' => $validated['plan_id']]);
}


public function submitPlan(Request $request)
{
    $validated = $request->validate([
        'meals' => 'required|array',
    ]);

    $selectedMeals = $validated['meals'];

    return view('meals.plan_summary', compact('selectedMeals'));
}

}    