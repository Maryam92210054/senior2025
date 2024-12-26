@extends('layouts.nav3')
@section('title', 'create plan')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Plan</title>

  <link href="{{ asset('css/createMeal.css') }}" rel="stylesheet">
</head>

<body>
<div class="parent-container">
<div class="create-container">
  <div class="title">Create Plan</div>
  <form action="{{route('plans.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="input-box">
      <span>Plan Description</span>
      <textarea placeholder="Enter plan description" name="description" required></textarea>
    </div>
    
    <div class="input-box">
    <span>Price Per Day </span>
    <input type="number" placeholder="Enter price per day in $" name="price" step="0.01" min="0" required>
    </div>

    <div class="input-row">
      <div class="input-box">
        <span>Goal</span>
        <select name="goal_id" required>
          @foreach ($goals as $goal)
              <option value="{{ $goal->id }}">{{ $goal->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="input-box">
        <span>Plan Type</span>
        <select name="plan_type_id" required>
          @foreach ($types as $type)
              <option value="{{ $type->id }}">{{ $type->description }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="button">
      <input type="submit" value="Create Plan">
    </div>
  </form>
</div>
</div>


</body>
</html>
@endsection
