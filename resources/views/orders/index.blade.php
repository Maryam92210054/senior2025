@extends('layouts.nav3')
@section('title') manage orders @endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Simple Data Table</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="{{ asset('css/meals.css') }}" rel="stylesheet">

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Order <b>Details</b></h2>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Status</th>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Contact number</th>
                            <th>Delivery Time</th>
                            <th>Order Details</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->status }} </td>
                                <td>{{ $order->user->name }}</td> 
                                <td>{{ $order->user->address }}</td> 
                                <td>{{ $order->user->phone }}</td> 
                                <td>{{ $order->delivery_time }} </td>
                                <td>
                                    <a href="{{route('orders.display',$order->id)}}" class="view" title="View" data-toggle="tooltip">
                                        <i class="material-icons">&#xE417;</i>
                                    </a>
                                 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</body>
</html>
@endsection
