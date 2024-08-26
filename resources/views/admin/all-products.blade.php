@extends('layouts.admin')



@section('content')
<section class="d-flex  align-items-center justify-content-between allproducts-container">
    <div class="allproducts-text">
        <h1>All Products</h1>
        <h3>Home > All Products</h3>
    </div>
    <div class="custome-button">
    
      <button class="add-product-btn">
       <span class="icon">+</span> ADD NEW PRODUCT
     </button>
    </div>
</section>

<section class="products">
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex align-items-start">
                            <img src="{{ asset('assets/img/menu3.jfif') }}" alt="{{ $product->name }}" class="img-fluid rounded" style="width: 100px; height: 150px;">
                            <div class="ms-3">
                                <h5 class="card-title mb-1">{{ $product->name }}</h5>
                                <p class="card-subtitle text-muted mb-2">{{ $product->category }}</p>
                                <h6 class="card-subtitle text-success fw-bold">₱{{ number_format($product->price, 2) }}</h6>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="fw-bold">Description</h6>
                            <p class="card-text text-muted">{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-end mt-4">
        {{ $products->links() }}
    </div>
</section>


@endsection
