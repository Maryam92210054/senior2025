@extends('layouts.nav2')

@section('content')
<div class="custom-background py-5" style="background-color: #fefae0; min-height: 100vh;">
    <div class="container white-container p-5" style="background-color: #fefae0; border-radius: 10px;">
        <h1 class="text-center italiana-font font-weight-bold">Choose Meals for {{ count($daysArray) }} Days </h1>

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
                                    <div class="team-item rounded h-100 d-flex flex-column meal-item" id="meal_{{ $meal->id }}_day_{{ $day }}">
                                        <!-- Image -->
                                        <img class="img-fluid rounded-top meal-image" src="{{ asset('mealsImages/' . $meal->meal_image) }}"
                                            alt="{{ $meal->name }}" style="height: 200px;" data-meal-id="{{ $meal->id }}">
                                        <i class="fas fa-search-plus zoom-in-icon position-absolute top-0 start-0 m-2"
                                            style="font-size: 24px; color: black; cursor: pointer;"></i>

                                        <div class="team-content text-center py-3 rounded-bottom flex-grow-1">
                                            <h4>{{ $meal->name }}</h4>
                                            <input class="form-check-input mt-3" type="radio" name="meals[{{ $day }}][{{ $mealTypeId }}]" id="meal_{{ $meal->id }}_day_{{ $day }}" value="{{ $meal->id }}" required>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Carousel indicators -->
                    <div class="d-flex justify-content-center mt-10">
                        @foreach ($meals->chunk(4) as $index => $mealChunk)
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
</div>

<!-- Modal -->
<div class="modal fade" id="mealDetailsModal" tabindex="-1" role="dialog" aria-labelledby="mealDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mealDetailsModalLabel">Meal Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <d iv class="modal-body">
                <div id="meal-details">
                    <img id="meal-image" src="" class="img-fluid mb-3" alt="Meal Image">
                    <h3 id="meal-name"></h3>
                    <p id="meal-description"></p>
                    <p id="meal-health-info"></p>
                    <p id="meal-goal-name"></p>
                </div>
        </div>
    </div>
</div>
</div>

<script>
    document.querySelectorAll('.carousel-indicator').forEach((indicator, index) => {
        indicator.addEventListener('click', function() {
            // Remove active class from all indicators
            document.querySelectorAll('.carousel-indicator').forEach(ind => ind.classList.remove('active'));

            // Add active class to the clicked indicator
            indicator.classList.add('active');
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
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
    document.querySelectorAll('.zoom-in-icon').forEach(icon => {
        icon.addEventListener('click', function() {
            const mealItem = this.closest('.meal-item');
            const mealId = mealItem.querySelector('.meal-image').getAttribute('data-meal-id');

            fetch(`/api/meals/${mealId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('meal-image').src = `/mealsImages/${data.meal_image}`;
                    document.getElementById('meal-name').textContent = data.name;
                    document.getElementById('meal-description').textContent = `Description: ${data.description}`;
                    document.getElementById('meal-health-info').textContent = `Nutritional Facts: ${data.health_info}`;
                    document.getElementById('meal-goal-name').textContent = `Goal: ${data.goal_name}`;
                    $('#mealDetailsModal').modal('show');
                })
                .catch(error => console.error('Error fetching meal details:', error));
        });
    });



    document.addEventListener('DOMContentLoaded', function() {
        // JavaScript to highlight the selected meal when the radio button is clicked
        document.querySelectorAll('.meal-item').forEach(mealItem => {
            mealItem.addEventListener('click', function() {
                // Find the radio button associated with the clicked meal
                const radioButton = mealItem.querySelector('input[type="radio"]');

                // Manually trigger the change event to select the meal
                radioButton.checked = true;

                // Deselect all meals in the carousel
                const mealTypeId = mealItem.closest('.carousel').id.split('-')[1]; // Extract the mealTypeId
                const day = mealItem.closest('.my-4').querySelector('h5').textContent.split(' ')[1]; // Extract the day number
                document.querySelectorAll(`#mealCarousel-${mealTypeId}-day-${day} .meal-item`).forEach(item => {
                    item.classList.remove('selected');
                });

                // Highlight the clicked meal
                mealItem.classList.add('selected');
            });
        });
    });
</script>

<style>
    input[type="radio"] {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        /* Circular shape */
        border: 2px solid #ccd5ae;
        /* Blue border */
        background-color: transparent;
        /* Make background transparent */
        position: absolute;
        /* Position it off-screen */
        visibility: hidden;
        /* Hide radio button */
        cursor: pointer;
        outline: none;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .meal-item.selected {
        border: 3px solid #d4a373;
        /* Customize border color */
        box-shadow: 0 0 15px rgba(212, 163, 115, 0.7);
        /* Optional box-shadow */
    }

    .team-item {
        position: relative;
    }

    .team-item input[type="radio"]:checked+.team-content {
        border: 3px solid #d4a373;
        box-shadow: 0 0 15px rgba(212, 163, 115, 0.7);
    }

    /* Add pointer cursor for clickable meal items */
    .meal-item {
        cursor: pointer;
    }

    /* Change the cursor to pointer for radio button */
    input[type="radio"] {
        cursor: pointer;
    }
</style>
@endsection