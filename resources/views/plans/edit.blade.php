@extends('layouts.nav3')
@section('title', 'edit plan')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Plan</title>

  <link href="{{ asset('css/createMeal.css') }}" rel="stylesheet">
</head>

<body>

<div class="container">
  <div class="title">Edit Plan</div>
  <form action="{{route('plans.update',$plan->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="input-box">
      <span>Description</span>
      <textarea placeholder="Enter plan description" name="description"required>{{$plan->description}}</textarea>
    </div>

    <div class="input-box">
    <span>Price Per Day </span>
    <input type="number" placeholder="Enter price per day in $" name="price" step="0.01" min="0" required value="{{$plan->price}}">
    </div>


    <div class="input-row">
      <div class="input-box">
        <span>Goal</span>
        <select name="goal_id" required>
          @foreach ($goals as $goal)
              <option @if($goal-> id == $plan->goal_id) selected @endif value="{{$goal->id}}">{{$goal->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="input-box">
        <span>Plan Type</span>
        <select name="plan_type_id" required>
          @foreach ($types as $type)
              <option @if($type-> id == $plan->plan_type_id) selected @endif value="{{$type->id}}">{{$type->description}}</option>
          @endforeach
        </select>
      </div>
    </div>


    <div class="button">
      <input type="submit" value="Edit Plan">
    </div>
  </form>
</div>

</body>
</html>
@endsection
