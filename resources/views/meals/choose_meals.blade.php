@extends('layouts.nav2')

@section('content')

<div class="custom-background py-5" style="background-color: #fefae0; min-height: 100vh;">
    <div class="container white-container p-5" style="background-color: #fefae0; border-radius: 10px;">
        <h1 class="text-center italiana-font font-weight-bold">Choose Meals for {{count($daysArray)}} Days </h1>

        @if (Auth::check())
        <form action="{{ route('storeUserMealPlan') }}" method="POST">
    @csrf
    <input type="hidden" name="plan_id" value="{{ $plan->id }}">

    @foreach ($daysArray as $day)
        <div class="my-4">
            <h5 class="mb-3 text-center italiana-font font-weight-bold">Day {{ $day }}</h5>

            <!-- Date selector for each day -->
            <div class="form-group text-center">
                <label for="date-day-{{ $day }}" class="italiana-font font-weight-bold">Select Date for Day {{ $day }}</label>
                <input type="date" id="date-day-{{ $day }}" name="dates[{{ $day }}]" class="form-control" required>
            </div>

            <!-- Meal selection based on meal types -->
            @foreach ($mealsByType as $mealTypeId => $meals)
                <h3 class="mt-4 text-center italiana-font font-weight-bold">{{ \App\Models\MealType::find($mealTypeId)->name }}</h3>

                <!-- Meal carousel for each meal type -->
                <div id="mealCarousel-{{ $mealTypeId }}-day-{{ $day }}" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($meals->chunk(4) as $index => $mealChunk)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <div class="row">
                                    @foreach ($mealChunk as $meal)
                                        <div class="col-lg-3 col-md-6 wow bounceInUp d-flex" data-wow-delay="0.3s">
                                                <div class="team-item rounded h-100 d-flex flex-column">
                                                    <img class="img-fluid rounded-top" src="{{ asset('mealsImages/' . $meal->meal_image) }}" alt="{{ $meal->name }}" style="height: 200px;">
                                                    <div class="team-content text-center py-3  rounded-bottom flex-grow-1">
                                                        <h4 >{{ $meal->name }}</h4>
                                                        <input class="form-check-input" type="radio" name="meals[{{ $day }}][{{ $mealTypeId }}]" id="meal_{{ $meal->id }}_day_{{ $day }}" value="{{ $meal->id }}" required>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

               
                    <div class="d-flex justify-content-center mt-10">
                        @foreach ($meals->chunk(4) as $index => $mealChunk)
                            <!-- Set the active class conditionally for each button -->
                            <button type="button" 
                                    data-target="#mealCarousel-{{ $mealTypeId }}-day-{{ $day }}" 
                                    data-slide-to="{{ $index }}" 
                                    class="carousel-indicator {{ $index == 0 ? 'active' : '' }}" 
                                    aria-label="Slide {{ $index + 1 }}">
                                {{ $index + 1 }}
                            </button>
                        @endforeach
                    </div>


                </div>
            @endforeach
        </div>
    @endforeach

    <div class="text-center">
        <button type="submit" class="custom-btn">Submit Plan</button>
    </div>
</form>

        @else
            <p class="text-center">You need to be logged in to see your meal plan.</p>
        @endif
        
</div>
<script>
    document.querySelectorAll('.carousel-indicator').forEach((indicator, index) => {
    indicator.addEventListener('click', function () {
        // Remove active class from all indicators
        document.querySelectorAll('.carousel-indicator').forEach(ind => ind.classList.remove('active'));

        // Add active class to the clicked indicator
        indicator.classList.add('active');
    });
});

    document.addEventListener('DOMContentLoaded', function () {
    const daysArray = @json($daysArray); // Blade variable to JavaScript
    const dateInputs = daysArray.map(day => document.getElementById(`date-day-${day}`));

    // Calculate the start (Monday) and end (Sunday) of the next week
    const today = new Date();
    const dayOfWeek = today.getDay(); // 0 = Sunday, 1 = Monday, ..., 6 = Saturday

    // Determine the next Monday (start of next week)
    const daysUntilNextMonday = dayOfWeek === 0 ? 1 : 8 - dayOfWeek; // If today is Sunday, next Monday is 1 day away
    const nextMonday = new Date(today);
    nextMonday.setDate(today.getDate() + daysUntilNextMonday);

    // Calculate the next Sunday (end of next week)
    const nextSunday = new Date(nextMonday);
    nextSunday.setDate(nextMonday.getDate() + 6);

    // Format date as YYYY-MM-DD (for date inputs)
    const formatDate = date => {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    };

    const minDate = formatDate(nextMonday);
    const maxDate = formatDate(nextSunday);

    // Set restrictions on all date inputs
    dateInputs.forEach((input, index) => {
        input.min = minDate;
        input.max = maxDate;

        // Add validation for date sequence (from previous inputs)
        input.addEventListener('change', () => {
            const currentDate = new Date(input.value);

            // Check if there's a previous day and validate
            if (index > 0) {
                const previousDate = new Date(dateInputs[index - 1].value);
                if (currentDate <= previousDate) {
                    alert(`The date for Day ${daysArray[index]} must be after the date for Day ${daysArray[index - 1]}.`);
                    input.value = ''; // Clear the invalid input
                }
            }

            // Ensure future days cannot have earlier dates
            for (let i = index + 1; i < dateInputs.length; i++) {
                dateInputs[i].min = input.value;
            }
        });
    });
});

</script>
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
