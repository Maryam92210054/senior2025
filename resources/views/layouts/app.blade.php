<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','custom')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <style>
    body, ul {
      margin: 0;
      padding: 0;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
  
      background-color: #90ee90;
      padding: 0 40px;
      height: 60px;
    }

    .navbar img {
      height: 60px;
    }

    .nav-links {
      list-style: none;
      display: flex;
      gap: 30px;
      margin: 0;
    }

    .nav-links a {
      text-decoration: none;
      color: white;
      font-size: 16px;
      height: 100%;
      display: flex;
      align-items: center;
      padding: 0 20px;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .nav-links a:hover {
      background-color: white;
      color: #90ee90;
      box-shadow: 0 0 0 2px white inset; /* Adds a border effect */
    }
    </style>
  <body>
  <nav class="navbar">
  <img src="/senior pics/SENIOR-LOGO.png" alt="Logo">
    <ul class="nav-links">
      <li><a href="#home">Home</a></li>
      <li><a href="#about-us">About Us</a></li>
      <li><a href="#login">Login</a></li>
    </ul>
  </nav>
  
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>