@extends('layouts.nav2')

@section('content')

<div class="custom-background py-5" style="background-color: #bddb8f; min-height: 100vh;">
    <div class="container white-container p-5" style="background-color: white; border-radius: 10px;">
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

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success btn-lg">Submit Days</button>
            </div>
        </form>
    </div>
    <div class="text-center mt-4">
        <a href="{{ route('build_plan', ['plan' => $plan->id]) }}" class="btn btn-success btn-lg">Go to Choose Days</a>

        </div>
</div>

@endsection

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
<style>
.italiana-font { font-family: 'Italiana', serif; }
html, body { height: 100%; margin: 0; padding: 0; }
.custom-background { display: flex; align-items: center; justify-content: center; min-height: 100vh; }
.white-container { background-color: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
.font-weight-bold { font-weight: bold; }
h1, label { color: #2d3436; }
button.btn-success { background-color: #4caf50; border-color: #4caf50; }
button.btn-success:hover { background-color: #45a049; }
form { max-width: 500px; margin: 0 auto; }
</style>
@endsection
