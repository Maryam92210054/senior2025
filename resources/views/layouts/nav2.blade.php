<!doctype html>
<html lang="en">
  <head>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','custom')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">

  </head>
  
  <body>
  <nav class="navbar">
  <img src="logo.jpeg" alt="Logo">
  <ul class="nav-links">
      <li><a href="{{ route('viewMeals') }}">Meals</a></li>
      <li><a href="{{ route('build_plan') }}">Build plan</a></li>
      <li><a href="">View Plan</a></li>

      <li><a href="{{ route('profile.show') }}">Profile</a></li>
      @auth
    <li>
      <a href="{{ route('logout') }}" class="logout-btn" 
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </li>
    @endauth
  </ul>
</nav>
@yield('content')
  </body>
</html>