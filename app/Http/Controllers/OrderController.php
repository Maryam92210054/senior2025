<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Assuming you have an Order model
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'delivery_time' => 'required',
        ]);
    
        // Step 1: Create the order
        $order = new Order();
        $order->delivery_time = $request->delivery_time;
        $order->plan_id = $request->plan_id;
        $order->user_id = $request->user_id;
        $order->save();
    
        // Step 2: Insert data into order_days
        foreach ($request->input('planData') as $plan) {
            $orderDay = new \App\Models\OrderDay();
            $orderDay->order_id = $order->id;
            $orderDay->day_number = $plan['day']; // Assuming 'day' is the day number
            $orderDay->date = $plan['date'];
            $orderDay->save();
    
            // Step 3: Insert data into order_day_meals
            foreach ($plan['meals'] as $mealId) {
                $orderDayMeal = new \App\Models\OrderDayMeal();
                $orderDayMeal->order_day_id = $orderDay->id;
                $orderDayMeal->meal_id = $mealId;
                $orderDayMeal->save();
            }
        }
    
        // Redirect to confirmation
        return redirect()->route('orderConfirmation', ['id' => $order->id]);
    }

    
    public function show($id)
{
    $order = Order::findOrFail($id);
    return view('meals.confirmation', compact('order'));
}

    

}
