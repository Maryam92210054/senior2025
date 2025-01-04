@extends('layouts.nav2')

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />

<div class="container-fluid" style="background-color: #fefae0; min-height: 100vh; display: flex; align-items: center; justify-content: center;">
    <div class="container" style="margin-top: -50px;"> <!-- Moved upwards -->
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="message-box _success">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <h2> Your payment was successful </h2>
                    <p> Thank you for your payment.<br> We received your purchase request, we'll be in touch shortly! </p>      
                </div>
              
                <div class="text-center mt-4">
                    <a href="{{ route('view.plan') }}" class="btn btn-success btn-lg">View Your Plan</a>
                </div>
            </div> 
        </div> 
    </div> 
</div>

<style>
    ._failed{ border-bottom: solid 4px red !important; }
    ._failed i{  color:red !important;  }

    ._success {
        box-shadow: 0 15px 25px #00000019;
        padding: 60px;
        text-align: center;
        margin: 0 auto;
        border-bottom: solid 4px #D4A373; /* Updated green */
        background-color: #fff;
    }

    ._success i {
        font-size: 65px;
        color: #D4A373; /* Updated green */
    }

    ._success h2 {
        margin-bottom: 15px;
        font-size: 45px;
        font-weight: 500;
        line-height: 1.2;
        margin-top: 10px;
    }

    ._success p {
        margin-bottom: 0px;
        font-size: 20px;
        color: #495057;
        font-weight: 500;
    }

    body {
        margin: 0;
        padding: 0;
        height: 100%;
    }

    .btn-success {
        background-color: #D4A373; /* Updated green */
        border-color: #D4A373; /* Updated green */
        padding: 10px 20px;
        font-size: 18px;
    }
</style>

@endsection
