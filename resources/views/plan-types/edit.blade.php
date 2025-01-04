@extends('layouts.nav3')
@section('title', 'edit plan')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Plan Type</title>

  <link href="{{ asset('css/createMeal.css') }}" rel="stylesheet">
</head>

<body>
  <div class="parent-container">

    <div class="create-container">
      <div class="title">Edit Plan</div>
      <form action="{{route('plan-types.update',$plan_type->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="input-box">
          <span>Plan Type Name</span>
          <input type="text" placeholder="Enter plan type name" name="name" value="{{$plan_type->name}}" required>
        </div>


        <div class="input-box">
          <span>Description</span>
          <textarea placeholder="Enter plan description" name="description" required>{{$plan_type->description}}</textarea>
        </div>

        <div class="input-box">
          <span>Select Included Meal Types</span>
          <div class="meal_types">
            @foreach ($meal_types as $meal_type)
            <label>
              <input type="checkbox" name="meal_types[]" value="{{ $meal_type->id }}"
                @if(in_array($meal_type->id, $plan_type->mealTypes->pluck('id')->toArray())) checked @endif>
              {{ $meal_type->name }}
            </label>
            @endforeach
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Edit Plan">
        </div>
      </form>
    </div>
  </div>
</body>

</html>
@endsection