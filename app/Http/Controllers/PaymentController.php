<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\OrderDay;
use App\Models\Order;

class PaymentController extends Controller
{
    /**
     * Show the payment creation form.
     *
     * @param int $orderId
     * @return \Illuminate\View\View
     */
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

    /**
     * Store the payment information in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'account_code' => [
                'required',
                'string',
                'min:7',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])/',
            ],
        ]);
        // Validate the request
        $request->validate([
            'amount' => 'required|numeric',
            'account_code' => 'required|string',
            'order_id' => 'required|exists:orders,id',
        ]);

        // Create a new payment entry
        $payment = Payment::create([
            'amount' => $request->amount,
            'payment_date' => now()->format('Y-m-d'), // Automatically set today's date
            'order_id' => $request->order_id,
        ]);

        // Link the payment to the order
        $order = Order::findOrFail($request->order_id);
        $order->payment_id = $payment->id;
        $order->save();

        // Redirect to a success page
        return redirect()->route('meals.success')->with('success', 'Payment completed successfully!');
    }
   
}
