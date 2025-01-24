@extends('layouts.app')

@section('content')

<section class="Shop">
    <h1 class="page-title">Shop</h1>

    {{-- Success message display --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="shop-container">
        <div class="product-categories">
            <ul>
                <li><a href="{{ route('shop') }}">All Coffee</a></li>
                <li><a href="{{ route('shop.category', 'Cold Coffee') }}">Cold Coffee</a></li>
                <li><a href="{{ route('shop.category', 'Hot Coffee') }}">Hot Coffee</a></li>
                <li><a href="{{ route('shop.category', 'Bottled Beverages') }}">Bottle Beverages</a></li>
            </ul>
        </div>
    </div>

    <div class="shop-product">
        <div class="shop-product-container">
            @foreach($products as $product)
                <div class="shop-product-row">
                    <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->name }}">
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
