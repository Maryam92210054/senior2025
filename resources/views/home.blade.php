@extends('layouts.nav1')
@section('title', 'Login')
@section('content')
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>CaterServ - Catering Services Website Template</title>
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
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


       

      


        <!-- Hero Start -->
        <div class="container-fluid bg-light py-6 my-6 mt-0">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-7 col-md-12">
                        <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-4 animated bounceInDown">Welcome to WeekCraft</small>
                        <h1 class="display-1 mb-4 animated bounceInDown">Week <span class="text-primary">Craft</span> <br>Find your most suitable and appropriate meals.</h1>
                        <a href="{{ route('login') }}" class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 me-4 animated bounceInLeft">Log In</a>
                        <a href="{{ route('about') }}" class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 animated bounceInLeft">About Us</a>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <img src="mealsImages/bg.png" class="img-fluid rounded animated zoomIn" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


     

       
    <!-- Service Start -->
<div class="container-fluid service py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Our Process</small>
            <h1 class="display-5 mb-5">How It Works</h1>
        </div>
        <div class="row g-4">
            <!-- Step 1: Sign In -->
            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
                <div class="bg-light rounded service-item">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-icon text-center">
                            <i class="fas fa-user-plus fa-7x text-primary mb-4"></i>
                            <h4 class="mb-3">Sign In</h4>
                            <p class="mb-4">Create your account and fill in your personal details.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 2: Log In -->
            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.3s">
                <div class="bg-light rounded service-item">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-icon text-center">
                            <i class="fas fa-sign-in-alt fa-7x text-primary mb-4"></i>
                            <h4 class="mb-3">Log In</h4>
                            <p class="mb-4">Log in to access your dashboard and start choosing your plan.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 3: View Meals -->
            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.5s">
                <div class="bg-light rounded service-item">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-icon text-center">
                            <i class="fas fa-eye fa-7x text-primary mb-4"></i>
                            <h4 class="mb-3">View Meals</h4>
                            <p class="mb-4">Browse through available meal options and decide what suits you best.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 4: Choose Plan -->
            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.7s">
                <div class="bg-light rounded service-item">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-icon text-center">
                            <i class="fas fa-list-alt fa-7x text-primary mb-4"></i>
                            <h4 class="mb-3">Choose Plan</h4>
                            <p class="mb-4">Select the meal plan that suits your goals and preferences.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 5: Choose How Many Days -->
            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
                <div class="bg-light rounded service-item">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-icon text-center">
                            <i class="fas fa-calendar-alt fa-7x text-primary mb-4"></i>
                            <h4 class="mb-3">Choose Days</h4>
                            <p class="mb-4">Select how many days you want your meal plan to cover.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 6: Choose Your Meals -->
            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.3s">
                <div class="bg-light rounded service-item">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-icon text-center">
                            <i class="fas fa-utensils fa-7x text-primary mb-4"></i>
                            <h4 class="mb-3">Choose Meals</h4>
                            <p class="mb-4">Pick your meals for each day from our variety of options.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 7: Pay -->
            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.5s">
                <div class="bg-light rounded service-item">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-icon text-center">
                            <i class="fas fa-credit-card fa-7x text-primary mb-4"></i>
                            <h4 class="mb-3">Pay</h4>
                            <p class="mb-4">Complete your payment securely to confirm your meal plan.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 8: Receive Plan -->
            <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.7s">
                <div class="bg-light rounded service-item">
                    <div class="service-content d-flex align-items-center justify-content-center p-4">
                        <div class="service-content-icon text-center">
                            <i class="fas fa-box fa-7x text-primary mb-4"></i>
                            <h4 class="mb-3">Receive Plan</h4>
                            <p class="mb-4">Sit back, relax, and enjoy your healthy meals delivered to you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->


    
       
       <!-- Testimonial Start --> 
<div class="container-fluid py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Testimonial</small>
            <h1 class="display-5 mb-5">What Our Customers Say!</h1>
        </div>
        <div class="owl-carousel owl-theme testimonial-carousel testimonial-carousel-1 mb-4 wow bounceInUp" data-wow-delay="0.1s">
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="img/testimonial-1.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Emily Davis</h4>
                        <p class="m-0">Fitness Enthusiast</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">"The meal plans fit perfectly with my fitness goals. Everything is delicious and healthy!"</p>
                </div>
            </div>
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="img/testimonial-2.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">James Smith</h4>
                        <p class="m-0">Busy Professional</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">"As someone with little time to cook, this service has been a lifesaver. Great variety and so convenient!"</p>
                </div>
            </div>
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="img/testimonial-3.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Olivia Johnson</h4>
                        <p class="m-0">Nutritionist</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">"I recommend these meal plans to all my clients. They're balanced, wholesome, and taste amazing!"</p>
                </div>
            </div>
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="img/testimonial-4.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Liam Brown</h4>
                        <p class="m-0">Athlete</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">"These meals keep me fueled and ready for my training. High-quality ingredients and great flavors!"</p>
                </div>
            </div>
        </div>
        <div class="owl-carousel testimonial-carousel testimonial-carousel-2 wow bounceInUp" data-wow-delay="0.3s">
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="img/testimonial-1.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Emily Davis</h4>
                        <p class="m-0">Fitness Enthusiast</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">"The meal plans fit perfectly with my fitness goals. Everything is delicious and healthy!"</p>
                </div>
            </div>
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="img/testimonial-2.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">James Smith</h4>
                        <p class="m-0">Busy Professional</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">"As someone with little time to cook, this service has been a lifesaver. Great variety and so convenient!"</p>
                </div>
            </div>
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="img/testimonial-3.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Olivia Johnson</h4>
                        <p class="m-0">Nutritionist</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">"I recommend these meal plans to all my clients. They're balanced, wholesome, and taste amazing!"</p>
                </div>
            </div>
            <div class="testimonial-item rounded bg-light">
                <div class="d-flex mb-3">
                    <img src="img/testimonial-4.jpg" class="img-fluid rounded-circle flex-shrink-0" alt="">
                    <div class="position-absolute" style="top: 15px; right: 20px;">
                        <i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="ps-3 my-auto">
                        <h4 class="mb-0">Liam Brown</h4>
                        <p class="m-0">Athlete</p>
                    </div>
                </div>
                <div class="testimonial-content">
                    <div class="d-flex">
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                        <i class="fas fa-star text-primary"></i>
                    </div>
                    <p class="fs-5 m-0 pt-3">"These meals keep me fueled and ready for my training. High-quality ingredients and great flavors!"</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End --> 

      <!-- Blog Start -->
<div class="container-fluid blog py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Our Blog</small>
            <h1 class="display-5 mb-5">Stay Updated With Healthy Tips</h1>
        </div>
        <div class="row gx-4 justify-content-center">
            <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s">
                <div class="blog-item">
                    <div class="overflow-hidden rounded">
                    <img src="mealsImages/snack.jpg" class="img-fluid w-100" alt="Healthy Snacks">
                    </div>
                    <div class="blog-content mx-4 d-flex rounded bg-light">
                        <div class="text-dark bg-primary rounded-start">
                            <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                <p class="fw-bold mb-0">10</p>
                                <p class="fw-bold mb-0">Jan</p>
                            </div>
                        </div>
                        <a href="#" class="h5 lh-base my-auto h-100 p-3">Top 5 Healthy Snacks to Boost Your Energy</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.3s">
                <div class="blog-item">
                    <div class="overflow-hidden rounded">
                    <img src="mealsImages/prep.jpg" class="img-fluid w-100" alt="Meal Prepping">
                    </div>
                    <div class="blog-content mx-4 d-flex rounded bg-light">
                        <div class="text-dark bg-primary rounded-start">
                            <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                <p class="fw-bold mb-0">22</p>
                                <p class="fw-bold mb-0">Jan</p>
                            </div>
                        </div>
                        <a href="#" class="h5 lh-base my-auto h-100 p-3">How to Meal Prep for a Healthy Week</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.5s">
                <div class="blog-item">
                    <div class="overflow-hidden rounded">
                    <img src="mealsImages/deliv.jpg" class="img-fluid w-100" alt="Nutrition Advice">
                    </div>
                    <div class="blog-content mx-4 d-flex rounded bg-light">
                        <div class="text-dark bg-primary rounded-start">
                            <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                <p class="fw-bold mb-0">05</p>
                                <p class="fw-bold mb-0">Feb</p>
                            </div>
                        </div>
                        <a href="#" class="h5 lh-base my-auto h-100 p-3">Some Of Our Delivery Trips</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog End -->
 <!-- Location Start -->
<div class="container-fluid location py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Our Location</small>
            <h1 class="display-5 mb-5">We Deliver Fresh Meals to Akkar, Northern Lebanon</h1>
        </div>
        <div class="row gx-4 justify-content-center">
            <div class="col-md-12 wow bounceInUp" data-wow-delay="0.1s">
                <div class="location-item">
                    <div class="overflow-hidden rounded">
                        <img src="mealsImages/map.png" class="img-fluid w-100" alt="Map of Akkar, Northern Lebanon">
                    </div><br><br>
                    <div class="location-content mx-4 d-flex rounded bg-light">
                        <div class="text-dark bg-primary rounded-start">
                            <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                <p class="fw-bold mb-0">Akkar, Northern Lebanon</p>
                            </div>
                        </div>
                        <div class="my-auto h-100 p-3">
                            <p>Our meal delivery service covers the beautiful region of Akkar, providing fresh, healthy meals to homes and businesses. We pride ourselves on supporting the local community with quick and reliable deliveries. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Location End -->


     <!-- Footer Start -->
<div class="container-fluid footer py-6 my-6 mb-0 bg-light wow bounceInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h1 class="text-primary">Week<span class="text-dark">Craft</span></h1>
                    <p class="lh-lg mb-4">A website where you freely craft your loved meals.</p>
                    <div class="footer-icon d-flex">
                        <a class="btn btn-primary btn-sm-square me-2 rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-sm-square me-2 rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn btn-primary btn-sm-square me-2 rounded-circle"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="btn btn-primary btn-sm-square rounded-circle"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="mb-4">Special Facilities</h4>
                    <div class="d-flex flex-column align-items-start">
                        <a class="text-body mb-3" href=""><i class="fa fa-check text-primary me-2"></i>Whole-Grain Pancakes with Almond Butter</a>
                        <a class="text-body mb-3" href=""><i class="fa fa-check text-primary me-2"></i>Watermelon, Sumac & Feta Salad</a>
                        <a class="text-body mb-3" href=""><i class="fa fa-check text-primary me-2"></i>Vermicelli Noodle & Beef Salad</a>
                        <a class="text-body mb-3" href=""><i class="fa fa-check text-primary me-2"></i>Tuna Pasta Salad</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="mb-4">Contact Us</h4>
                    <div class="d-flex flex-column align-items-start">
                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i> Akkar, Lebanon</p>
                        <p><i class="fa fa-phone-alt text-primary me-2"></i> (+961)26073155 </p>
                        <p><i class="fas fa-envelope text-primary me-2"></i> WeekCraft@gmail.com</p>
                        <p><i class="fa fa-clock text-primary me-2"></i> 24/7 Hours Service</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
            <div class="footer-item text-center">
    <img src="mealsImages/hi.png" alt="WeekCraft Logo" class="img-fluid" 
         style="width: 191px; height: auto; max-width: 100%;">
</div>


            </div>
        </div>
    </div>
</div>
<!-- Footer End -->





        <!-- Back to Top -->
        <a href="#" class="btn btn-md-square btn-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
@endsection