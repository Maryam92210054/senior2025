@extends('layouts.nav3')
@section('title') show plan @endsection
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan Profile</title>
    <!-- Bootstrap CSS (same version) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJ01L1tqTz2W7OpI4Gz5c7Isob8WeEE5r8+z4zfpT6ZG9pGqk0b4MBTzZYgZ" crossorigin="anonymous">
    <link href="{{ asset('css/meals.show.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container">

        <div class="meal-profile">

            <div class="meal-details">
                <p><strong>Description:</strong> {{ $plan->description}}</p>
                <p><strong>Price per day: </strong> ${{ $plan->price}}</p>
                <p><strong>Goal: </strong> {{ $plan->goal ? $plan->goal->name : 'notfound' }}</p>
                <p><strong>Type: </strong> {{ $plan->planType ? $plan->planType->description : 'notfound' }}</p>
                <p><strong>Created At:</strong> {{$plan->created_at->format('M d, Y H:i A') }}</p>
                <p><strong>Updated At:</strong> {{ $plan->updated_at->format('M d, Y H:i A') }}</p>
            </div>


        </div>

        <!-- Action Buttons for Admin -->
        <div class="meal-actions">
            <a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-success btn-lg">
                <i class="fas fa-edit"></i> Edit Plan
            </a>
            <a href="{{ route('plans.index') }}" class="btn btn-danger btn-lg">
                <i class="fas fa-arrow-left"></i> Back to Plans
            </a>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0v8fvyVv1IM1uMLBsHVv5Pb7ZT16akIIKuD4qfYZX2jP2vRf" crossorigin="anonymous"></script>
</body>

</html>
@endsection