<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>@yield('title','custom')</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{asset('lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
        <link href="{{asset('lib/owlcarousel/owl.carousel.min.css') }}" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link  href="{{ asset('css/style.css') }}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


            
       
    </head>

    <body> <!-- Navbar start -->
        <div class="container-fluid nav-bar">
            <div class="container">
                <nav class="navbar navbar-light navbar-expand-lg py-4">
                    <a href="index.html" class="navbar-brand">
                        <h1 class="text-primary fw-bold mb-0">Cater<span class="text-dark">Serv</span> </h1>
                    </a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                          <a href="{{ route('meals.index') }}" class="nav-item nav-link ">Meals</a>
                          <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Plans</a>
                                <div class="dropdown-menu bg-light">
                                        <a href="{{ route('plans.index') }}" class="nav-item nav-link "> Plans</a>
                                <a href="{{ route('plan-types.index') }}" class="nav-item nav-link "> Plan Types</a>
                                </div>
                            </div>
                          <a href="{{ route('orders.index') }}" class="nav-item nav-link "> Orders</a>

                            @auth
                            <a href="{{ route('logout') }}" class="nav-item nav-link" 
                              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                            </form>
                          @endauth
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->
        @yield('content')
         
    </body>
</html>