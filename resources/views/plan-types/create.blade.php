@extends('layouts.nav3')
@section('title', 'create plan type')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Plan Type</title>

  <link href="{{ asset('css/createMeal.css') }}" rel="stylesheet">
</head>

<body>
<div class="parent-container">
<div class="create-container">
  <div class="title">Create Plan Type</div>
  <form action="{{route('plan-types.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="input-box">
      <span>Plan Type Name</span>
      <input type="text" placeholder="Enter plan type name" name="name"  required>
    </div>

    <div class="input-box">
      <span>Plan Type Description</span>
      <textarea placeholder="Enter plan description" name="description" required></textarea>
    </div>
    
    <div class="input-box">
        <span>Select Included Meal Types</span>
        <div class="restrictions">
          <!-- Loop through the restrictions and create a checkbox for each -->
          @foreach ($meal_types as $meal_type)
              <label class="restriction-label">
                  <input type="checkbox" name="meal_types[]" value="{{ $meal_type->id }}">
                  {{ $meal_type->name }}
              </label>
          @endforeach
        </div>
    </div>
    <div class="button">
      <input type="submit" value="Create Plan Type">
    </div>
    </div>
  </form>
</div>
</div>


</body>
</html>
@endsection
