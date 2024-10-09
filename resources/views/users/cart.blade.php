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
        <thead>
            <tr>
                <th>Product</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
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
                    <td>
                        <input type="number" value="{{ $item->qty }}" min="1" class="update-cart" data-row-id="{{ $item->rowId }}">
                    </td>
                    <td>₱<span class="subtotal">{{ $item->subtotal }}</span></td>
                </tr>
            @endforeach
        </tbody>
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

<!-- Include jQuery if you haven't already -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.update-cart').on('change', function() {
            var rowId = $(this).data('row-id'); // Get the rowId of the item
            var qty = $(this).val(); // Get the new quantity

            // AJAX request to update cart quantity
            $.ajax({
                url: '{{ route("cart.update") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    rowId: rowId,
                    qty: qty
                },
                success: function(response) {
                    if (response.success) {
                        location.reload(); // Reload the page to reflect updated totals
                    }
                }
            });
        });
    });
</script>

@endsection
