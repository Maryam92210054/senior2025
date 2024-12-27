@extends('layouts.nav1')
@section('title', 'Register')
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

  <div class="register-container">
    <div class="title">Registration</div>
    <form action="{{ route('registration.post') }}" method="POST">
      @csrf
      @if(Session()->has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
      @endif
      @if(Session()->has('fail'))
        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
      @endif

      <div class="input-row">
        <div class="input-box">
          <span>Full Name</span>
          <input type="text" placeholder="Enter your first and last name" name="name" value="{{ old('name') }}">
          <span class="text-danger">@error('name'){{ $message }} @enderror</span>
        </div>
        <div class="input-box">
          <span>Email</span>
          <input type="text" placeholder="Enter your email" name="email" value="{{ old('email') }}">
          <span class="text-danger">@error('email'){{ $message }} @enderror</span>
        </div>
      </div>

      <div class="input-row">
        <div class="input-box">
          <span>Select your city</span>
          <select name="address" required>
            <option value="Akkar al-Atika">Akkar al-Atika</option>
            <option value="Andaket">Andaket</option>
            <option value="Beino">Beino</option>
            <option value="Berqayel">Berqayel</option>
            <option value="Halba">Halba</option>
            <option value="Kobayat">Kobayat</option>
            <option value="Miniara">Miniara</option>
            <option value="Qoubaiyat">Qoubaiyat</option>
            <option value="Tal Abbas al-Gharbi">Tal Abbas al-Gharbi</option>
            <option value="Tal Abbas al-Sharqi">Tal Abbas al-Sharqi</option>
          </select>
          <span class="text-danger">@error('address'){{ $message }} @enderror</span>
        </div>
        <div class="input-box">
          <span>Address Details</span>
          <input placeholder="Enter additional details" name="address_details" value="{{ old('address_details') }}">
          <span class="text-danger">@error('address_details'){{ $message }} @enderror</span>
        </div>
      </div>

      <div class="input-row">
        <div class="input-box">
          <span>Password</span>
          <input type="password" placeholder="Enter your password" name="password" value="{{ old('password') }}">
          <span class="text-danger">@error('password'){{ $message }} @enderror</span>
        </div>
        <div class="input-box">
          <span>Phone Number</span>
          <input type="text" placeholder="00/000000" name="phone" value="{{ old('phone') }}">
          <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
        </div>
      </div>

      <div class="input-box">
        <span>Select your Diet Goal</span>
        <select name="goal_id">
          @foreach ($goals as $goal)
            <option value="{{ $goal->id }}" {{ old('goal_id', $selectedGoalId ?? null) == $goal->id ? 'selected' : '' }}>
              {{ $goal->name }}
            </option>
          @endforeach
        </select>
        <span class="text-danger">@error('goal_id'){{ $message }} @enderror</span>
      </div>

      <div class="input-box">
        <span>Select if you have any food restrictions</span>
        <select name="restriction_id">
          <option value="" selected>None</option>
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
        <span>Already have an account? </span><a href="{{ route('login') }}">Log in</a>
      </div>

    </form>
  </div>

</body>
</html>
@endsection
