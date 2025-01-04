<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
        if (!$order || $order->status === 'cancelled' || !$order->payment_id) {
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
                        'id' => $meal->id,
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

        return ['order_id' => $order->id, 'mealTypes' => $mealTypes, 'orderDayMealsData' => $orderDayMealsData];
    }

    public function cancelOrder(Request $request)
    {
        $orderId = $request->input('order_id');

        // Retrieve the order details
        $order = Order::find($orderId);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        // Retrieve the first order day
        $firstOrderDay = $order->orderDays()->orderBy('date', 'asc')->first();

        if (!$firstOrderDay) {
            return redirect()->back()->with('error', 'Order day details not found.');
        }

        // Calculate the time difference
        $firstOrderDate = Carbon::parse($firstOrderDay->date);
        $currentDate = Carbon::now();

        if ($currentDate->diffInHours($firstOrderDate, false) >= 48) {
            // Set status to cancelled with refund
            $order->status = 'cancelled';
            $order->refund_processed = 'pending';
        } else {
            // Set status to cancelled no refund
            $order->status = 'cancelled';
        }

        $order->save();

        return redirect()->back()->with('success', 'Order has been cancelled.');
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
