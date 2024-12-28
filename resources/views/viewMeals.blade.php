@extends('layouts.nav2')

@section('content')

<div class="container mt-4">
    <h1 class="text-center mt-5 wow bounceInUp" data-wow-delay="0.1s" style="font-family: 'Italiana', serif; color: #c2cc96; font-weight: bold;">
        Explore Meal Options and Health Goals: Find the Best Fit for Your Lifestyle
    </h1>

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
                        <h3 class="goal-title text-center py-3 highlighted-goal-{{ Str::slug($goal->name) }}">
                            {{ $goal->name }}
                        </h3>

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
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{ $meal->name }}</h5>
                                                                <p class="card-text">{{ Str::limit($meal->description, 80) }}</p>
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

<!-- Scroll-to-Top Button -->
<button onclick="scrollToTop()" id="scrollToTopBtn" title="Go to top" class="btn btn-success wow bounceInUp" data-wow-delay="0.6s">Top</button>

<style>
    body {
        background-color: #fefae0;
        color: #333;
        font-family: Arial, sans-serif;
    }

    h1 {
        font-size: 40px;
        font-weight: bold;
        color: #ccd5ae; /* Updated H1 color */
        text-align: center;
        margin-bottom: 30px;
    }

    /* Highlighted Goals */
    .highlighted-goal-low-calorie,
    .highlighted-goal-high-protein,
    .highlighted-goal-overall-health {
        background-color: #d4a373; /* Highlight color */
        color: white;
        border-radius: 5px;
        font-weight: bold;
        padding: 10px;
    }

    /* Card Styling */
    .card {
        background-color: #ccd5ae !important;
        border: 2px solid #ccd5ae;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        color: black;
    }

    .card-body {
        background-color: #c2cc96 !important;
    }

    .card-img-top {
        border-bottom: 2px solid #c2cc96;
    }

    /* Navbar Styling */
    .navbar {
        background: #ccd5ae;
    }

    .navbar .navbar-nav .nav-link {
        padding: 10px 12px;
        font-size: 17px;
        color: #333;
        transition: .5s;
    }

    .navbar .navbar-nav .nav-link:hover,
    .navbar .navbar-nav .nav-link.active {
        color: #d4a373;
    }

    /* Scroll-to-Top Button */
    #scrollToTopBtn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        display: none;
        z-index: 1000;
    }

    #scrollToTopBtn:hover {
        background-color: #d4a373;
    }
</style>

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
