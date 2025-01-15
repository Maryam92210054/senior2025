@extends('layouts.nav1')
@section('title', 'Login')
@section('content')

<body>
    <!-- Hero Start -->
    <div class="container-fluid  py-3 my-3 mt-0">
        <div class="container text-center animated bounceInDown" style="margin-top:20px;">
            <h1 class="display-1 mb-4">About Us</h1>
        </div>
    </div>
    <!-- Hero End -->


    <!-- About Satrt -->
    <div class="container-fluid py-6">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                    <img src="mealsImages/hi.png" class="img-fluid rounded" alt="">
                </div>
                <div class="col-lg-7 wow bounceInUp" data-wow-delay="0.3s">
                    <h1 class="display-5 mb-4">Welcome to WeekCraft</h1>
                    <p class="mb-4">At WeekCraft, we empower you to take control of your meals and craft your week exactly the way you want it. Our name reflects our mission: giving you the tools to design a fully customizable meal plan tailored to your unique goals and preferences.
                        Whether you’re aiming to lose weight, build muscle, or maintain a healthy lifestyle, WeekCraft makes it easy to personalize every detail. You choose the meals, set your dietary preferences, and schedule your plan—all with the flexibility to fit your busy life.
                        With WeekCraft,the power is in your hands to create a week that's healthy, delicious, and uniquely</p>
                    <div class="row g-4 text-dark mb-5">
                        <div class="col-sm-6">
                            <i class="fas fa-share text-primary me-2"></i>Healthy, Delicious Meal Options
                        </div>
                        <div class="col-sm-6">
                            <i class="fas fa-share text-primary me-2"></i>Custom Meal Plans
                        </div>
                        <div class="col-sm-6">
                            <i class="fas fa-share text-primary me-2"></i>Dietary Flexibility
                        </div>
                        <div class="col-sm-6">
                            <i class="fas fa-share text-primary me-2"></i>Daily Delivery To Your Doorstep
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Fact Start-->
    <div class="container-fluid faqt py-6">
        <div class="container">
            <div class="row g-4 align-items-center">
                <!-- Facts Section -->
                <div class="col-lg-7">
                    <div class="row g-4">
                        <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.7s">
                            <div class="faqt-item rounded p-4 text-center" style="background:#d4a373">
                                <i class="fas fa-calendar-week fa-4x mb-4 text-white"></i>
                                <h1 class="display-4 fw-bold" data-toggle="counter-up">3-7</h1>
                                <p class="text-dark text-uppercase fw-bold mb-0">Day Weekly Plan</p>
                            </div>
                        </div>
                        <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.5s">
                            <div class="faqt-item rounded p-4 text-center" style="background:#d4a373">
                                <i class="fas fa-users-cog fa-4x mb-4 text-white"></i>
                                <h1 class="display-4 fw-bold" data-toggle="counter-up">10+</h1>
                                <p class="text-dark text-uppercase fw-bold mb-0">Expert Chefs</p>
                            </div>
                        </div>
                        <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.3s">
                            <div class="faqt-item rounded p-4 text-center" style="background:#d4a373">
                                <i class="fas fa-utensils fa-4x mb-4 text-white"></i>
                                <h1 class="display-4 fw-bold" data-toggle="counter-up">100+</h1>
                                <p class="text-dark text-uppercase fw-bold mb-0">Meal Options</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Picture Section -->
                <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                    <img src="mealsImages/about.jfif" class="img-fluid rounded" style="height: 400px; width: 400px; object-fit: cover;" alt="">
                </div>

            </div>
        </div>
    </div>
    <!-- Fact End-->



    <!-- Team Start -->
    <div class="container-fluid team py-6">
        <div class="container">
            <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Our Team</small>
                <h1 class="display-5 mb-5">We have experienced Team</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow bounceInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded">
                        <img class="img-fluid rounded-top " src="img/chefs.jfif" alt="">
                        <div class="team-content text-center py-3  rounded-bottom">
                            <h4 class="text-primary">Chefs</h4>
                            <p class="text-dark mb-0">With years of experience, they ensure every dish is a masterpiece that satisfies your taste buds and meets your dietary goals</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow bounceInUp" data-wow-delay="0.3s">
                    <div class="team-item rounded">
                        <img class="img-fluid rounded-top " src="img/nutritionists.jfif" alt="">
                        <div class="team-content text-center py-3  rounded-bottom">
                            <h4 class="text-primary">Nutritionists</h4>
                            <p class="text-dark mb-0">Our Certified nutririonists ensure that each meal is balanced, nutritious, and aligned with your dietary needs</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow bounceInUp" data-wow-delay="0.5s">
                    <div class="team-item rounded">
                        <img class="img-fluid rounded-top " src="img/delivery.jfif" alt="">
                        <div class="team-content text-center py-3  rounded-bottom">
                            <h4 class="text-primary">Delivery Team</h4>
                            <p class="text-dark mb-0">Our dedicated delivery professionals ensure your meals arrive daily, fresh and on time with precision and care.</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow bounceInUp" data-wow-delay="0.7s">
                    <div class="team-item rounded">
                        <img class="img-fluid rounded-top " src="img/support.jfif" alt="">

                        <div class="team-content text-center py-3  rounded-bottom">
                            <h4 class="text-primary">Customer Support</h4>
                            <p class="text-dark mb-0">Our friendly customer support team is here to help with any questions or special requests. We’ve got you covered</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
    <!-- Footer Start -->
    <div class="container-fluid footer py-3 my-3 mb-0 bg-light wow bounceInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <!-- First Item -->
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h1 class="text-primary">Week<span class="text-dark">Craft</span></h1>
                        <p class="lh-base mb-3">A website where you freely craft your loved meals.</p>
                        <div class="footer-icon d-flex">
                            <a class="btn btn-primary btn-sm-square me-2 rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-sm-square me-2 rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn btn-primary btn-sm-square me-2 rounded-circle"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="btn btn-primary btn-sm-square rounded-circle"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Centered Contact Us -->
                <div class="col-lg-5 col-md-6 mx-auto text-center">
                    <div class="footer-item">
                        <h4 class="mb-3">Contact Us</h4>
                        <div class="d-flex flex-wrap justify-content-around text-start">
                            <p class="flex-fill px-3"><i class="fa fa-map-marker-alt text-primary me-2"></i> Akkar, Lebanon</p>
                            <p class="flex-fill px-3"><i class="fa fa-phone-alt text-primary me-2"></i> (+961)26073155 </p>
                            <p class="flex-fill px-3"><i class="fas fa-envelope text-primary me-2"></i> WeekCraft@gmail.com</p>
                            <p class="flex-fill px-3"><i class="fa fa-clock text-primary me-2"></i> 24/7 Hours Service</p>
                        </div>
                    </div>
                </div>

                <!-- Last Item -->
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="footer-item">
                        <img src="mealsImages/hi.png" alt="WeekCraft Logo" class="img-fluid"
                            style="width: 120px; height: auto;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    @endsection