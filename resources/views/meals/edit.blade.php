@extends('layouts.nav3')
@section('title', 'edit meal')
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

  <div class="create-container" style=" width: 80%; margin: 50px auto; padding: 40px;">
    <div class="title">Edit Meal</div>
    <form action="{{route('meals.update',$meal->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="input-box">
        <span>Meal Name</span>
        <input type="text" placeholder="Enter meal name" name="name" value="{{$meal->name}}" required>
      </div>

      <div class="input-box">
        <span>Description</span>
        <textarea placeholder="Enter meal description" name="description" required>{{$meal->description}}</textarea>
      </div>

      <div class="input-box">
        <span>Health Information</span>
        <textarea placeholder="Enter health information" name="health_info" required>{{$meal->health_info}}</textarea>
      </div>

      <div class="input-row">
        <div class="input-box">
          <span>Goal</span>
          <select name="goal_id" required>
            @foreach ($goals as $goal)
            <option @if($goal-> id == $meal->goal_id) selected @endif value="{{$goal->id}}">{{$goal->name}}</option>
            @endforeach
          </select>
        </div>

        <div class="input-box">
          <span>Meal Type</span>
          <select name="meal_type_id" required>
            @foreach ($types as $type)
            <option @if($type-> id == $meal->meal_type_id) selected @endif value="{{$type->id}}">{{$type->name}}</option>
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
            <input type="checkbox" name="restrictions[]" value="{{ $restriction->id }}"
              @if(in_array($restriction->id, $meal->restrictions->pluck('id')->toArray())) checked @endif>
            {{ $restriction->name }}
          </label>
          @endforeach
        </div>
      </div>

      <!-- Image Section -->
      <div class="input-box">
        <span>Current Meal Image</span>
        @if($meal->meal_image) <!-- Check if there's an existing image -->
        <div class="current-image">
          <img src="{{ asset('mealsImages/' . $meal->meal_image) }}" alt="Meal Image" style="max-width: 100%; height: auto;">
        </div>
        @else
        <p>No image uploaded for this meal.</p>
        @endif
      </div>

      <div class="input-box">
        <span>Upload New Meal Image (optional)</span>
        <input type="file" name="meal_image" accept="image/*">
      </div>


      <div class="button">
        <input type="submit" value="Edit Meal">
      </div>
    </form>
  </div>
</body>

</html>
@endsection