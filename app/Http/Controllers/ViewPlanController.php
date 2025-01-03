<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDay;
use App\Models\OrderDayMeal;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ViewPlanController extends Controller
{
    public function viewPlan()
{
    $userId = Auth::id();
    $today = Carbon::now();
    
    // Define the start and end dates of this week and the previous week
    $startOfThisWeek = $today->copy()->startOfWeek(); // Start of current week
    $endOfThisWeek = $today->copy()->endOfWeek();     // End of current week
    $startOfPreviousWeek = $today->copy()->subWeek()->startOfWeek(); // Start of previous week
    $endOfPreviousWeek = $today->copy()->subWeek()->endOfWeek(); // End of previous week

    // Fetch all plans for the user, ordered by their created_at in descending order
    $plans = Order::where('user_id', $userId)
        ->with('orderDays')
        ->get()
        ->sortByDesc('created_at'); // Sort by latest created_at first

    $currentPlan = null;
    $newPlan = null;

    foreach ($plans as $plan) {
        // Get the creation date of the plan
        $planCreatedAt = Carbon::parse($plan->created_at);
        \Log::info('Plan Created At:', ['created_at' => $planCreatedAt]);

        // Check if the plan was created in the previous week
        if (!$currentPlan && $planCreatedAt->between($startOfPreviousWeek, $endOfPreviousWeek)) {
            \Log::info('Current Plan Found:', ['plan_id' => $plan->id]);
            $currentPlan = $plan; // The most recent plan created in the previous week
        }

        // Check if the plan was created in the current week
        if (!$newPlan && $planCreatedAt->between($startOfThisWeek, $endOfThisWeek)) {
            \Log::info('New Plan Found:', ['plan_id' => $plan->id]);
            $newPlan = $plan; // The most recent plan created in the current week
        }

        // Exit the loop once both plans are found
        if ($currentPlan && $newPlan) {
            break;
        }
    }

    // Retrieve meal details for both plans if they exist
    $currentPlanMealsData = $currentPlan ? $this->getPlanDetails($currentPlan) : null;
    $newPlanMealsData = $newPlan ? $this->getPlanDetails($newPlan) : null;

    // Return the view with the meal data of both plans
    return view('meals.viewPlan', compact('currentPlanMealsData', 'newPlanMealsData'));
}

    

    
    private function getPlanDetails($order)
    {
        if (!$order) {
            return [];
        }
    
        $plan = Plan::find($order->plan_id);
        $mealTypes = $plan->planType->mealTypes ?? [];
    
        $orderDays = $order->orderDays;
    
        $orderDayMealsData = [];
        foreach ($orderDays as $orderDay) {
            $mealsByType = [];
            foreach ($orderDay->orderDayMeals as $orderDayMeal) {
                $meal = $orderDayMeal->meal;
                if ($meal) {
                    $mealType = $meal->mealType;
                    $mealsByType[$mealType->name][] = [
                        'id'=> $meal->id,
                        'name' => $meal->name,
                        'image' => $meal->meal_image,
                        'description' => $meal->description,
                        'health_info' => $meal->health_info
                    ];
                }
            }
    
            $orderDayMealsData[] = [
                'day_number' => $orderDay->day_number,
                'date' => $orderDay->date,
                'meals_by_type' => $mealsByType,
            ];
        }
    
        return ['mealTypes' => $mealTypes, 'orderDayMealsData' => $orderDayMealsData];
    }
    
    public function cancelOrder(Request $request)
{
    $userId = Auth::id();
    $planType = $request->input('plan_type'); // Get the type of plan to cancel

    // Define the current week range
    $today = Carbon::now();
    $startOfWeek = $today->copy()->startOfWeek();
    $endOfWeek = $today->copy()->endOfWeek();

    if ($planType === 'current') {
        // Identify the "current" plan based on dates falling within the current week
        $currentPlan = Order::where('user_id', $userId)
            ->with('orderDays')  // Load related orderDays to check dates
            ->get()
            ->filter(function ($order) use ($startOfWeek, $endOfWeek) {
                $orderDates = $order->orderDays->pluck('date')->map(fn($date) => Carbon::parse($date));
                return $orderDates->contains(fn($date) => $date->between($startOfWeek, $endOfWeek));
            })
            ->first(); // Get the first matching plan

        if (!$currentPlan) {
            return redirect()->back()->with('error', 'No current plan to cancel.');
        }

        $currentPlan->delete();
        return redirect()->back()->with('success', 'Current plan has been successfully canceled.');
    } elseif ($planType === 'new') {
        // Identify the "new" plan based on the next available date
        $newPlan = Order::where('user_id', $userId)
            ->with('orderDays')  // Load related orderDays to check dates
            ->get()
            ->filter(function ($order) use ($today) {
                $orderDates = $order->orderDays->pluck('date')->map(fn($date) => Carbon::parse($date));
                return $orderDates->min() > $today; // Check if the earliest date is in the future
            })
            ->sortBy(fn($order) => $order->orderDays->min('date')) // Sort by the earliest date
            ->first(); // Get the first matching plan

        if (!$newPlan) {
            return redirect()->back()->with('error', 'No new plan to cancel.');
        }

        $newPlan->delete();
        return redirect()->back()->with('success', 'New plan has been successfully canceled.');
    }

    return redirect()->back()->with('error', 'Invalid plan type.');
}



    
    public function getOrderDetails($orderId)
    {
        try {
            $order = Order::with(['orderDays.orderDayMeals.meal'])->find($orderId);
    
            if (!$order) {
                return response()->json(['error' => 'Order not found'], 404);
            }
    
            $days = [];
    
            foreach ($order->orderDays as $orderDay) {
                $meals = [];
    
                foreach ($orderDay->orderDayMeals as $orderDayMeal) {
                    if ($orderDayMeal->meal) {
                        $meals[] = [
                            'name' => $orderDayMeal->meal->name,
                            'image' => $orderDayMeal->meal->meal_image,
                        ];
                    }
                }
    
                $days[] = [
                    'day_number' => $orderDay->day_number,
                    'date' => $orderDay->date,
                    'meals' => $meals,
                ];
            }
    
            return response()->json(['days' => $days]);
        } catch (\Exception $e) {
            \Log::error('Error fetching order details: ' . $e->getMessage());
            return response()->json(['error' => 'An unexpected error occurred'], 500);
        }
    }
    
    public function viewOrderHistory()
    {
        $userId = Auth::id();
    
        $orderHistory = Order::where('user_id', $userId)
                             ->orderBy('created_at', 'desc')
                             ->get();
    
        return view('meals.orderHistory', compact('orderHistory'));
    }
}
