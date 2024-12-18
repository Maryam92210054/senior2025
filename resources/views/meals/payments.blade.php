@extends('layouts.nav2')

@section('content')

<div class="custom-background py-5" style="background-color: #bddb8f; min-height: 100vh;">
    <div class="container white-container p-5" style="background-color: white; border-radius: 10px;">
        <h1 class="text-center italiana-font font-weight-bold">Payment</h1>

        <!-- Payment Method Options -->
        <div class="d-flex justify-content-center mb-4">
            <button type="button" id="omt-btn" class="btn btn-warning mx-2">OMT</button>
            <button type="button" id="whish-btn" class="btn btn-danger mx-2">Whish</button>
        </div>

        <form method="POST" action="{{ route('payment.store', ['order_id' => $orderId]) }}">
            @csrf
            <!-- Payment Amount (Display the calculated amount) -->
            <div class="form-group">
                <label for="amount">Payment Amount</label>
                <input type="text" name="amount" id="amount" class="form-control" value="{{ $calculatedAmount }}" readonly>
            </div>

            <!-- Account Code Input (Static, not stored) -->
            <div class="form-group">
                <label for="account_code">Account Code</label>
                <input type="text" name="account_code" id="account_code" class="form-control" placeholder="Enter your account code for payment" required>
            </div>

            <!-- Payment Date -->
            <div class="form-group">
                <label for="payment_date">Payment Date</label>
                <input type="date" name="payment_date" id="payment_date" class="form-control" required>
            </div>

            <!-- Submit Button -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success">Submit Payment</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('styles')
<style>
    .italiana-font { font-family: 'Italiana', serif; }
    .custom-background { background-color: #bddb8f; min-height: 100vh; }
    .white-container { background-color: white; padding: 30px; border-radius: 10px; }

    /* Button styles for payment methods */
    #omt-btn { background-color: #ffc107; color: black; }
    #whish-btn { background-color: #dc3545; color: white; }
</style>
@endsection

@section('scripts')
<script>
    // Change form background color to red for both OMT and Whish button clicks
    document.getElementById('omt-btn').addEventListener('click', function() {
        document.querySelector('.white-container').style.backgroundColor = '#f5c6cb'; // Red for OMT
    });

    document.getElementById('whish-btn').addEventListener('click', function() {
        document.querySelector('.white-container').style.backgroundColor = '#f5c6cb'; // Red for Whish
    });
</script>
@endsection
