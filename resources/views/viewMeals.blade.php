@extends('layouts.nav2')

@section('content')
<head>
    <link href="{{ asset('css/viewMeals.css') }}" rel="stylesheet">
</head>
<div class="container mt-4">
<div class="container-fluid ">
            <div class="container text-center animated bounceInDown">
                <h1 class="display-1 mb-4" style="color:#333">Menu</h1>
            </div>
        </div>

    <!-- Meal Type Tabs -->
    <ul class="nav nav-tabs mt-4 wow bounceInUp" data-wow-delay="0.2s" id="mealTypeTabs" role="tablist">
        @foreach($mealTypes as $index => $mealType)
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $index == 0 ? 'active' : '' }}" id="mealType-tab-{{ $mealType->id }}" data-toggle="tab" href="#mealType-{{ $mealType->id }}" role="tab" aria-controls="mealType-{{ $mealType->id }}" aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                    {{ $mealType->name }}
                </a>
            </li>
        @endforeach
    </ul>

    <div class="tab-content mt-4 wow bounceInUp" data-wow-delay="0.3s" id="mealTypeTabsContent">
        @foreach($mealTypes as $index => $mealType)
            <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}" id="mealType-{{ $mealType->id }}" role="tabpanel" aria-labelledby="mealType-tab-{{ $mealType->id }}">
                @foreach($goals as $goal)
                    <div class="goal-section my-4 wow bounceInUp" data-wow-delay="0.4s">
                        <!-- Highlight specific goals -->
                        <h2 class="goal-title text-center py-3 highlighted-goal-{{ Str::slug($goal->name) }}">
                            {{ $goal->name }}
                            
                        </h2>
                        <h3  class="goal-title text-center py-3 highlighted-goal-{{ Str::slug($goal->name) }}">{{ $goal->description }}</h3>

                        <!-- Carousel for meals -->
                        @php
                            $filteredMeals = $mealType->meals->where('goal_id', $goal->id);
                        @endphp

                        @if($filteredMeals->isEmpty())
                            <p class="text-center w-100 text-muted">No meals available for this goal under this meal type.</p>
                        @else
                            <div id="carousel-{{ $mealType->id }}-{{ $goal->id }}" class="carousel slide wow bounceInUp" data-wow-delay="0.5s" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($filteredMeals->chunk(3) as $index => $mealChunk)
                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                            <div class="row">
                                                @foreach($mealChunk as $meal)
                                                    <div class="col-md-4">
                                                        <div class="card shadow-sm">
                                                            <img src="{{ asset('mealsImages/' . $meal->meal_image) }}" class="card-img-top" alt="{{ $meal->name }}" style="height: 200px; object-fit: cover;">
                                                            <div class="card-body" style="height: 100px; display: flex; flex-direction: column; justify-content: space-between;">
                                                                <h5 class="card-title" style="margin-bottom: 10px;">{{ $meal->name }}</h5>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Carousel controls -->
                                <a class="carousel-control-prev" href="#carousel-{{ $mealType->id }}-{{ $goal->id }}" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-{{ $mealType->id }}-{{ $goal->id }}" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>

<script>
    // Scroll to Top Button Functionality
    window.onscroll = function () {
        const scrollToTopBtn = document.getElementById("scrollToTopBtn");
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            scrollToTopBtn.style.display = "block";
        } else {
            scrollToTopBtn.style.display = "none";
        }
    };

    function scrollToTop() {
        window.scrollTo({ top: 0, behavior: "smooth" });
    }
</script>

@endsection
