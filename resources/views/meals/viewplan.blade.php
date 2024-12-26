@extends('layouts.nav2')

@section('content')

<div class="custom-background py-5" style="background-color: #bddb8f; min-height: 100vh;">
    <div class="container white-container p-5" style="background-color: white; border-radius: 10px;">

        <h1 class="text-center">Your Current Plan:</h1>

        @if (session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- Current Meal Plan Table -->
        <table class="table table-bordered mt-4" style="border-color: #bddb8f;">
            <thead class="thead-light" style="background-color: #bddb8f; color: white;">
                <tr>
                    <th>Day Number</th>
                    <th>Date</th>
                    @foreach ($mealTypes as $mealType)
                        <th>{{ $mealType->name }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($orderDayMealsData as $orderDayData)
                    <tr>
                        <td>{{ $orderDayData['day_number'] }}</td>
                        <td>{{ $orderDayData['date'] }}</td>

                        @foreach ($mealTypes as $mealType)
                            <td>
                                @isset($orderDayData['meals_by_type'][$mealType->name])
                                    @foreach ($orderDayData['meals_by_type'][$mealType->name] as $meal)
                                        <div style="text-align: center;">
                                            <p>{{ $meal['name'] }}</p>
                                            <img src="{{ asset('mealsImages/' . $meal['image']) }}" alt="{{ $meal['name'] }}" class="meal-table-image" style="width: 100px; height: auto;">
                                        </div>
                                    @endforeach
                                @else
                                    <p>No meal</p>
                                @endisset
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-center mt-4">
            <form action="{{ route('cancel-order') }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel your order?');">
                @csrf
                <button type="submit" class="btn btn-danger">Cancel Order</button>
            </form>
        </div>

        <!-- Order History Table -->
        <div class="mt-5">
            <h2 class="text-center">Order History</h2>
            @if ($orderHistory->isEmpty())
                <p class="text-center">No previous orders found.</p>
            @else
                <table class="table table-bordered mt-4" style="border-color: #bddb8f;">
                    <thead class="thead-light" style="background-color: #bddb8f; color: white;">
                        <tr>
                            <th>Order ID</th>
                            <th>Order Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderHistory as $historyOrder)
                            <tr>
                                <td>{{ $historyOrder->id }}</td>
                                <td>{{ $historyOrder->created_at->format('d M Y') }}</td>
                                <td>
                                    <button class="btn btn-primary" onclick="viewOrderDetails({{ $historyOrder->id }})">View</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <!-- Order Details Container -->
        <div id="orderDetailsContainer" class="mt-5" style="display: none;">
            <h3 class="text-center">Order Details</h3>
            <table class="table table-bordered mt-4" style="border-color: #bddb8f;">
                <thead class="thead-light" style="background-color: #bddb8f; color: white;">
                    <tr>
                        <th>Meal Name</th>
                        <th>Meal Image</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody id="orderDetailsBody">
                    <!-- Populated dynamically using JavaScript -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function viewOrderDetails(orderId) {
        document.getElementById('orderDetailsContainer').style.display = 'block';

        // Fetch order details
        fetch(`/order-details/${orderId}`)
            .then(response => response.json())
            .then(data => {
                let orderDetailsBody = document.getElementById('orderDetailsBody');
                orderDetailsBody.innerHTML = ''; // Clear previous content

                if (data.error) {
                    orderDetailsBody.innerHTML = `<tr><td colspan="3" class="text-center">${data.error}</td></tr>`;
                } else if (data.meals.length === 0) {
                    orderDetailsBody.innerHTML = '<tr><td colspan="3" class="text-center">No meals found for this order.</td></tr>';
                } else {
                    data.meals.forEach(meal => {
                        orderDetailsBody.innerHTML += `
                            <tr>
                                <td>${meal.name}</td>
                                <td><img src="{{ asset('mealsImages') }}/${meal.image}" alt="${meal.name}" style="width: 100px; height: auto;"></td>
                                <td>${meal.date}</td>
                            </tr>
                        `;
                    });
                }
            })
            .catch(error => {
                console.error('Error fetching order details:', error);
                let orderDetailsBody = document.getElementById('orderDetailsBody');
                orderDetailsBody.innerHTML = `<tr><td colspan="3" class="text-center">An error occurred while fetching order details.</td></tr>`;
            });
    }
</script>

@endsection
