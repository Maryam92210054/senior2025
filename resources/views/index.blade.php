
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-5">Our Meals</h1>
    <div class="row">
        @foreach($meals as $meal)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <!-- Meal Image -->
                    <img src="{{ asset('storage/' . $meal->image) }}" class="card-img-top" alt="{{ $meal->mealName }}" style="height: 200px; object-fit: cover;">
                    
                    <div class="card-body">
                        <!-- Meal Name -->
                        <h5 class="card-title">{{ $meal->mealName }}</h5>
                        <!-- Meal Description -->
                        <p class="card-text">{{ $meal->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
