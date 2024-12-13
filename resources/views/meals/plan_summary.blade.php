@extends('layouts.nav2')

@section('content')

<div class="custom-background py-5" style="background-color: #bddb8f; min-height: 100vh;">

    <div class="container white-container p-5" style="background-color: white; border-radius: 10px;">
    
    <table class="table table-bordered mt-4" style="border-color: #bddb8f;">
            <thead class="thead-light" style="background-color: #bddb8f; color: white;">
                <tr>
                    <th>Day</th>
                    <th>Date</th>
                    <!-- Dynamically create columns based on unique meal types -->
                    @php
                        // Get unique meal types for the first plan
                        $mealTypes = [];
                        foreach ($planData as $plan) {
                            foreach ($plan['meals'] as $mealId) {
                                $meal = \App\Models\Meal::find($mealId);
                                if (!in_array($meal->meal_type_id, $mealTypes)) {
                                    $mealTypes[] = $meal->meal_type_id;
                                }
                            }
                        }
                    @endphp

                    <!-- Create headers for each unique meal type -->
                    @foreach ($mealTypes as $mealTypeId)
                        @php
                            $mealType = \App\Models\MealType::find($mealTypeId); // Fetch the meal type by ID
                        @endphp
                        <th>{{ $mealType ? $mealType->name : 'Unknown Meal Type' }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($planData as $plan)
                    <tr>
                        <td>{{ $plan['day'] }}</td>
                        <td>{{ $plan['date'] }}</td>

                        <!-- Display corresponding meals under each meal type column -->
                        @foreach ($mealTypes as $mealTypeId)
                            <td>
                                @foreach ($plan['meals'] as $mealId)
                                    @php
                                        $meal = \App\Models\Meal::find($mealId);
                                    @endphp
                                    @if ($meal && $meal->meal_type_id == $mealTypeId)
                                        <p>{{ $meal->name }}</p>
                                        <img src="{{ asset('mealsImages/'.$meal->meal_image) }}" alt="{{ $meal->name }}" class="meal-image" style="height: 100px; width: 100px; object-fit: cover;">
                                    @endif
                                @endforeach
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Confirm Order Form -->
        <form action="{{ route('confirmOrder') }}" method="POST" class="mt-4">
            @csrf
            <!-- Delivery Time Input -->
            <div class="form-group">
                <label for="delivery_time" class="font-weight-bold">Choose Delivery Time:</label>
                <input type="time" name="delivery_time" id="delivery_time" class="form-control" required>
            </div>

            <!-- Hidden Fields for Plan and User ID -->
            <input type="hidden" name="plan_id" value="{{ $plan_id }}">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> 
            
            @foreach ($planData as $key => $plan)
                <input type="hidden" name="planData[{{ $key }}][day]" value="{{ $plan['day'] }}">
                <input type="hidden" name="planData[{{ $key }}][date]" value="{{ $plan['date'] }}">
                @foreach ($plan['meals'] as $mealId)
                    <input type="hidden" name="planData[{{ $key }}][meals][]" value="{{ $mealId }}">
                @endforeach
            @endforeach

            <!-- Confirm Order Button -->
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-success btn-lg">Confirm Order</button>
            </div>
        </form>

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
