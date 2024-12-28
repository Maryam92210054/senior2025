@extends('layouts.nav2')

@section('content')

<div class="custom-background py-5" style="background-color: #fefae0; min-height: 100vh;">
    <div class="container white-container p-5" style="background-color: #ccd5ae; border-radius: 10px;">

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

            <!-- Payment Amount -->
            <div class="form-group">
                <label for="amount">Payment Amount</label>
                <input type="text" name="amount" id="amount" class="form-control" value="{{ $calculatedAmount }}" readonly>
            </div>

            <!-- Eco-friendly Packaging Option -->
            <div class="form-group">
                <label for="eco_friendly">Eco-friendly Packaging ($5 extra)</label>
                <input type="checkbox" id="eco_friendly" name="eco_friendly" value="5">
            </div>

            <!-- Display Today's Payment Date -->
            <div class="form-group">
                <label for="payment_date">Payment Date</label>
                <input type="text" id="payment_date" class="form-control" value="{{ $todayDate }}" readonly>
            </div>

            <!-- Account Code Input -->
            <div class="form-group">
                <label for="account_code">Account Code</label>
                <input type="password" name="account_code" id="account_code" class="form-control" placeholder="Enter your account code for payment" required>
                <small id="passwordHelp" class="form-text text-muted">
                    Your account code must be at least 7 characters long and contain at least one uppercase letter, one lowercase letter, one special character, and one number.
                </small>
            </div>

            <!-- Hidden Order ID -->
            <input type="hidden" name="order_id" value="{{ $orderId }}">

            <!-- Display Total Amount -->
            <div id="total-amount-display" class="text-center mt-3" style="font-weight: bold; font-size: 18px;">
                Total Amount: $<span id="total-amount">{{ $calculatedAmount }}</span><br>+5$ if eco-friendly packaging is chosen.
            </div>

            <!-- Submit Button -->
            <div class="text-center mt-4">
                <button type="submit" 
                        style="background-color: #d4a373; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">
                    Submit Payment
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ecoFriendlyCheckbox = document.getElementById('eco_friendly');
        const amountField = document.getElementById('amount');
        const totalAmountDisplay = document.getElementById('total-amount');

        // Original calculated amount
        const baseAmount = parseFloat('{{ $calculatedAmount }}');

        // Attach an event listener to the eco-friendly checkbox
        ecoFriendlyCheckbox.addEventListener('change', function () {
            let updatedAmount = baseAmount;

            // Add $5 if the checkbox is checked
            if (ecoFriendlyCheckbox.checked) {
                updatedAmount += 5;
            }

            // Update the input field and display the total
            amountField.value = updatedAmount.toFixed(2);
            totalAmountDisplay.textContent = updatedAmount.toFixed(2);
        });
    });
</script>