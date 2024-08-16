@extends('layouts.app')

@section('content')

<section class="product-details" id="product-details">
    <h1 class="page-title">Shop</h1>

    <div class="small-container single-product">
        <div class="col-1">
            <div class="col-2">
                <img src="{{ asset('assets/img/menu3.jfif') }}" width="100%" alt="{{ $product->name }}">
            </div>

            <div class="col-2">
                <h1>{{ $product->name }}</h1>
                <h4>₱{{ $product->price }}</h4>
                <p class="desc">{{ $product->description }}</p>
                <h4 class="size">Size</h4>
                <select name="size" id="select-size">
                    <option value="">Select Size</option>
                    <option value="16oz">16oz</option>
                    <option value="22oz">22oz</option>
                </select>
                <br>
                <input type="number" value="1" min="1">
                <br>
                <button class="button2">Add to Cart</button>
            </div>
        </div>
    </div>

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

@endsection
