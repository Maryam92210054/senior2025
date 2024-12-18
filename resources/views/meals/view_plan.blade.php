<!-- In resources/views/meals/view_plan.blade.php -->

@extends('layouts.nav2')

@section('content')

<div class="custom-background py-5" style="background-color: #bddb8f; min-height: 100vh;">
    <div class="container white-container p-5" style="background-color: white; border-radius: 10px;">
        <h1 class="text-center mb-4">View Your Plan</h1>
        
        <table class="table table-bordered mt-4" style="border-color: #bddb8f;">
            <thead class="thead-light" style="background-color: #bddb8f; color: white;">
                <tr>
                    <th>Day</th>
                    <th>Date</th>

                    @foreach ($mealTypes as $mealTypeId)
                        @php
                            $mealType = \App\Models\MealType::find($mealTypeId); // Fetch the meal type by ID
                        @endphp
                        <th>{{ $mealType ? $mealType->name : 'Unknown Meal Type' }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($mealData as $data)
                    <tr>
                        <td>{{ $data['meal']->day }}</td>
                        <td>{{ $data['meal']->date }}</td>

                        @foreach ($mealTypes as $mealTypeId)
                            <td>
                                @if ($data['meal']->meal_type_id == $mealTypeId)
                                    <p>{{ $data['meal']->name }}</p>
                                    <img src="{{ asset('mealsImages/'.$data['meal']->meal_image) }}" alt="{{ $data['meal']->name }}" class="meal-image" style="height: 100px; width: 100px; object-fit: cover;">
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
