@extends('layouts.nav2')

@section('content')

<div class="custom-background py-5" style="background-color: #fefae0; min-height: 100vh;">
    <div class="container white-container p-5 wow bounceInUp" data-wow-delay="0.1s" style="background-color: #fefae0; border-radius: 10px;">

        <h1 class="text-center wow bounceInUp" data-wow-delay="0.2s" style="color: white; background-color: #ccd5ae; padding: 10px; border-radius: 5px;">Order History</h1>

        @if ($orderHistory->isEmpty())
            <p class="text-center mt-4 wow bounceInUp" data-wow-delay="0.3s" style="color: #d4a373;">No previous orders found.</p>
        @else
            <table class="table table-bordered mt-4 wow bounceInUp" data-wow-delay="0.4s" style="border-color: #d4a373;">
                <thead class="thead-light" style="background-color: #d4a373; color: white;">
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
                                <button class="btn btn-primary wow bounceInUp" data-wow-delay="0.5s" style="background-color: #d4a373; border-color: #d4a373;" onclick="viewOrderDetails({{ $historyOrder->id }})">View</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <!-- Order Details Section -->
            <div id="orderDetailsContainer" class="mt-5 wow bounceInUp" data-wow-delay="0.6s" style="display: none;">
                <h3 class="text-center wow bounceInUp" data-wow-delay="0.7s" style="color: white; background-color: #ccd5ae; padding: 10px; border-radius: 5px;">Order Details</h3>
                <div id="orderDetailsBody" class="row">
                    <!-- Cards will be populated dynamically using JavaScript -->
                </div>
            </div>
        @endif

    </div>
</div>

<script>
    function viewOrderDetails(orderId) {
        document.getElementById('orderDetailsContainer').style.display = 'block';
        document.getElementById('orderDetailsContainer').scrollIntoView({ behavior: 'smooth' });

        fetch(`/order-details/${orderId}`)
            .then(response => response.json())
            .then(data => {
                let orderDetailsBody = document.getElementById('orderDetailsBody');
                orderDetailsBody.innerHTML = ''; // Clear previous content

                if (data.error) {
                    orderDetailsBody.innerHTML = `<div class="col-12"><p class="text-center wow bounceInUp" data-wow-delay="0.9s" style="color: #d4a373;">${data.error}</p></div>`;
                } else if (data.days.length === 0) {
                    orderDetailsBody.innerHTML = '<div class="col-12"><p class="text-center wow bounceInUp" data-wow-delay="1s" style="color: #d4a373;">No meals found for this order.</p></div>';
                } else {
                    data.days.forEach(day => {
                        // Create a card for each day
                        let card = `
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card d-flex flex-column shadow-sm wow bounceInUp" data-wow-delay="0.8s" style="border-color: #d4a373; height: 100%;">
                                    <div class="card-header text-center" style="background-color: #f7f7f7; font-weight: bold; color: #d4a373;">
                                        Day ${day.day_number} - ${day.date}
                                    </div>
                                    <div class="card-body d-flex flex-column" style="height: 100%;">
                                        <ul class="list-group list-group-flush" style="flex-grow: 1;">
                        `;

                        // Add meals for the day
                        day.meals.forEach(meal => {
                            card += `
                                <li class="list-group-item" style="color: #d4a373;">
                                    <div class="d-flex flex-column align-items-center">
                                        <img src="{{ asset('mealsImages') }}/${meal.image}" alt="${meal.name}" class="mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                                        <span>${meal.name}</span>
                                    </div>
                                </li>`;
                        });

                        card += `
                                        </ul>
                                    </div>
                                </div>
                            </div>`;
                        
                        // Append card to orderDetailsBody
                        orderDetailsBody.innerHTML += card;
                    });
                }
            })
            .catch(error => {
                console.error('Error fetching order details:', error);
                let orderDetailsBody = document.getElementById('orderDetailsBody');
                orderDetailsBody.innerHTML = `<div class="col-12"><p class="text-center wow bounceInUp" data-wow-delay="1.1s" style="color: #d4a373;">An error occurred while fetching order details.</p></div>`;
            });
    }
</script>

@endsection
