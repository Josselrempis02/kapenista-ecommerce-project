@extends('layouts.app')

@section('content')
<!-- cart-section-starts -->
<section class="cart" id="cart">
    <h1 class="page-title">Checkout</h1>

    <div class="small-container cart-page">
        @if ($cartItems->isEmpty())
            <p>Your cart is empty. <a href="{{ route('shop') }}">Continue Shopping</a></p>
        @else
            <form action="" method="POST">
                @csrf

                <table>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                    @foreach ($cartItems as $item)
                    <tr>
                        <td>
                            <div class="cart-info">
                                <img src="{{ asset('assets/img/menu3.jfif') }}" alt="">
                                <div>
                                    <p>{{ $item->name }}</p>
                                    <a href="{{ route('cart.remove', $item->rowId) }}">remove</a>
                                </div>
                            </div>
                        </td>
                        <td><span class="Quantity-num">{{ $item->qty }}</span></td>
                        <td>₱{{ $item->subtotal }}</td>
                    </tr>
                    @endforeach
                </table>

                <div class="total-price cart-price">
                    <div class="table-container">
                        <h1>Your Order</h1>
                        <table>
                            <tr>
                                <td>Subtotal</td>
                                <td>₱{{ $subtotal }}</td>
                            </tr>
                            <tr>
                                <td>Delivery Fee</td>
                                <td>₱{{ $deliveryFee }}</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>₱{{ $total }}</td>
                            </tr>
                        </table>

                        <div class="payment">
                            <label class="checkbox-container">Gcash
                                <input type="radio" name="payment_method" value="gcash">
                                <span class="checkmark"></span>
                            </label>
                            <label class="checkbox-container">COD
                                <input type="radio" name="payment_method" value="cod">
                                <span class="checkmark"></span>
                            </label>
                        </div>

                        <div class="cart-btn">
                            <button type="submit" class="checkout-btn">Place Order</button>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    </div>
</section>
<!-- cart-section-ends -->
@endsection
