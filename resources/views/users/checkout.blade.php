@extends('layouts.app')

@section('content')
<!-- cart-section-starts -->
<section class="cart" id="cart">
    <h1 class="page-title">Checkout</h1>

    <div class="checkout-page">

        <!-- Delivery information section -->
        <div class="delivery-section">
            <form action="{{ route ('checkout.process') }}" method="POST">
                @csrf  
                <h2>Delivery</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name">First name (optional)</label>
                        <input type="text" id="first_name" name="first_name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last name</label>
                        <input type="text" id="last_name" name="last_name" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" required>
                </div>

                <div class="form-group">
                    <label for="apartment">Apartment, suite, etc. (optional)</label>
                    <input type="text" id="apartment" name="apartment">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" required>
                    </div>
                </div>
        </div>

        <!-- Order details section -->
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
                        <td>₱{{ $item->subtotal }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>Subtotal</td>
                        <td>₱{{ $subtotal }}</td>
                    </tr>
                    <tr>
                        <td>Delivery Fee</td>
                        <td>₱{{ $deliveryFee }}</td> <!-- Delivery fee displayed here -->
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td><strong>₱{{ $total }}</strong></td> <!-- Total calculation -->
                    </tr>
                </tfoot>
            </table>

            <div class="payment-options">
                <h3>Select Payment Method</h3>
                
                <div class="payment-option">
                    <input type="radio" id="gcash" name="payment_method" value="GCash" required>
                    <label for="gcash">GCash</label>
                </div>
                
                <div class="payment-option">
                    <input type="radio" id="cod" name="payment_method" value="COD" required>
                    <label for="cod">Cash on Delivery (COD)</label>
                </div>
            </div>

            <!-- Payment method unavailable notice -->
            <div class="payment-message">
                <p>
                    Sorry, it seems that there are no available payment methods. Please contact us if you require assistance or wish to make alternate arrangements.
                </p>
            </div>

            <!-- Place Order button -->
            <button type="submit" class="place-order-btn">Place Order</button>
           
        </div>
        </form>
    </div>
</section>
<!-- cart-section-ends -->
@endsection
