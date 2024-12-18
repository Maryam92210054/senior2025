@extends('layouts.nav1')
@section('title', 'register')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Registration Form</title>
  <!-- Google Font -->
  <link href="{{ asset('css/registration.css') }}" rel="stylesheet">
</head>
<body>

  <!-- Registration Form -->
  <div class="container">
    <div class="title">Registration</div>
    <form action="{{route('registration.post')}}" method="POST">
    @csrf
      @if(Session()->has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
      @endif
      @if(Session()->has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
      @endif

      @csrf
      <div class="input-row">
        <div class="input-box">
          <span>Full Name</span>
          <input type="text" placeholder="Enter your first and last name"  name="name" value="{{old('name')}}">
          <span class="text-danger">@error('name'){{$message}} @enderror </span>
        </div>
        <div class="input-box">
          <span>Email</span>
          <input type="text" placeholder="Enter your email"  name="email" value="{{old('email')}}">
          <span class="text-danger">@error('email'){{$message}} @enderror </span>
        </div>
      </div>

      <!-- Address and Phone Number Pair -->
      <div class="input-row">
        <div class="input-box">
          <span>Address</span>
          <input type="text" placeholder="Enter your detailed address"  name="address" value="{{old('address')}}">
          <span class="text-danger">@error('address'){{$message}} @enderror </span>
        </div>
        <div class="input-box">
          <span>Phone Number</span>
          <input type="text" placeholder="00/000000"  name="phone" value="{{old('phone')}}">
          <span class="text-danger">@error('phone'){{$message}} @enderror </span>
        </div>
      </div>

      <!-- Password and Dropdown Pair -->
      <div class="input-row">
        <div class="input-box">
          <span>Password</span>
          <input type="password" placeholder="Enter your password"  name="password" value="{{old('password')}}">
          <span class="text-danger">@error('password'){{$message}} @enderror </span>
        </div>
        <div class="input-box">
             <span>Select your Diet Goal</span>
             <select name="goal_id">
    @foreach ($goals as $goal)
        <option value="{{ $goal->id }}" 
            {{ old('goal_id', isset($selectedGoalId) ? $selectedGoalId : null) == $goal->id ? 'selected' : '' }}>
            {{ $goal->name }}
        </option>
    @endforeach
</select>

    <span class="text-danger">@error('goal_id'){{ $message }} @enderror </span>
         
        </div>
      </div>

      <!-- Gender Dropdown -->
      <div class="input-box">
        <span>Select if you have any food restrictions</span>
        <select name="restriction_id" >
        <option value=""  selected>None</option>
        @foreach ($restrictions as $restriction)
            <option value="{{ $restriction->id }}">{{ $restriction->name }}</option>
        @endforeach
    </select>
    <span class="text-danger">@error('restriction_id'){{ $message }} @enderror</span>
      </div>

      <!-- Submit Button -->
      <div class="button">
        <input type="submit" value="Register">
      </div>

      <!-- Link for login -->
      <div class="login-link">
        <span>Already have an account? </span><a href="{{route('login')}}">Log in</a>
      </div>

    </form>
  </div>

</body>
</html>
@endsection
