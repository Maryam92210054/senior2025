@extends('layouts.nav1')
@section('title', 'Login')
@section('content')

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <<link href="{{ asset('css/login.css') }}" rel="stylesheet">

</head>



  <!-- Login Form -->
  <div class="login-container">
    <div class="title">Login</div>
    <form action="{{route('login.post')}}" method="POST">
      @csrf
      @if(Session()->has('success'))
      <div class="alert alert-success">{{ Session::get('success') }}</div>
      @endif
      @if(Session()->has('fail'))
      <div class="alert alert-danger">{{ Session::get('fail') }}</div>
      @endif

      <div class="input-box">
        <span>Email</span>
        <input type="email" placeholder="Enter your email" name="email" value="{{ old('email') }}">
        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
      </div>

      <div class="input-box">
        <span>Password</span>
        <input type="password" placeholder="Enter your password" name="password">
        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
      </div>

      <div class="button">
        <input type="submit" value="Login">
      </div>

      <div class="signup-link">
        <span>Don't have an account? </span><a href="{{ route('registration') }}">Sign up</a>
      </div>
    </form>
  </div>


@endsection