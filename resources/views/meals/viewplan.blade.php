@extends('layouts.nav2')

@section('content')
<head>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    body{
        background:#fefae0;
    }
</style>
</head>

<div class="container-fluid team py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <h1 class="display-5 mb-5">Your Current Plan</h1>
        </div>

        <div class="row justify-content-center g-4">
            @foreach ($orderDayMealsData as $orderDayData)
                <div class="col-12 mb-4 text-center">
                    <?php
                        // Convert the date to a day of the week
                        $dayOfWeek = \Carbon\Carbon::parse($orderDayData['date'])->format('D'); // 'D' gives the 3-letter day (Mon, Tue, etc.)
                    ?>
                    <h3 class="italiana-font font-weight-bold">Day {{ $orderDayData['day_number'] }} - {{ $orderDayData['date'] }} ({{ $dayOfWeek }})</h3>
                </div>

                <div class="row justify-content-center w-100">
                    @foreach ($mealTypes as $mealType)
                        @isset($orderDayData['meals_by_type'][$mealType->name])
                            @foreach ($orderDayData['meals_by_type'][$mealType->name] as $meal)
                                <div class="col-lg-3 col-md-4 wow bounceInUp d-flex" data-wow-delay="0.3s">
                                    <div class="team-item rounded h-100 d-flex flex-column meal-item">
                                        <h5 class="text-center italiana-font font-weight-bold py-2 mb-0" style="background:#fefae0;">{{ $mealType->name }}</h5>
                                          
                                        <!-- Image -->
                                        <img class="img-fluid rounded-top meal-image" 
                                             src="{{ asset('mealsImages/' . $meal['image']) }}" 
                                             style="height: 200px;" alt="{{ $meal['name'] }}"
                                             data-meal-id="{{ isset($meal['id']) ? $meal['id'] : '' }}"
                                             data-meal-name="{{ $meal['name'] }}"
                                             data-meal-description="{{ $meal['description'] ?? 'No description available' }}"
                                             data-meal-health-info="{{ $meal['health_info'] ?? 'No health info available' }}"
                                             data-meal-image="{{ asset('mealsImages/' . $meal['image']) }}">

                                        <!-- Zoom Icon -->
                                        <i class="fas fa-search-plus zoom-in-icon position-absolute top-0 start-0 m-2" 
                                           style="font-size: 24px; color: black; cursor: pointer;"></i>

                                        <div class="team-content text-center py-3 rounded-bottom flex-grow-1">
                                            <h4>{{ $meal['name'] }}</h4>
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-center">No meals available</p>
                        @endisset
                    @endforeach
                </div> <!-- End of the row for the day -->
            @endforeach
            <!-- Cancel Order and View Order History Buttons -->
        <div class="text-center mt-4 wow bounceInUp" data-wow-delay="0.5s">
            <form action="{{ route('cancel-order') }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to cancel your order?');">
                @csrf
                <button type="submit" class="btn btn-danger" style="background-color: #ccd5ae; border-color: #ccd5ae; color: black;">Cancel Order</button>
            </form>
            <a href="{{ route('order-history') }}" class="btn btn-primary ml-2" style="background-color: #ccd5ae; border-color: #bddb8f; color: black;">View Order History</a>
        </div>
        </div>
    </div>

    <!-- Modal for Meal Details -->
    <div class="modal fade" id="mealDetailsModal" tabindex="-1" role="dialog" aria-labelledby="mealDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mealDetailsModalLabel">Meal Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="meal-details">
                        <img id="meal-image" src="" class="img-fluid mb-3" alt="Meal Image">
                        <h3 id="meal-name"></h3>
                        <p id="meal-description"></p>
                        <p id="meal-health-info"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> <!-- End of container -->

<script>
document.querySelectorAll('.zoom-in-icon').forEach(icon => {
    icon.addEventListener('click', function () {
        // Get the closest meal item
        const mealItem = this.closest('.meal-item');
        
        // Retrieve the data attributes for the meal
        const mealImage = mealItem.querySelector('.meal-image');
        const mealId = mealImage.getAttribute('data-meal-id');
        const mealName = mealImage.getAttribute('data-meal-name');
        const mealDescription = mealImage.getAttribute('data-meal-description');
        const mealHealthInfo = mealImage.getAttribute('data-meal-health-info');
        const mealImageSrc = mealImage.getAttribute('data-meal-image');

        // Update modal with the meal details
        document.getElementById('meal-image').src = mealImageSrc;
        document.getElementById('meal-name').textContent = mealName;
        document.getElementById('meal-description').textContent = `Description: ${mealDescription}`;
        document.getElementById('meal-health-info').textContent = `Health Info: ${mealHealthInfo}`;

        // Show the modal
        $('#mealDetailsModal').modal('show');
    });
});
</script>

@endsection
