@extends('layouts.nav2')

@section('content')

<div class="custom-background py-5" style="background-color: #bddb8f; min-height: 100vh;">
    <div class="container white-container p-5" style="background-color: white; border-radius: 10px;">
        <h1 class="text-center italiana-font font-weight-bold">Choose Meals for {{ $days }} Day{{ $days > 1 ? 's' : '' }}</h1>

        <form action="{{ route('storeUserMealPlan') }}" method="POST">
            @csrf
            <input type="hidden" name="plan_id" value="{{ $plan->id }}">

            @foreach ($mealsByType as $mealTypeId => $meals)
                <h3 class="mt-4 text-center italiana-font font-weight-bold">{{ \App\Models\MealType::find($mealTypeId)->name }}</h3>

                @for ($day = 1; $day <= $days; $day++)
                    <div class="my-4">
                        <h5 class="mb-3 text-center italiana-font font-weight-bold">Day {{ $day }}</h5>

                        <div id="mealCarousel-{{ $mealTypeId }}-day-{{ $day }}" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($meals->chunk(3) as $index => $mealChunk)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <div class="row">
                                            @foreach ($mealChunk as $meal)
                                                <div class="col-md-4 mb-3">
                                                    <div class="card shadow-sm">
                                                        <img src="{{ asset('mealsImages/' . $meal->meal_image) }}" class="card-img-top" alt="{{ $meal->name }}" style="height: 200px; object-fit: cover;">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $meal->name }}</h5>
                                                            <p class="card-text">{{ $meal->description }}</p>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="meals[{{ $mealTypeId }}][{{ $day }}]" id="meal_{{ $meal->id }}_day_{{ $day }}" value="{{ $meal->id }}" required>
                                                                <label class="form-check-label" for="meal_{{ $meal->id }}_day_{{ $day }}">Select this meal</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="d-flex justify-content-center mt-10">
                                @foreach ($meals->chunk(3) as $index => $mealChunk)
                                    <button type="button" data-target="#mealCarousel-{{ $mealTypeId }}-day-{{ $day }}" data-slide-to="{{ $index }}" class="carousel-indicator {{ $index == 0 ? 'active' : '' }}">{{ $index + 1 }}</button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endfor
            @endforeach

            <div class="text-center">
                <button type="submit" class="btn btn-success mt-3">Submit Plan</button>
            </div>
        </form>

      
       

    </div>
    <div class="text-center mt-4">
        <a href="{{ route('chooseDays', ['plan' => $plan->id]) }}" class="btn btn-success btn-lg">Go to Choose Days</a>

        </div>
</div>

@endsection

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
<style>
.italiana-font { font-family: 'Italiana', serif; }
.carousel-indicator { background-color: black; color: white; border-radius: 50%; width: 30px; height: 30px; text-align: center; line-height: 30px; margin: 0 5px; cursor: pointer; }
.carousel-indicator.active { background-color: green; }
html, body { height: 100%; margin: 0; padding: 0; }
.custom-background { display: flex; align-items: center; justify-content: center; min-height: 100vh; }
.font-weight-bold { font-weight: bold; }
</style>
@endsection
