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
  </head>
  <style>
   /* Reset Styles */
body, ul {
  margin: 0;
  padding: 0;
}

/* Navbar Styles */
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: linear-gradient(90deg, #fff, #bddb8f,#809c56); 
  padding: 10px 40px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.navbar img {
  height: 50px;
}

.nav-links {
  list-style: none;
  display: flex;
  gap: 20px;
}

.nav-links a {
  text-decoration: none;
  color: white;
  font-size: 16px;
  padding: 5px 10px;
  border-radius: 5px;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.nav-links a:hover {
  background-color: white;
  color: #bddb8f;
}


    </style>
  <body>
  <nav class="navbar">
  <img src="logo.jpeg" alt="Logo">
  <ul class="nav-links">
    <li><a href="#home">Home</a></li>
    <li><a href="#about-us">About Us</a></li>
    <li><a href="#login">Login</a></li>
  </ul>
</nav>
@yield('content')
  </body>
</html>