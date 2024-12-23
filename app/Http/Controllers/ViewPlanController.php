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
use Illuminate\Support\Facades\Auth;

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
            return redirect()->back()->with('error', 'Plan type not found.');
        }

        // Retrieve the meal types associated with the plan type
        $mealTypes = $planType->mealTypes;

        // Convert meal types into an array
        $mealTypeNames = $mealTypes->pluck('name')->toArray();

        // Retrieve the order days for the last order
        $orderDays = OrderDay::where('order_id', $lastOrder->id)->get();

        // Initialize an array to store order day meals data
        $orderDayMealsData = [];

        // Iterate over the order days and retrieve the meals
        foreach ($orderDays as $orderDay) {
            $orderDayMeals = OrderDayMeal::where('order_day_id', $orderDay->id)
                                         ->with('meal') // Eager load the meal data
                                         ->get();

            // Organize meals by meal type
            $mealsByType = [];

            foreach ($orderDayMeals as $orderDayMeal) {
                $meal = $orderDayMeal->meal;
                if ($meal) {
                    $mealType = $meal->mealType;
                    if ($mealType && in_array($mealType->name, $mealTypeNames)) {
                        $mealsByType[$mealType->name][] = [
                            'name' => $meal->name,
                            'image' => $meal->meal_image // Include meal image
                        ];

                        // Debugging: Check meal retrieval
                        \Log::info("Meal Name: " . $meal->name);
                        \Log::info("Meal Image: " . $meal->meal_image);
                    }
                }
            }

            $orderDayMealsData[] = [
                'day_number' => $orderDay->day_number,
                'date' => $orderDay->date,
                'meals_by_type' => $mealsByType,
            ];
        }

        return view('meals.viewPlan', compact('orderDayMealsData', 'mealTypes'));
    }
}
