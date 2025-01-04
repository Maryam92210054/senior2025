@extends('layouts.nav3')
@section('title', 'edit order')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Meal</title>

    <link href="{{ asset('css/createMeal.css') }}" rel="stylesheet">
</head>

<body>

    <div class="create-container" style=" width: 80%; margin: 50px auto; padding: 40px;">
        <div class="title">Edit Order</div>
        <form action="{{route('orders.update',$order->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-box">
                <span>Order Id: {{$order->id}}</span>
                <span>Current Status: {{$order->status}}</span>
                <span>Current refund status: {{$order->refund_processed}}</span>
            </div>

            <div class="input-box">
                <span>Change Status</span>
                <select name='status' required>
                    <option value="placed">placed</option>
                    <option value="cancelled">cancelled</option>
                    <option value="pending">pending</option>
                </select>
            </div>

            <div class="input-box">
                <span>Change Status</span>
                <select name='refund_processed' required>
                    <option value="not_applicable">not_applicable</option>
                    <option value="pending">pending</option>
                    <option value="completed">completed</option>
                </select>
            </div>


            <div class="button">
                <input type="submit" value="Edit Order">
            </div>
        </form>
    </div>
</body>

</html>
@endsection