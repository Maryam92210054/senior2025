@extends('layouts.nav2')

@section('content')

<div class="custom-background py-5" style="background-color: #bddb8f; min-height: 100vh;">
    <div class="container white-container p-5" style="background-color: white; border-radius: 10px;">
        <h1 class="text-center italiana-font font-weight-bold">Payment Successful</h1>
        <p class="text-center">Thank you! Your payment has been processed successfully.</p>
        <div class="text-center mt-4">
            <a href="/" class="btn btn-success">Return to Home</a>
        </div>
    </div>
</div>

@endsection

@section('styles')
<style>
    .italiana-font { font-family: 'Italiana', serif; }
    .custom-background { background-color: #bddb8f; min-height: 100vh; }
    .white-container { background-color: white; padding: 30px; border-radius: 10px; }
</style>
@endsection
