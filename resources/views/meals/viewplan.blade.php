@extends('layouts.nav2')

@section('content')

<div class="custom-background py-5" style="background-color: #bddb8f; min-height: 100vh;">
    <div class="container white-container p-5" style="background-color: white; border-radius: 10px;">

        <h1 class="italiana-font text-center">Your Current Plan:</h1>

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
                                            <img src="{{ asset('mealsImages/' . $meal['image']) }}" alt="{{ $meal['name'] }}" class="meal-table-image">
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

    </div>
</div>

@endsection
