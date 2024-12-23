<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDay;
use App\Models\OrderDayMeal;
use App\Models\Meal;
use App\Models\MealType;

use App\Models\Plan;
use App\Models\PlanType;

use App\Models\PlanTypeMeal;

use Illuminate\Support\Facades\Auth; // Import Auth facade

class ViewPlanController extends Controller
{
    public function viewPlan()
{
    $userId = Auth::id(); // Get the logged-in user's ID

    // Retrieve the most recent order for the user
    $lastOrder = Order::where('user_id', $userId)
                      ->latest('created_at')
                      ->first();

    if (!$lastOrder) {
        // If no orders exist, redirect back with an error message
        return redirect()->back()->with('error', 'No plans found yet.');
    }

    // Retrieve the plan for this order
    $plan = Plan::find($lastOrder->plan_id);

    if (!$plan) {
        return redirect()->back()->with('error', 'Plan not found.');
    }

    // Get the plan type associated with this plan
    $planTypeId = $plan->plan_type_id;
    $planType = PlanType::find($planTypeId);

    if (!$planType) {
        // If the PlanType doesn't exist, return an error or empty array
        return [];
    }

    // Retrieve the meal types associated with the plan type
    $mealTypes = $planType->mealTypes;

    // Convert the meal types into an array (for example, array of meal type names)
    $mealTypeNames = $mealTypes->pluck('name')->toArray();

    // Retrieve the order days for the last order
    $orderDays = OrderDay::where('order_id', $lastOrder->id)->get();

    // Initialize an array to store order day meals data
    $orderDayMealsData = [];

    // Iterate over the order days and retrieve the meals
    foreach ($orderDays as $orderDay) {
        // Retrieve all meals for the current order day
        $orderDayMeals = OrderDayMeal::where('order_day_id', $orderDay->id)
                                      ->with('meal') // Eager load the meal data
                                      ->get();

        // Organize meals by meal type
        $mealsByType = [];

        foreach ($orderDayMeals as $orderDayMeal) {
            // Get the meal's meal_type_id
            $meal = $orderDayMeal->meal;
            if ($meal) {
                // Get the meal type for the meal (meal_type_id)
                $mealType = $meal->mealType; // Assuming the meal has a `mealType` relationship
                if ($mealType && in_array($mealType->name, $mealTypeNames)) {
                    // Group meals by type only if it exists in the current plan
                    $mealsByType[$mealType->name][] = $meal->name;
                }
            }
        }
i        // Store the data for this order day
        $orderDayMealsData[] = [
            'day_number' => $orderDay->day_number,
            'date' => $orderDay->date,
            'meals_by_type' => $mealsByType,
           
        ];
    }

    return view('meals.viewPlan', compact('orderDayMealsData', 'mealTypes'));
    
    
}
}