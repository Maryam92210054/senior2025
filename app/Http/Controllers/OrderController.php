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

 
        $order = new Order();
        $order->delivery_time = $request->delivery_time;
        $order->plan_id = $request->plan_id;
        $order->user_id = $request->user_id; 

      
        $order->save();

       
        return redirect()->route('orderConfirmation', $order->id);
    }

public function confirmation($id)
{
    $order = Order::findOrFail($id);
    return view('meals.confirmation', compact('order'));
}

}
