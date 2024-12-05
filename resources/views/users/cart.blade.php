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
        <!-- Quantity input with onchange event -->
        <input type="number" value="{{ $item->qty }}" min="1" class="update-cart" onchange="updatePrice(this)" oninput="validateQuantity(this)" data-row-id="{{ $item->rowId }}">
    </td>
    <td>
        <!-- Subtotal span where price will be updated -->
        ₱<span class="subtotal">{{ $item->subtotal }}</span>
        <!-- Hidden price stored as data attribute for easy retrieval -->
        <span class="hidden-price" data-base-price="{{ $item->price }}" style="display: none;"></span>
    </td>
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
function updatePrice(element) {
    // Get the current quantity from the input element
    let quantity = element.value;
    
    // Get the base price from the hidden price element (converted to float)
    let basePrice = parseFloat(element.closest('tr').querySelector('.hidden-price').dataset.basePrice); 
    
    // Calculate the updated price (base price multiplied by quantity)
    let updatedPrice = basePrice * quantity;
    
    // Update the subtotal (price) in the corresponding row
    element.closest('tr').querySelector('.subtotal').innerText =  + updatedPrice.toFixed(2);
}

function validateQuantity(input) {
    input.value = input.value.replace(/[^0-9]/g, ''); // Only allows digits
    if (input.value.length > 2) {
        input.value = input.value.slice(0, 2); // Limits to 2 digits
    }
}


</script>

@endsection
