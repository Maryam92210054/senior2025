@extends('layouts.nav3')
@section('title') manage orders @endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manage Orders</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="{{ asset('css/meals.css') }}" rel="stylesheet">
 
</head>
<body>
    <div class="container-xl">
          <!-- Orders Table -->
        <div class="table-responsive">
            <div class="table-wrapper">
                
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Order <b>Details</b></h2>
                        </div>
                        <!-- Filters Button aligned right -->
                        <div class="col-sm-4 text-end"">
                            <button type="button" class="filter-button" data-bs-toggle="modal" data-bs-target="#filterModal">
                            <b>Filters</b>
                            </button>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Status</th>
                            <th>Customer</th>
                            <th>City</th>
                            <th>Address Details</th>
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
                                <td>{{ $order->user->address_details }}</td> 
                                <td>{{ $order->user->phone }}</td> 
                                <td>{{ $order->delivery_time }} </td>
                                <td>
                                    <a href="{{ route('orders.display', $order->id) }}" class="view" title="View" data-toggle="tooltip">
                                        <i class="material-icons">&#xE417;</i>
                                    </a>
                                 </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
                <!-- Filter Modal -->
                <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="filterModalLabel">Apply Filters</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Filter Form -->
                        <form method="GET" action="{{ route('orders.index') }}">
                            <div class="form-group mb-3">
                                <label for="city">City:</label>
                                <select name="city" id="city" class="form-control">
                                    <option value="">Select City</option>
                                    <option value="Akkar al-Atika">Akkar al-Atika</option>
                                    <option value="Andaket">Andaket</option>
                                    <option value="Beino">Beino</option>
                                    <option value="Berqayel">Berqayel</option>
                                    <option value="Halba">Halba</option>
                                    <option value="Kobayat">Kobayat</option>
                                    <option value="Miniara">Miniara</option>
                                    <option value="Qoubaiyat">Qoubaiyat</option>
                                    <option value="Tal Abbas al-Gharbi">Tal Abbas al-Gharbi</option>
                                    <option value="Tal Abbas al-Sharqi">Tal Abbas al-Sharqi</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="delivery_time">Delivery Time:</label>
                                <select name="delivery_time" id="delivery_time" class="form-control">
                                    <option value="">Select Delivery Time</option>
                                    <option value="08:00">08:00 AM</option>
                                    <option value="09:00">09:00 AM</option>
                                    <option value="10:00">10:00 AM</option>
                                    <option value="12:00">12:00 PM</option>
                                    <option value="14:00">02:00 PM</option>
                                    <option value="16:00">04:00 PM</option>
                                    <option value="18:00">06:00 PM</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="order_date">Order Date:</label>
                                <input type="date" name="order_date" id="order_date" class="form-control">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-apply-filters " >Apply Filters</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
