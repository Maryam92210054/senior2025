<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDay;
use App\Models\OrderDayMeal;
use App\Models\Plan;
use App\Models\PlanType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ViewPlanController extends Controller
{
    public function viewPlan()
    {
        $userId = Auth::id(); 

        
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfNextWeek = Carbon::now()->endOfWeek()->addWeek();

        
        $lastOrder = Order::where('user_id', $userId)
                          ->whereHas('orderDays', function ($query) use ($startOfWeek, $endOfNextWeek) {
                              $query->whereBetween('date', [$startOfWeek, $endOfNextWeek]);
                          })
                          ->latest('created_at')
                          ->first();

        
        $orderDayMealsData = [];
        $mealTypes = [];
        $orderHistory = [];

        if ($lastOrder) {
           
            $plan = Plan::find($lastOrder->plan_id);

            if ($plan) {
                
                $planTypeId = $plan->plan_type_id;
                $planType = PlanType::find($planTypeId);

                if ($planType) {
                   
                    $mealTypes = $planType->mealTypes;

                  
                    $orderDays = OrderDay::where('order_id', $lastOrder->id)->get();

                   
                    foreach ($orderDays as $orderDay) {
                        $orderDayMeals = OrderDayMeal::where('order_day_id', $orderDay->id)
                                                     ->with('meal') 
                                                     ->get();

                       
                        $mealsByType = [];

                        foreach ($orderDayMeals as $orderDayMeal) {
                            $meal = $orderDayMeal->meal;
                            if ($meal) {
                                $mealType = $meal->mealType;
                                if ($mealType && in_array($mealType->name, $mealTypes->pluck('name')->toArray())) {
                                    $mealsByType[$mealType->name][] = [
                                        'name' => $meal->name,
                                        'image' => $meal->meal_image
                                    ];
                                }
                            }
                        }

                       
                        $orderDayMealsData[] = [
                            'day_number' => $orderDay->day_number,
                            'date' => $orderDay->date,
                            'meals_by_type' => $mealsByType,
                        ];
                    }
                }
            }
        }
 
       
        $orderHistory = Order::where('user_id', $userId)
                             ->whereDoesntHave('orderDays', function ($query) use ($startOfWeek) {
                                 $query->where('date', '>=', $startOfWeek);
                             })
                             ->get();

        
        return view('meals.viewPlan', compact('orderDayMealsData', 'mealTypes', 'orderHistory'));
    }

    public function cancelOrder(Request $request)
    {
        $userId = Auth::id(); 

       
        $lastOrder = Order::where('user_id', $userId)->latest('created_at')->first();

        if (!$lastOrder) {
            return redirect()->back()->with('error', 'No order to cancel.');
        }

        
        $lastOrder->delete();

        return redirect()->back()->with('success', 'Order has been successfully cancelled.');
    }
    public function getOrderDetails($orderId)
{
    try {
        // Fetch order by ID
        $order = Order::with(['orderDays.orderDayMeals.meal'])->find($orderId);

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        $meals = [];

        // Iterate through orderDays and their meals
        foreach ($order->orderDays as $orderDay) {
            foreach ($orderDay->orderDayMeals as $orderDayMeal) {
                if ($orderDayMeal->meal) {
                    $meals[] = [
                        'name' => $orderDayMeal->meal->name,
                        'image' => $orderDayMeal->meal->meal_image,
                        'date' => $orderDay->date,
                    ];
                }
            }
        }

        return response()->json(['meals' => $meals]);
    } catch (\Exception $e) {
        Log::error('Error fetching order details: ' . $e->getMessage());
        return response()->json(['error' => 'An unexpected error occurred'], 500);
    }
}


}


