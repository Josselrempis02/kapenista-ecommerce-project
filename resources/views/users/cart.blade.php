@extends('layouts.app')

@section('content')

<section class="cart" id="cart">
    <h1 class="page-title">Cart</h1>

    <div class="small-container cart-page">
        @if ($cartItems->isEmpty())
            <div class="cart-empty">
                <p>Your cart is currently empty.</p>
            </div>
            <div class="button-shop">
                <button><a href="{{ route('shop') }}" class="shop-link">Continue Shopping</a></button>
            </div>
            
        @else
            <table>
                <tr>
                    <th>Product</th>
                    <th>Size</th>
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
                    <td>{{ $item->options->size }}</td> <!-- Display size here -->
                    <td><input type="number" value="{{ $item->qty }}" readonly></td>
                    <td>₱{{ $item->subtotal }}</td>
                </tr>
                @endforeach
            </table>

            <div class="total-price cart-price">
                <div class="table-container">
                    <h1>Cart Total</h1>
                    <table>
                        <tr>
                            <td>Subtotal</td>
                            <td>₱{{ $total }}</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>₱{{ $total }}</td>
                        </tr>
                    </table>

                    <div class="cart-btn">
                        <a href="{{ route('cart.clear') }}" class="cancel-btn">Cancel order</a>
                        <a href="/shop-checkout" class="checkout-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

@endsection
