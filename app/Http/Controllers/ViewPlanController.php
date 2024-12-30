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
        $startOfWeek = $today->copy()->startOfWeek(); // Start of this week
        $endOfWeek = $today->copy()->endOfWeek();     // End of this week
    
        // Fetch all plans for the user ordered by the earliest date in each plan
        $plans = Order::where('user_id', $userId)
            ->with('orderDays')
            ->get()
            ->sortBy(function ($order) {
                return $order->orderDays->min('date'); // Sort by the earliest date in each plan
            })
            ->values();
    
        $currentPlan = null;
        $newPlan = null;
    
        foreach ($plans as $plan) {
            // Get all dates for the plan's orderDays
            $planDates = $plan->orderDays->pluck('date')->map(fn($date) => Carbon::parse($date));
            \Log::info('Plan Dates:', $planDates->toArray());
    
            // Check if any date in the plan falls within the current week
            if ($planDates->first(fn($date) => $date->between($startOfWeek, $endOfWeek))) {
                \Log::info('Current Plan Found:', ['plan_id' => $plan->id]);
                $currentPlan = $plan; // Plan belongs to this week
            } elseif (!$newPlan && $planDates->min() > $today) {
                \Log::info('New Plan Found:', ['plan_id' => $plan->id]);
                $newPlan = $plan; // The next available plan
            }
    
            if ($currentPlan && $newPlan) {
                break; // Exit the loop once both plans are found
            }
        }
    
        $currentPlanMealsData = $this->getPlanDetails($currentPlan);
        $newPlanMealsData = $this->getPlanDetails($newPlan);
    
        return view('meals.viewPlan', compact('currentPlanMealsData', 'newPlanMealsData'));
    }
    

    
    private function getPlanDetails($order)
    {
        if (!$order) {
            return [];
        }
    
        $plan = Plan::find($order->plan_id);
        $mealTypes = $plan?->planType->mealTypes ?? [];
    
        $orderDays = $order->orderDays;
    
        $orderDayMealsData = [];
        foreach ($orderDays as $orderDay) {
            $mealsByType = [];
            foreach ($orderDay->orderDayMeals as $orderDayMeal) {
                $meal = $orderDayMeal->meal;
                if ($meal) {
                    $mealType = $meal->mealType;
                    $mealsByType[$mealType->name][] = [
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

    if ($planType === 'current') {
        // Cancel the current plan
        $currentPlan = Order::where('user_id', $userId)
            ->with('orderDays')  // Load the related orderDays to filter by date
            ->get()
            ->sortByDesc(function ($order) {
                return $order->orderDays->max('date'); // Sort by the latest date
            })
            ->values()
            ->skip(1) // Skip the latest plan (which is the "new" plan)
            ->first(); // Get the "current" plan, if it exists

        if (!$currentPlan) {
            return redirect()->back()->with('error', 'No current plan to cancel.');
        }

        $currentPlan->delete();
        return redirect()->back()->with('success', 'Current plan has been successfully canceled.');
    } elseif ($planType === 'new') {
        // Cancel the new plan
        $newPlan = Order::where('user_id', $userId)
            ->with('orderDays')  // Load the related orderDays to filter by date
            ->get()
            ->sortByDesc(function ($order) {
                return $order->orderDays->max('date'); // Sort by the latest date
            })
            ->first(); // Get the latest plan, which is the "new" plan

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
