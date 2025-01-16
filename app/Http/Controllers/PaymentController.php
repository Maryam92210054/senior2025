<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\OrderDay;
use App\Models\Order;

class PaymentController extends Controller
{
    public function create($orderId)
    {
        // Fetch the order details
        $order = Order::findOrFail($orderId);

        // Get the associated plan details
        $plan = Plan::findOrFail($order->plan_id);

        // Calculate the number of days and the total amount
        $dayNumber = OrderDay::where('order_id', $orderId)->count();
        $calculatedAmount = $plan->price * $dayNumber;

        // Get today's date
        $todayDate = now()->format('Y-m-d');

        // Pass data to the view
        return view('meals.payments', compact('orderId', 'calculatedAmount', 'todayDate'));
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'account_code' => [
                'required',
                'string',
                'min:7',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/',
            ],
            'amount' => 'required|numeric',
            'order_id' => 'required|exists:orders,id',
        ], [
            'account_code.regex' => 'The account code must be at least 7 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.',
        ]);
        
        // Calculate the final amount based on eco-friendly packaging selection
        $calculatedAmount = $request->amount;
    
        // Create a new payment entry
        $payment = Payment::create([
            'amount' => $calculatedAmount,
            'payment_date' => now()->format('Y-m-d'),
            'order_id' => $request->order_id,
        ]);
    
        // Update the order with the payment ID
        $order = Order::findOrFail($request->order_id);
        $order->status = 'placed';
        $order->payment_id = $payment->id; // Assign the payment_id
        $order->save();
    
        // Redirect to a success page
        return redirect()->route('meals.success')->with('success', 'Payment completed successfully!');
    }


    }
   

