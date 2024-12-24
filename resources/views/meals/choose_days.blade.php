@extends('layouts.nav2')

@section('content')

<div class="custom-background py-5" style="background: url('{{ asset('mealsImages/yaz.png') }}') no-repeat center center; background-size: cover; min-height: 100vh; position: relative; opacity: 0.9;">
    <div class="container d-flex justify-content-center">
        <!-- White container in the center with reduced width -->
        <div class="white-container p-5" style="background-color: rgba(255, 255, 255, 0.9); border-radius: 10px; min-height: 60px; width: 100%; max-width: 1000px; position: relative;">
            <div class="d-flex justify-content-between">
                <!-- Left-side images inside the container -->
                <div class="image-container-left d-flex flex-column" style="position: relative; z-index: 1;">
                    <img src="{{ asset('mealsImages/4.png') }}" alt="Meal Image 4" class="img-fluid mt-20" style="transform: translateX(-10px); width: 400px;">
                    <img src="{{ asset('mealsImages/6.png') }}" alt="Meal Image 5" class="img-fluid" style="transform: translateX(-5px); width: 300px;">
                </div>

                <!-- Form in the center -->
                <div class="form-container d-flex flex-column align-items-center justify-content-center" style="z-index: 2; flex-grow: 1;">
                    <h1 class="text-center italiana-font font-weight-bold mb-4">Choose Days for {{ $plan->planType->description }}</h1>

                    <form action="{{ route('storeDays') }}" method="POST">
                        @csrf
                        <input type="hidden" name="plan_id" value="{{ $plan->id }}">

                        <div class="form-group">
                            <label for="days" class="italiana-font font-weight-bold">Select Number of Days:</label>
                            <select name="days" id="days" class="form-control form-control-lg" required>
                                @for ($i = 1; $i <= 7; $i++)
                                    <option value="{{ $i }}">{{ $i }} day{{ $i > 1 ? 's' : '' }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="text-center mt-2">
                            <button type="submit" class="btn btn-success btn-lg">Submit Days</button>
                        </div>
                    </form>
                </div>

                <!-- Right-side images inside the container -->
                <div class="image-container-right d-flex flex-column" style="position: relative; z-index: 1;">
                    <img src="{{ asset('mealsImages/2.png') }}" alt="Meal Image 2" class="img-fluid mb-3" style="transform: translateX(10px); width: 350px;">
                    <img src="{{ asset('mealsImages/3.png') }}" alt="Meal Image 3" class="img-fluid" style="transform: translateX(5px); width: 350px;">
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-3 ml-4">
        <a href="{{ route('build_plan', ['plan' => $plan->id]) }}" class="btn btn-success btn-lg">Change Plan</a>
    </div>
</div>

@endsection

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
<style>
    .italiana-font { font-family: 'Italiana', serif; }
    html, body { height: 100%; margin: 0; padding: 0; }
    .custom-background { display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh; position: relative; }
    .white-container { background-color: rgba(255, 255, 255, 0.9); padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); min-height: 600px; }
    .font-weight-bold { font-weight: bold; }
    h1, label { color: #2d3436; }
    button.btn-success { background-color: #4caf50; border-color: #4caf50; }
    button.btn-success:hover { background-color: #45a049; }
    form { max-width: 500px; margin: 0 auto; }
    
    .image-container-left, .image-container-right { position: relative; z-index: 1; }
    .form-container { flex-grow: 1; }
</style>
@endsection
