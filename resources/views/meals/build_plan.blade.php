@extends('layouts.nav2')

@section('content')


 <!-- Team Start -->
<div class="container-fluid team py-6">
    <div class="container">
        <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
            <h2 class=" display-5 mb-5 d-inline-block fw-bold text-dark bg-light border border-primary rounded-pill px-4 py-1 mb-3">{{ $goal->name }} Plans</h2>
            <h1 class="display-5 mb-5">Select the plan that best fits your goals and preferences.</h1>
        </div>
        <div class="row justify-content-center g-4">
            @forelse($plans as $plan)
                <div class="col-lg-3 col-md-6 wow bounceInUp d-flex" data-wow-delay="0.3s">
                    <a href="{{ route('chooseDays', ['plan' => $plan->id]) }}" class="text-decoration-none w-100">
                        <div class="team-item rounded h-100 d-flex flex-column">
                            <img class="img-fluid rounded-top" src="img/plan.jpeg" alt="">
                            <div class="team-content text-center py-3  rounded-bottom flex-grow-1">
                                <h4 >{{ $plan->planType->description }}</h4>
                                <p >Price Per Day: ${{ $plan->price }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <p class="text-center">No plans available for your goal.</p>
            @endforelse
        </div>
    </div>
</div>
<!-- Team End -->


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
    
@endsection
