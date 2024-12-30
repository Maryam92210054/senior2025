@extends('layouts.nav2')

@section('content')
<head>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background: #fefae0;
        }

        .plan-title {
            font-size: 2rem; /* Bigger font size */
            font-weight: bold;
            color: #9c6644; /* Dark brown color for text */
            background-color: white; /* White background for the title */
            padding: 15px 30px; /* Larger padding for more space around text */
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional: Adds a shadow for emphasis */
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
            background-color: #d4a373; /* Light brown highlighter */
            z-index: -1;
            border-radius: 10px; /* Match border radius of the title */
            padding: 5px; /* Increase padding to make highlighter bigger */
        }

        .plan-divider {
            border-top: 3px solid #d4a373; /* Light brown line separator */
            margin: 30px 0;
        }

        .cancel-buttons {
            margin-top: 20px;
        }
    </style>
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
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p class="text-center">No meals available</p>
                    @endisset
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="plan-divider"></div> <!-- Divider between current and new plans -->

        {{-- New Plan --}}
        @if (!empty($newPlanMealsData))
        <div class="plan-section mb-5">
            <div class="text-center">
                <h2 class="plan-title">New Plan</h2>
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
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p class="text-center">No meals available</p>
                    @endisset
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Cancel Buttons -->
        <div class="text-center cancel-buttons">
            @if (!empty($currentPlanMealsData))
            <form action="{{ route('cancel-order') }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel your current plan?');" style="display:inline;">
                @csrf
                <input type="hidden" name="plan_type" value="current">
                <button type="submit" class="btn btn-danger">Cancel Current Plan</button>
            </form>
            @endif

            @if (!empty($newPlanMealsData))
            <form action="{{ route('cancel-order') }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel your new plan?');" style="display:inline;">
                @csrf
                <input type="hidden" name="plan_type" value="new">
                <button type="submit" class="btn btn-danger">Cancel New Plan</button>
            </form>
            @endif
        </div>

        <!-- Order History Button -->
        <div class="text-center mt-4">
            <a href="{{ route('order-history') }}" class="btn btn-primary">View Order History</a>
        </div>
    </div>
</div>
@endsection
