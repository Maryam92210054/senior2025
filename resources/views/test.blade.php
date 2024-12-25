
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
       
    </head>
    <body>
            <!-- Events Start -->
            <div class="container-fluid event py-6">
            <div class="container">
                <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                    <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Latest Events</small>
                    <h1 class="display-5 mb-5">Our Social & Professional Events Gallery</h1>
                </div>
                <div class="tab-class text-center">

                <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
    <div class="event-img position-relative">
        <img class="img-fluid rounded w-100" src="img/event-1.jpg" alt="">
        <div class="event-overlay d-flex flex-column p-4">
            <h4 class="me-auto">Wedding</h4>
            <!-- Trigger for Modal -->
            <a href="#" class="my-auto" data-bs-toggle="modal" data-bs-target="#textModal">
                <i class="fas fa-search-plus text-dark fa-2x"></i>
            </a>
        </div>
    </div>
</div>

<!-- Modal Structure -->
<div class="modal fade" id="textModal" tabindex="-1" aria-labelledby="textModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="textModalLabel">Event Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>This is an example of text content in the pop-up. You can provide details about the event here, such as description, date, time, or any other information.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

                </div>
            </div>
        </div>
        <!-- Events End -->
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