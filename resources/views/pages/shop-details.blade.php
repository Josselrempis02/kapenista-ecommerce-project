@extends('layouts.app')

@section('content')
   

    <section class="product-details" id="product-details">
        <h1 class="page-title">Shop</h1>

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show " role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="small-container single-product">
    <div class="col-1">
        <div class="col-2">
            <img src="{{ asset('assets/img/menu3.jfif') }}" width="100%" alt="{{ $product->name }}">
        </div>

        <div class="col-2">
            <h1>{{ $product->name }}</h1>
            <h4 id="product-price">₱{{ $product->price }}</h4>
            <p class="desc">{{ $product->description }}</p>
            <h4 class="size">Size</h4>

            <form action="{{ route('cart.store') }}" method="POST" class="add-cart-form">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                <input type="hidden" id="hidden-price" name="price" value="{{ $product->price }}">
                <select name="size" id="select-size" onchange="updatePrice()">
                    <option value="16oz">16oz</option>
                    <option value="22oz">22oz</option>
                </select>
                <br>
                <input type="number" name="quantity" value="1" min="1">
                <br>
                <button class="button2">Add to Cart</button>
            </form>
        </div>
    </div>
</div>

<script>
    function updatePrice() {
        let selectSize = document.getElementById('select-size').value;
        let basePrice = parseFloat(document.getElementById('hidden-price').value);
        let updatedPrice = basePrice;

        if (selectSize === '22oz') {
            updatedPrice += 10; // Add 10 to the base price for 22oz size
        }

        document.getElementById('product-price').innerText = '₱' + updatedPrice.toFixed(2);
    }
</script>


        @if(!$otherProducts->isEmpty())
            <h1 class="related-products-title">Related Products</h1>
            <div class="shop-product">
                <div class="shop-product-container">
                    @foreach($otherProducts as $otherProduct)
                        <div class="shop-product-row">
                            <img src="{{ asset('assets/img/menu3.jfif') }}" alt="{{ $otherProduct->name }}">
                            <div class="shop-product-text">
                                <h5>{{ $otherProduct->name }}</h5>
                            </div>
                            <div class="shop-product-price">
                                <p>₱{{ $otherProduct->price }}</p>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-button">
                                    <a href="{{ route('shop.details', $otherProduct->product_id) }}">Add to cart</a>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <p>No related products available.</p>
        @endif
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var errorAlert = document.getElementById('error-alert');
            if (errorAlert) {
                setTimeout(function() {
                    errorAlert.style.opacity = '0';
                    setTimeout(function() {
                        errorAlert.style.display = 'none';
                    }, 600); // Match this to the transition duration
                }, 10000); // Time in milliseconds (10 seconds)
            }
        });
    </script>
@endsection
