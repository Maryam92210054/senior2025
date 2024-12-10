@extends('layouts.nav3')
@section('title') Index @endsection
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Profile</title>
    <!-- Bootstrap CSS (same version) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJ01L1tqTz2W7OpI4Gz5c7Isob8WeEE5r8+z4zfpT6ZG9pGqk0b4MBTzZYgZ" crossorigin="anonymous">
    <link href="{{ asset('css/meals.show.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container">
        <!-- Meal Profile Card -->
        <div class="meal-profile">
            <!-- Meal Information (Left) -->
            <div class="meal-details">
                <h3>Name: {{ $meal->name}}</h3>
                <p><strong>Description:</strong> {{ $meal->description}}</p>
                <p><strong>Health Information:</strong> {{ $meal->health_info}}</p>
                <p><strong>Goal: </strong> {{ $meal->goal ? $meal->goal->name : 'notfound' }}</p>
                <p><strong>Type: </strong> {{ $meal->mealType ? $meal->mealType->name : 'notfound' }}</p>
                <p><strong>Dietary Restrictions:</strong>
                    @if($meal->restrictions->isEmpty())
                        None
                    @else
                       {{ $meal->restrictions->pluck('name')->implode(', ') }}
                    @endif
                </p>
                <p><strong>Created At:</strong> {{ $meal->created_at->format('M d, Y H:i') }}</p>
                <p><strong>Updated At:</strong> {{ $meal->updated_at->format('M d, Y H:i') }}</p>
            </div>

            <!-- Meal Image (Right) -->
            <div class="meal-image">
                <img src="{{ asset('mealsImages/' . $meal->meal_image) }}" alt="Meal Image">
            </div>
        </div>

        <!-- Action Buttons for Admin -->
        <div class="meal-actions">
        <a href="{{ route('meals.edit', $meal->id) }}" class="btn btn-success btn-lg">
            <i class="fas fa-edit"></i> Edit Meal
        </a>
        <a href="{{ route('meals.index') }}" class="btn btn-danger btn-lg">
            <i class="fas fa-arrow-left"></i> Back to Meals
        </a>
        </div>   

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0v8fvyVv1IM1uMLBsHVv5Pb7ZT16akIIKuD4qfYZX2jP2vRf" crossorigin="anonymous"></script>
</body>
</html>
@endsection
