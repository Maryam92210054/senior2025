@extends('layouts.nav2')

@section('content')

<head>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<div class="container-fluid team py-6">
    <div class="container">
        <div class="text-center">
            <h1 class="display-5 mb-5">Your Plans</h1>
        </div>

        {{-- Current Plan --}}
        @if (!empty($currentPlanMealsData))
        <div class="plan-section mb-5">
            <div class="text-center">
                <h2 class="plan-title">Current Plan</h2>
            </div><br>

            <div class="row justify-content-center g-4">
                @foreach ($currentPlanMealsData['orderDayMealsData'] as $orderDayData)
                <div class="col-12 mb-4 text-center">
                    <?php
                    $dayOfWeek = \Carbon\Carbon::parse($orderDayData['date'])->format('D');
                    ?>
                    <h3 class="italiana-font font-weight-bold">Day {{ $orderDayData['day_number'] }} - {{ $orderDayData['date'] }} ({{ $dayOfWeek }})</h3>
                </div>

                <div class="row justify-content-center w-100">
                    @foreach ($currentPlanMealsData['mealTypes'] as $mealType)
                    @isset($orderDayData['meals_by_type'][$mealType->name])
                    @foreach ($orderDayData['meals_by_type'][$mealType->name] as $meal)
                    <div class="col-lg-3 col-md-4 wow bounceInUp d-flex" data-wow-delay="0.3s">
                        <div class="team-item rounded h-100 d-flex flex-column meal-item">
                            <h5 class="text-center italiana-font font-weight-bold py-2 mb-0" style="background:#fefae0;">{{ $mealType->name }}</h5>

                            <!-- Image -->
                            <img class="img-fluid rounded-top meal-image"
                                src="{{ asset('mealsImages/' . $meal['image']) }}"
                                style="height: 200px;" alt="{{ $meal['name'] }}">

                            <div class="team-content text-center py-3 rounded-bottom flex-grow-1">
                                <h4>{{ $meal['name'] }}</h4>
                                <!-- Zoom Icon -->
                                <span class="fas fa-search-plus zoom-in-icon position-absolute top-0 start-0 m-2"
                                    style="font-size: 24px; color: black; cursor: pointer;" data-toggle="modal" data-target="#mealModal{{ $meal['id'] }}"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="mealModal{{ $meal['id'] }}" tabindex="-1" role="dialog" aria-labelledby="mealModalLabel{{ $meal['id'] }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mealModalLabel{{ $meal['id'] }}">{{ $meal['name'] }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Description:</strong> {{ $meal['description'] }}</p>
                                    <p><strong>Nutritional Facts:</strong> {{ $meal['health_info'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                    @endisset
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
        @endif
        <div class="text-center cancel-buttons">
            @if (!empty($currentPlanMealsData))
            <form action="{{ route('cancel-order') }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel your current plan?');" style="display:inline;">
                @csrf
                <input type="hidden" name="order_id" value="{{$currentPlanMealsData['order_id']}}">
                <button type="submit" class="btn btn-danger">Cancel Current Plan</button>
            </form>
            @endif
        </div>

        <div class="plan-divider"></div>

        {{-- New Plan --}}
        @if (!empty($newPlanMealsData))
        <div class="plan-section mb-5">
            <div class="text-center">
                <h2 class="plan-title">Next Week's Plan</h2>
            </div><br>

            <div class="row justify-content-center g-4">
                @foreach ($newPlanMealsData['orderDayMealsData'] as $orderDayData)
                <div class="col-12 mb-4 text-center">
                    <?php
                    $dayOfWeek = \Carbon\Carbon::parse($orderDayData['date'])->format('D');
                    ?>
                    <h3 class="italiana-font font-weight-bold">Day {{ $orderDayData['day_number'] }} - {{ $orderDayData['date'] }} ({{ $dayOfWeek }})</h3>
                </div>

                <div class="row justify-content-center w-100">
                    @foreach ($newPlanMealsData['mealTypes'] as $mealType)
                    @isset($orderDayData['meals_by_type'][$mealType->name])
                    @foreach ($orderDayData['meals_by_type'][$mealType->name] as $meal)
                    <div class="col-lg-3 col-md-4 wow bounceInUp d-flex" data-wow-delay="0.3s">
                        <div class="team-item rounded h-100 d-flex flex-column meal-item">
                            <h5 class="text-center italiana-font font-weight-bold py-2 mb-0" style="background:#fefae0;">{{ $mealType->name }}</h5>

                            <!-- Image -->
                            <img class="img-fluid rounded-top meal-image"
                                src="{{ asset('mealsImages/' . $meal['image']) }}"
                                style="height: 200px;" alt="{{ $meal['name'] }}">

                            <div class="team-content text-center py-3 rounded-bottom flex-grow-1">
                                <h4>{{ $meal['name'] }}</h4>
                                <!-- Zoom Icon -->
                                <span class="fas fa-search-plus zoom-in-icon position-absolute top-0 start-0 m-2"
                                    style="font-size: 24px; color: black; cursor: pointer;" data-toggle="modal" data-target="#mealModal{{ $meal['id'] }}"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="mealModal{{ $meal['id'] }}" tabindex="-1" role="dialog" aria-labelledby="mealModalLabel{{ $meal['id'] }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mealModalLabel{{ $meal['id'] }}">{{ $meal['name'] }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Description:</strong> {{ $meal['description'] }}</p>
                                    <p><strong>Health Info:</strong> {{ $meal['health_info'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                    @endisset
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Cancel Buttons -->


        <div class="text-center cancel-buttons">
            @if (!empty($newPlanMealsData))
            <!-- Add this modal HTML somewhere in your page -->
            <div id="cancelConfirmationModal" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirm Cancellation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to cancel your new plan? Please note that cancellations made within 48 hours of the plan start date are eligible for a refund. Cancellations made after this period will not be refunded.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button id="confirmCancelButton" type="button" class="btn btn-danger">Confirm Cancellation</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Original Form -->
            <form id="cancelForm" action="{{ route('cancel-order') }}" method="POST" style="display:inline;">
                @csrf
                <input type="hidden" name="order_id" value="{{$newPlanMealsData['order_id']}}">
                <button type="button" id="cancelButton" class="btn btn-danger">Cancel New Plan</button>
            </form>



            @endif
        </div>

        <!-- Order History Button -->
        <div class="text-center mt-4">
            <a href="{{ route('order-history') }}" class="btn btn-primary">View Order History</a>
        </div>

    </div>
</div>
<!-- Add these styles -->
<style>
    .modal-header {
        background-color: #f5f5f5;
        border-bottom: 1px solid #dee2e6;
    }

    .modal-body p {
        color: #333;
        font-size: 1rem;
    }

    .modal-footer button {
        margin-left: 10px;
    }

    body {
        background: #fefae0;
    }

    .plan-title {
        font-size: 2rem;
        font-weight: bold;
        color: #9c6644;
        background-color: white;
        padding: 15px 30px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: inline-block;
        position: relative;
    }

    .plan-title::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #d4a373;
        z-index: -1;
        border-radius: 10px;
        padding: 5px;
    }

    .plan-divider {
        border-top: 3px solid #d4a373;
        margin: 30px 0;
    }

    .cancel-buttons {
        margin-top: 20px;
    }

    /* Zoom icon styling */
    .zoom-icon {
        font-size: 24px;
        color: #007bff;
        cursor: pointer;
        position: absolute;
        bottom: 10px;
        right: 10px;
    }

    /* Modal styling */
    .modal-body {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>

<!-- Add this script -->
<script>
    document.getElementById('cancelButton').addEventListener('click', function() {
        // Show the modal
        $('#cancelConfirmationModal').modal('show');
    });

    document.getElementById('confirmCancelButton').addEventListener('click', function() {
        // Submit the form when the confirm button is clicked
        document.getElementById('cancelForm').submit();
    });
</script>

<!-- Include Bootstrap JS (required for the modal) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection