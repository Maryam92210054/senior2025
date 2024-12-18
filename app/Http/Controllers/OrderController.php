<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Assuming you have an Order model
use Illuminate\Support\Facades\Auth;
use App\Models\MealType;


class OrderController extends Controller
{   
    public function index()
    {
        $orders = Order::with('user')->get(); 
        return view('orders.index', ['orders' => $orders]);
    }

    public function display($orderId)
    {
        $order = Order::find($orderId);

        // Get meal types through the order's plan
        $mealTypes = $order->plan->planType->mealTypes;

        return view('orders.display', [
            'order' => $order,
            'mealTypes' => $mealTypes
        ]);

    }
    
    public function store(Request $request)
    {
        $request->validate([
            'delivery_time' => 'required',
        ]);
    
        
        $order = new Order();
        $order->delivery_time = $request->delivery_time;
        $order->plan_id = $request->plan_id;
        $order->user_id = $request->user_id;
        $order->save();
    
        foreach ($request->input('planData') as $plan) {
            $orderDay = new \App\Models\OrderDay();
            $orderDay->order_id = $order->id;
            $orderDay->day_number = $plan['day']; 
            $orderDay->date = $plan['date'];
            $orderDay->save();
    
           
            foreach ($plan['meals'] as $mealId) {
                $orderDayMeal = new \App\Models\OrderDayMeal();
                $orderDayMeal->order_day_id = $orderDay->id;
                $orderDayMeal->meal_id = $mealId;
                $orderDayMeal->save();
            }
        }
    

        return redirect()->route('orderConfirmation', ['id' => $order->id]);
    }

    
    public function show($id)
{
    $order = Order::findOrFail($id);
    return view('meals.confirmation', compact('order'));
}

    

}
