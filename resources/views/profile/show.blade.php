@extends('layouts.nav2')
@section('title', 'Update Profile')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Profile</title>

  <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
</head>
<body>

  
  <div class="profile-container">
    <div class="title"> Profile</div>
    <form action="{{ route('profile.update') }}" method="POST">
      @csrf
      @method('PUT') <!-- This is to indicate an update request -->

      @if(Session()->has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
      @endif

      @if(Session()->has('fail'))
        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
      @endif

      <div class="input-row">
        <div class="input-box">
          <span>Full Name</span>
          <input type="text" placeholder="Enter your full name" name="name" value="{{ old('name', $user->name) }}">
          <span class="text-danger">@error('name'){{ $message }} @enderror</span>
        </div>
        <div class="input-box">
          <span>Email</span>
          <input type="text" placeholder="Enter your email" name="email" value="{{ old('email', $user->email) }}">
          <span class="text-danger">@error('email'){{ $message }} @enderror</span>
        </div>
      </div>

      <div class="input-row">
        <div class="input-box">
    <span>Select your city</span>
    <select name="address" required>
        <option value="Akkar al-Atika" {{ old('address', $user->address) == 'Akkar al-Atika' ? 'selected' : '' }}>Akkar al-Atika</option>
        <option value="Andaket" {{ old('address', $user->address) == 'Andaket' ? 'selected' : '' }}>Andaket</option>
        <option value="Beino" {{ old('address', $user->address) == 'Beino' ? 'selected' : '' }}>Beino</option>
        <option value="Berqayel" {{ old('address', $user->address) == 'Berqayel' ? 'selected' : '' }}>Berqayel</option>
        <option value="Halba" {{ old('address', $user->address) == 'Halba' ? 'selected' : '' }}>Halba</option>
        <option value="Kobayat" {{ old('address', $user->address) == 'Kobayat' ? 'selected' : '' }}>Kobayat</option>
        <option value="Miniara" {{ old('address', $user->address) == 'Miniara' ? 'selected' : '' }}>Miniara</option>
        <option value="Qoubaiyat" {{ old('address', $user->address) == 'Qoubaiyat' ? 'selected' : '' }}>Qoubaiyat</option>
        <option value="Tal Abbas al-Gharbi" {{ old('address', $user->address) == 'Tal Abbas al-Gharbi' ? 'selected' : '' }}>Tal Abbas al-Gharbi</option>
        <option value="Tal Abbas al-Sharqi" {{ old('address', $user->address) == 'Tal Abbas al-Sharqi' ? 'selected' : '' }}>Tal Abbas al-Sharqi</option>
    </select>
    <span class="text-danger">@error('address'){{ $message }} @enderror</span>
</div>

        <div class="input-box">
            <span>Address Details</span>
            <input placeholder="Enter additional details" name="address_details"value="{{ old('address_details', $user->address_details) }}">
            <span class="text-danger">@error('address_details'){{ $message }} @enderror</span>
        </div>

        <div class="input-box">
          <span>Phone Number</span>
          <input type="text" placeholder="00/000000" name="phone" value="{{ old('phone', $user->phone) }}">
          <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
        </div>
      </div>

      <div class="input-row">
        <div class="input-box">
          <span>Password</span>
          <input type="password" placeholder="Enter your password" name="password">
          <span class="text-danger">@error('password'){{ $message }} @enderror</span>
        </div>
        <div class="input-box">
          <span>Select your Diet Goal</span>
          <select name="goal_id">
            @foreach ($goals as $goal)
              <option value="{{ $goal->id }}" 
                  {{ old('goal_id', $user->goal_id) == $goal->id ? 'selected' : '' }}>
                  {{ $goal->name }}
              </option>
            @endforeach
          </select>
          <span class="text-danger">@error('goal_id'){{ $message }} @enderror</span>
        </div>
      </div>

      <div class="input-box">
        <span>Select if you have any food restrictions</span>
        <select name="restriction_id">
          <option value="" {{ is_null($user->restriction_id) ? 'selected' : '' }}>None</option>
          @foreach ($restrictions as $restriction)
            <option value="{{ $restriction->id }}" 
                {{ $user->restriction_id == $restriction->id ? 'selected' : '' }}>
                {{ $restriction->name }}
            </option>
          @endforeach
        </select>
        <span class="text-danger">@error('restriction_id'){{ $message }} @enderror</span>
      </div>

      <!-- Submit Button -->
      <div class="button">
        <input type="submit" value="Update Profile">
      </div>

    </form>
  </div>

</body>
</html>
@endsection
