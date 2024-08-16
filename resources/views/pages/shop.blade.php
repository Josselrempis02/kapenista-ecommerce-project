@extends('layouts.app')

@section('content')

<section class="Shop">
        
        <h1 class="page-title">Shop</h1>

        <div class="shop-container">
            <div class="product-categories">
                <ul>
                    <li><a href="">All Coffee</a></li>
                    <li><a href="">Cold Coffee</a></li>
                    <li><a href="">Hot Coffee</a></li>
                    <li><a href="">Bottle Beverages</a></li>
                </ul>
            </div>
        </div>

        <div class="shop-product">
    <div class="shop-product-container">
        @foreach($products as $product)
            <div class="shop-product-row">
                <img src="{{ asset('assets/img/menu3.jfif') }}" alt="{{ $product->name }}">
                <div class="shop-product-text">
                  <h5>{{ $product->name }}</h5>
                </div>
                <div class="shop-product-price">
                  <p>₱{{ $product->price }}</p>
                </div>
                <div class="add-to-cart">
                  <button class="add-to-cart-button">
                  <a href="{{ route('shop.details', $product->product_id) }}">Add to cart</a>

                  </button>
                </div>
            </div>
        @endforeach
    </div>
</div>
       
    </section>
    
@endsection