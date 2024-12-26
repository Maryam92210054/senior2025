@extends('layouts.nav2')

@section('content')

<div class="custom-background py-5" style="background-color: #bddb8f; min-height: 100vh;">
    <div class="container white-container p-5" style="background-color: white; border-radius: 10px;">

        <h1 class="text-center">Order History</h1>

        @if ($orderHistory->isEmpty())
            <p class="text-center mt-4">No previous orders found.</p>
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

        <!-- Order Details Section -->
        <div id="orderDetailsContainer" class="mt-5" style="display: none;">
            <h3 class="text-center">Order Details</h3>
            <table class="table table-bordered mt-4" style="border-color: #bddb8f;">
                <thead class="thead-light" style="background-color: #bddb8f; color: white;">
                    <tr>
                        <th colspan="3" class="text-center">Meals for Each Day</th>
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

        fetch(`/order-details/${orderId}`)
            .then(response => response.json())
            .then(data => {
                let orderDetailsBody = document.getElementById('orderDetailsBody');
                orderDetailsBody.innerHTML = ''; // Clear previous content

                if (data.error) {
                    orderDetailsBody.innerHTML = `<tr><td colspan="3" class="text-center">${data.error}</td></tr>`;
                } else if (data.days.length === 0) {
                    orderDetailsBody.innerHTML = '<tr><td colspan="3" class="text-center">No meals found for this order.</td></tr>';
                } else {
                    data.days.forEach(day => {
                        // Add a header row for each day
                        orderDetailsBody.innerHTML += `
                            <tr>
                                <td colspan="3" style="background-color: #f7f7f7; text-align: center; font-weight: bold;">
                                    Day ${day.day_number} - ${day.date}
                                </td>
                            </tr>
                        `;

                        // Add meals for the day
                        day.meals.forEach(meal => {
                            orderDetailsBody.innerHTML += `
                                <tr>
                                    <td>${meal.name}</td>
                                    <td><img src="{{ asset('mealsImages') }}/${meal.image}" alt="${meal.name}" style="width: 100px; height: auto;"></td>
                                </tr>
                            `;
                        });
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
