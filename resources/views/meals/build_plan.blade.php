@extends('layouts.nav2')

@section('content')
<div class="custom-background py-5"> 
    <div class="container white-container p-5"> 
        
      
        <div class="header-green-background p-3 mb-4">
            <h1 class="text-center personalized-title">Your Personalized Plans</h1>

            @if (Auth::check())
                <h2 class="text-center welcome-name">Welcome, {{ Auth::user()->name }}</h2>
            @else
                <p class="text-center">You are not logged in. Please <a href="{{ route('login') }}">login</a>.</p>
            @endif
        </div>

        <div class="row flex-column align-items-center"> 
            @forelse($plans as $plan)
                <div class="col-md-8 mb-4"> 
                    <div class="card shadow-sm organic-card">
                        <div class="card-body">
                        
                            <h5 class="card-title text-center">
                                <a href="{{ route('chooseDays', ['plan' => $plan->id]) }}">{{ $plan->planType->description }}</a>
                            </h5>
                            <p class="card-text text-center">{{ $plan->description }}</p>
                            <p class="card-text text-center">Price: ${{ $plan->price }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No plans available for your goal.</p>
            @endforelse
        </div>
    </div>
</div>

@endsection


<style>
    .custom-background {
        background-color: #bddb8f;
        min-height: 100vh; 
    }

   
    .white-container {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

  
    .header-green-background {
        background-color: #bddb8f;
        border-radius: 8px 8px 0 0; 
    }

    
    .personalized-title,
    .welcome-name {
        font-family: 'Italiana', serif;
        font-weight: bold;
        color: white;
    }

  
    .organic-card {
        border: none; 
        border-radius: 12px;
        background-color: #f7f7f7;
        transition: transform 0.3s ease, box-shadow 0.3s ease; 
    }

   
    .organic-card:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); 
    }

   
    .card-title, .card-text {
        font-family: 'Arial', sans-serif;
        font-size: 1.1rem;
        color: #333;
    }

    .card-title a {
        text-decoration: none;
        color: #2c3e50; 
    }

    .card-title a:hover {
        color: #27ae60; 
    }

    .row.flex-column.align-items-center {
        display: flex;
        justify-content: center;
    }

   
    .header-green-background {
        width: 100%;
        padding-left: 0;
        padding-right: 0;
    }
</style>
