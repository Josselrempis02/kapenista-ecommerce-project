@extends('layouts.app')

@section('content')
<section class="cart" id="cart">
    <h1 class="page-title">Checkout</h1>

    <div class="checkout-page">
        <div class="delivery-section">
            <form action="{{ route('checkout.process') }}" method="POST" id="checkout-form" enctype="multipart/form-data">
                @csrf  
                <h2>Delivery</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name">Name</label>
                        <input type="text" id="Name" name="Name" required>

                        @error('Name')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                    </div>

                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" required>
                    @error('address')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="apartment">Apartment, suite, etc. (optional)</label>
                    <input type="text" id="apartment" name="apartment">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" required>
                        @error('city')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                    </div>
                </div>
        </div>

        <div class="order-details">
            <h2>Your order</h2>
            <table class="order-summary">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <td>
                        {{ $item->name }} 
                            <strong> x {{ $item->qty }}</strong>
                        </td>
                        <td>₱{{ number_format($item->price * $item->qty, 2) }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>Subtotal</td>
                        <td>₱{{ number_format($subtotal, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Delivery Fee</td>
                        <td>₱{{ number_format($deliveryFee, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td><strong>₱{{ number_format($total, 2) }}</strong></td>
                    </tr>
                </tfoot>
            </table>

            <div class="payment-options">
                <h3>Select Payment Method</h3>
                
                <div class="payment-option">
                    <input type="radio" id="gcash" name="payment_method" value="GCash" required onchange="toggleGcashQR(true)">
                    <label for="gcash">GCash</label>
                </div>
                
                <div class="payment-option">
                    <input type="radio" id="cod" name="payment_method" value="COD" required onchange="toggleGcashQR(false)">
                    <label for="cod">Cash on Delivery (COD)</label>
                </div>
            </div>

            <div id="gcash-qr-section" style="display: none;">
                <h3>Scan this QR Code to Pay with GCash</h3>
                <img src="{{ asset('assets/img/test.png') }}" alt="GCash QR Code" class="gcash-qr-code">
                <p>Please scan the QR code using your GCash app to complete the payment.</p>

                <div class="form-group gcash-form">
                    <label for="gcash_reference_number">GCash Reference Number:</label>
                    <input type="number" id="gcash_reference_number" name="gcash_reference_number" required>

                    <label for="gcash_receipt">Upload GCash Receipt:</label>
                    <input type="file" id="gcash_receipt" name="gcash_receipt" accept="image/*" required>
                    <p>After scanning the QR code, please upload a screenshot or photo of your GCash receipt.</p>
                </div>
            </div>

            <input type="hidden" name="total" value="{{ $total }}">
            <button type="submit" class="place-order-btn">Place Order</button>
        </div>
        </form>
    </div>
</section>

<script>
   function toggleGcashQR(show) {
    const qrSection = document.getElementById('gcash-qr-section');
    const gcashReferenceNumber = document.getElementById('gcash_reference_number');
    const gcashReceipt = document.getElementById('gcash_receipt');

    if (show) {
        qrSection.style.display = 'block';
        gcashReferenceNumber.required = true;
        gcashReceipt.required = true;
    } else {
        qrSection.style.display = 'none';
        gcashReferenceNumber.required = false;
        gcashReceipt.required = false;
    }
}

</script>
@endsection
