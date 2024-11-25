@extends('layouts.app')

@section('content')

<div class="container mt-4" >
<h1 class="text-center mt-5" style="font-family: 'Italiana', serif; color: #bddb8f; font-weight: bold;">Our Meals Categorized by Goal</h1>


@foreach($goals as $goal)
<div class="goal-section my-5">
<h2 class="goal-title text-center py-3">{{ $goal->name }}</h2> 
<div id="mealCarousel-{{ $goal->id }}" class="carousel slide" data-ride="carousel">
<div class="carousel-inner">
@foreach($goal->meals->chunk(3) as $index => $mealChunk) 
<div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
<div class="row">
@foreach($mealChunk as $meal)
<div class="col-md-4 mb-4">
<div class="card shadow-sm">
                                       
<img src="{{ asset('mealsImages/' . $meal->meal_image) }}" class="card-img-top" alt="{{ $meal->name }}" style="height: 200px; object-fit: cover;">
                    
<div class="card-body">
<h5 class="card-title">{{ $meal->mealName }}</h5>
<p class="card-text">{{ $meal->description }}</p>
</div>
</div>
</div>
@endforeach
</div>
</div>
@endforeach
</div>

             
<a class="carousel-control-prev" href="#mealCarousel-{{ $goal->id }}" role="button" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
 <a class="carousel-control-next" href="#mealCarousel-{{ $goal->id }}" role="button" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
</div>
</div>
        
      
    @endforeach
</div>
<div class="full-width-banner text-center my-5">
    <h1 class="big-heading" style="font-family: 'Italiana', serif; color: #bddb8f;"> " FRESH. ORGANIC. SATISFYING "</h1>
</div>


<style>
     .full-width-banner {
        background-color: white; 
        width: 100%; 
        padding: 50px 0; 
        margin: 0 auto;
    }


    .big-heading {
        font-size: 48px;
        font-weight: bold;
        letter-spacing: 3px;
        font-family:Italiana;
    }
    body {
        background-color: #bddb8f;
    }

    
    .container {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); 
    }

    
    .goal-title {
        font-size: 28px;
        font-weight: bold;
        background-color: #bddb8f; 
        border: 2px solid #dee2e6; 
        border-radius: 8px;
        padding: 10px 0;
        margin-bottom: 40px;
        color: #343a40; 
    }

 
    .section-divider {
        border-top: 4px solid #007bff; 
        width: 100px;
        margin: 0 auto;
        opacity: 0.7;
    }

   
    .goal-section {
        padding: 50px 0;
        border-bottom: 2px solid #ddd; 
    }

 
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, 0.5); 
        border-radius: 50%; 
        padding: 15px;
        width: 40px;
        height: 40px;
    }

    .carousel-control-prev-icon:hover,
    .carousel-control-next-icon:hover {
        background-color: rgba(0, 0, 0, 0.8); 
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 5%; 
    }

    .carousel-control-prev-icon::before,
    .carousel-control-next-icon::before {
        font-size: 20px; 
    }
</style>
@endsection
