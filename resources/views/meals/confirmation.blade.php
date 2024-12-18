@extends('layouts.nav2')

@section('content')

<div class="custom-background py-5" style="background-color: #bddb8f; min-height: 100vh;">
    <div class="container white-container p-5" style="background-color: white; border-radius: 10px;">
        <h1 class="text-center italiana-font font-weight-bold">Order Confirmation</h1>
        <p class="text-center">Your order has been placed successfully!</p>
        <p><strong>Order ID:</strong> {{ $order->id }}</p>
        <p><strong>Delivery Time:</strong> {{ $order->delivery_time }}</p>
        
        <!-- Button to Proceed to Payment -->
        <div class="text-center mt-4">
            <a href="{{ route('payment.create', ['order_id' => $order->id]) }}" class="btn btn-success">
                Proceed with Payment
            </a>
        </div>
    </div>
</div>

@endsection

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
<style>
    .italiana-font { font-family: 'Italiana', serif; }
    .custom-background { background-color: #bddb8f; min-height: 100vh; }
    .white-container { background-color: white; padding: 30px; border-radius: 10px; }
</style>
@endsection
