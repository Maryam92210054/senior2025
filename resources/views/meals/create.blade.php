@extends('layouts.nav3')
@section('title', 'create meal')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Meal</title>

  <link href="{{ asset('css/createMeal.css') }}" rel="stylesheet">
</head>

<body>

<div class="container">
  <div class="title">Create Meal</div>
  <form action="{{route('meals.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="input-box">
      <span>Meal Name</span>
      <input type="text" placeholder="Enter meal name" name="name" required>
    </div>

    <div class="input-box">
      <span>Description</span>
      <textarea placeholder="Enter meal description" name="description" required></textarea>
    </div>

    <div class="input-box">
      <span>Health Information</span>
      <textarea placeholder="Enter health information" name="health_info" required></textarea>
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
        <span>Meal Type</span>
        <select name="meal_type_id" required>
          @foreach ($types as $type)
              <option value="{{ $type->id }}">{{ $type->name }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <!-- Restrictions Section -->
    <div class="input-box">
        <span>Select restriction/s</span>
        <div class="restrictions">
          <!-- Loop through the restrictions and create a checkbox for each -->
          @foreach ($restrictions as $restriction)
              <label class="restriction-label">
                  <input type="checkbox" name="restrictions[]" value="{{ $restriction->id }}">
                  {{ $restriction->name }}
              </label>
          @endforeach
        </div>
    </div>

    <!-- Image Upload Section -->
    <div class="input-box">
      <span>Upload Meal Image</span>
      <input type="file" name="meal_image" accept="image/*">
    </div>


    <div class="button">
      <input type="submit" value="Create Meal">
    </div>
  </form>
</div>

</body>
</html>
@endsection
