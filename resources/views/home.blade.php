<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navigation Bar</title>
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
</head>
<body>
  <nav class="navbar">
  <img src="/senior pics/SENIOR-LOGO.png" alt="Logo">
    <ul class="nav-links">
      <li><a href="#home">Home</a></li>
      <li><a href="#about-us">About Us</a></li>
      <li><a href="#login">Login</a></li>
    </ul>
  </nav>
</body>
</html>



