@extends('layouts.nav2')

@section('content')

<div class="custom-background py-5" style="background-color: #bddb8f; min-height: 100vh;">
    <div class="container white-container p-5" style="background-color: white; border-radius: 10px;">

        <h1 class="italiana-font">Your Current Plan:</h1>

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
                                @if(isset($orderDayData['meals_by_type'][$mealType->name]))
                                    @foreach ($orderDayData['meals_by_type'][$mealType->name] as $meal)
                                        <div style="text-align: center;">
                                            <p>{{ $meal['name'] }}</p>
                                            <img src="{{ asset('mealsImages/'.$meal['image']) }}" alt="{{ $meal['name'] }}" style="height: 100px; width: 100px; object-fit: cover; margin-top: 5px;">
                                        </div>
                                    @endforeach
                                @else
                                    <p>No meal</p>
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection

@section('styles')

<link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">

<style>

.italiana-font {
    font-family: 'Italiana', serif;
}

html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

.custom-background {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background-color: #bddb8f; 
}

.white-container {
    background-color: white;
    border-radius: 10px;
    padding: 40px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.table-bordered {
    border: 2px solid #bddb8f; 
}

.table thead th {
    background-color: #bddb8f;
    color: white; 
    font-weight: bold;
}

.meal-table-image {
    height: 100px;
    width: 100px;
    object-fit: cover;
    border-radius: 5px;
    margin-top: 10px;
}

.table tbody td {
    vertical-align: middle;
    text-align: center;
}

h1 {
    color: black;
    font-weight: bold;
    margin-bottom: 30px;
}

.btn-success {
    background-color: #4caf50;
    border-color: #4caf50;
}

.btn-success:hover {
    background-color: #45a049;
}

</style>

@endsection
