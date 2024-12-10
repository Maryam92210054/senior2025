@extends('layouts.nav2')

@section('content')

<div class="custom-background py-5" style="background-color: #bddb8f; min-height: 100vh;">

    <div class="container white-container p-5" style="background-color: white; border-radius: 10px;">
    
        <h1 class="text-center italiana-font font-weight-bold">Meal Plan Summary for {{ $plan->planType->description }}</h1>

        <table class="table table-bordered mt-4" style="border-color: #bddb8f;">
            <thead class="thead-light" style="background-color: #bddb8f; color: white;">
                <tr>
                    <th>Day</th>
                    <th>Meal Type</th>
                    <th>Meal Name</th>
                    <th>Description</th>
                    <th>Meal Image</th> 
                </tr>
            </thead>
            <tbody>
                @foreach ($mealDetails as $detail)
                    <tr>
                        <td>Day {{ $detail['day'] }}</td>
                        <td>{{ $detail['meal_type'] }}</td>
                        <td>{{ $detail['meal']->name }}</td>
                        <td>{{ $detail['meal']->description }}</td>
                        <td>
                            <img src="{{ asset('mealsImages/' . $detail['meal']->meal_image) }}" class="meal-table-image" alt="{{ $detail['meal']->name }}" style="height: 100px; width: 100px; object-fit: cover;">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

   
       

    </div>
    <div class="text-center mt-4">
    <a href="{{ route('chooseMeals', ['planId' => $plan->id]) }}" class="btn btn-success btn-lg">Go to Choose Meals</a>
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
}

.table tbody td {
    vertical-align: middle;
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
