<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Assuming you have an Order model
use Illuminate\Support\Facades\Auth;
use App\Models\MealType;


class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::query();

        // Filter by city
        if ($request->has('city') && $request->city) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('address', $request->city);
            });
        }

        // Filter by delivery time
        if ($request->has('delivery_time') && $request->delivery_time) {
            $query->where('delivery_time', $request->delivery_time);
        }

        // Filter by order date
        if ($request->has('order_date') && $request->order_date) {
            $query->whereHas('orderDays', function ($q) use ($request) {
                $q->whereDate('date', $request->order_date);
            });
        }

        // Get the filtered orders
        $orders = $query->get();

        return view('orders.index', compact('orders'));
    }


    public function display($orderId)
    {
        $order = Order::find($orderId);


        $mealTypes = $order->plan->planType->mealTypes; // Assuming this part of your logic is correct

        // Now, you can load the meals for each orderDay using the pivot table
        $orderDays = $order->orderDays; // Get the order days for the specific order

        return view('orders.display', [
            'order' => $order,
            'mealTypes' => $mealTypes,
            'orderDays' => $orderDays,  // Send the order days to the view
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


        return redirect()->route('payment.create', ['order_id' => $order->id]);
    }


    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('meals.confirmation', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);


        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, $orderId)
    {
        $validated = $request->validate([
            'status' => 'required',
            'refund_processed' => 'required',
        ]);
        // Find the plan by ID
        $order = Order::find($orderId);
        $order->status = $validated['status'];

        $order->refund_processed = $validated['refund_processed'];

        // Save the meal to the database
        $order->save();

        // Redirect or respond
        return redirect()->route('orders.index', $orderId)->with('success', 'Plan updated successfully!');
    }
}
