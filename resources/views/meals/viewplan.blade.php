@extends('layouts.nav2')

@section('content')

<div class="custom-background py-5" style="background-color: #fefae0; min-height: 100vh;">
    <div class="container white-container p-5" style="background-color: fefae0; border-radius: 10px;">

        <h1 class="text-center wow bounceInUp" data-wow-delay="0.1s" style="font-family: 'Italiana', serif; color: white; font-weight: bold; background-color: #ccd5ae; padding: 10px; border-radius: 5px;">
            Your Current Plan:
        </h1>

        @if (session('error'))
            <div class="alert alert-danger text-center wow bounceInUp" data-wow-delay="0.2s" style="background-color: #f2dede; border-color: #d6a47c; color: #d6a47c; font-weight: bold;">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success text-center wow bounceInUp" data-wow-delay="0.3s" style="background-color: #dff0d8; border-color: #d4a373; color: #d4a373; font-weight: bold;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Current Meal Plan Table -->
        <table class="table table-bordered mt-4 wow bounceInUp" data-wow-delay="0.4s" style="border-color: #d4a373;">
            <thead class="thead-light" style="background-color: #d4a373; color: white;">
                <tr>
                    <th>Day Number</th>
                    <th>Date</th>
                    @foreach ($mealTypes as $mealType)
                        <th style="text-align: center; font-weight: bold;">{{ $mealType->name }}</th>
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

@endsection

<style>
    /* Custom CSS */
    body {
        background-color: #fefae0;
        color: #333;
        font-family: Arial, sans-serif;
    }

    h1 {
        font-size: 40px;
        font-weight: bold;
        color: #ccd5ae;
        text-align: center;
        margin-bottom: 30px;
    }

    /* Custom background for Code 2 */
    .custom-background {
        background-color: #bddb8f; /* From code 2 */
    }

    /* White container background */
    .white-container {
        background-color: white;
        border-radius: 10px;
    }

    /* Alerts styling */
    .alert {
        font-weight: bold;
        color: white;
    }

    .alert-danger {
        background-color: #ccd5ae; /* From code 2 */
        border-color: #ccd5ae; /* From code 2 */
    }

    .alert-success {
        background-color: #dff0d8; /* From code 2 */
        border-color: #d4a373; /* From code 2 */
    }

    /* Table border color */
    .table-bordered {
        border-color: #d4a373; /* Consistent with the new heading styles */
    }

    /* Meal image styling */
    .meal-table-image {
        width: 100px;
        height: auto;
    }

    /* Button styles */
    .btn-danger {
        background-color: #ccd5ae; /* Consistent with the new heading styles */
        border-color: #ccd5ae; /* Consistent with the new heading styles */
        color: black;
    }

    .btn-danger:hover {
        background-color: #d4a373; /* Hover effect */
        border-color: #d4a373;
        color: black;
    }

    .btn-primary {
        background-color: #ccd5ae; /* Consistent with the new heading styles */
        border-color: #ccd5ae; /* Consistent with the new heading styles */
        color: black;
    }

    .btn-primary:hover {
        background-color: #d4a373; /* Hover effect */
        border-color: #d4a373;
        color: black;
    }

    /* WOW.js Animation Styles */
    .wow {
        visibility: hidden;
    }

    .wow.bounceInUp {
        visibility: visible;
        animation-name: bounceInUp;
    }

    @keyframes bounceInUp {
        0% {
            opacity: 0;
            transform: translate3d(0, 3000px, 0);
        }
        60% {
            opacity: 1;
            transform: translate3d(0, -30px, 0);
        }
        80% {
            transform: translate3d(0, 10px, 0);
        }
        100% {
            transform: translate3d(0, 0, 0);
        }
    }
</style>
