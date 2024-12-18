<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\OrderDay;
use App\Models\Order;

class PaymentController extends Controller
{
    public function create(Request $request)
    {
        $orderId = $request->query('order_id');
        
        // Fetch the plan price and day number based on the order
        $order = Order::findOrFail($orderId);  // Assume there's an order model to get order details
        $plan = Plan::findOrFail($order->plan_id);
        $dayNumber = OrderDay::where('order_id', $orderId)->count();  // Number of days in the order
        
        // Calculate the total amount
        $calculatedAmount = $plan->price * $dayNumber;
        
        return view('meals.payments', compact('orderId', 'calculatedAmount'));
    }

    public function store(Request $request)
    {
      
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'payment_date' => 'required|date',
        ]);
    

        $payment = Payment::create([
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'order_id' => $request->order_id,  
        ]);
    
      
        $order = Order::findOrFail($request->order_id);
        $order->payment_id = $payment->id;  
        $order->save();  
    
        return redirect()->route('meals.success');
    }
    
}
