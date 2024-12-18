@extends('layouts.nav2')

@section('content')

<div class="custom-background py-5" style="background-color: #bddb8f; min-height: 100vh;">
    <div class="container white-container p-5" style="background-color: white; border-radius: 10px;">
      
        <!-- Payment Method Sections (Half-half navbar) -->
        <div class="d-flex mb-4">
            <div id="omt-section" class="flex-fill p-3 text-center" style="background-color: #ffc107; color: black; cursor: pointer;">
                OMT
            </div>
            <div id="whish-section" class="flex-fill p-3 text-center" style="background-color: #dc3545; color: white; cursor: pointer;">
                Whish
            </div>
        </div>

        <!-- Payment Method Dropdown -->
        <div class="form-group">
            <label for="payment_method">Select Payment Method</label>
            <select id="payment_method" name="payment_method" class="form-control" required>
                <option value="omt">OMT</option>
                <option value="whish">Whish</option>
            </select>
        </div>

        <form method="POST" action="{{ route('payment.store', ['order_id' => $orderId]) }}">
            @csrf
            <!-- Payment Amount (Display the calculated amount with $) -->
            <div class="form-group">
                <label for="amount">Payment Amount</label>
                <input type="text" name="amount" id="amount" class="form-control" value="${{ $calculatedAmount }}" readonly>
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

            <!-- Display selected payment method -->
            <div id="selected-method" class="text-center mt-3">
                <!-- Selected payment method will appear here -->
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

    /* Navbar-like style for OMT and Whish */
    #omt-section { background-color: #ffc107; color: black; cursor: pointer; }
    #whish-section { background-color: #dc3545; color: white; cursor: pointer; }

    /* Make the sections span half width each */
    .d-flex > div {
        flex: 1;
        padding: 20px;
        text-align: center;
    }

    .d-flex .text-center {
        text-align: center;
        font-size: 20px;
        font-weight: bold;
    }
</style>
@endsection

@section('scripts')
<script>
    // Track selected payment method from the dropdown
    document.getElementById('payment_method').addEventListener('change', function() {
        let selectedPaymentMethod = this.value;
        document.getElementById('selected-method').innerText = "You have selected: " + selectedPaymentMethod.charAt(0).toUpperCase() + selectedPaymentMethod.slice(1);
    });

    // Event listener for OMT section click
    document.getElementById('omt-section').addEventListener('click', function() {
        document.getElementById('selected-method').innerText = "You have selected: OMT";
    });

    // Event listener for Whish section click
    document.getElementById('whish-section').addEventListener('click', function() {
        document.getElementById('selected-method').innerText = "You have selected: Whish";
    });
</script>
@endsection
