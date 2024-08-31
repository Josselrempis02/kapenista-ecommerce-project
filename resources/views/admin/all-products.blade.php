@extends('layouts.admin')

@section('title', 'all-products')


@section('content')
<section class="d-flex align-items-center justify-content-between allproducts-container">
    <div class="allproducts-text">
        <h1>All Products</h1>
        <h3>Home > All Products</h3>
    </div>
    <div class="custome-button">
        <button class="add-product-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <span class="icon">+</span> ADD NEW PRODUCT
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/add-products" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="exampleFormControlInput1"
                                placeholder="name"
                                name="name"
                                value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea 
                                class="form-control" 
                                id="exampleFormControlTextarea1" 
                                rows="3"
                                name="description">{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Category</label>
                            <select class="form-select" aria-label="Default select example" name="category">
                                <option value="Cold Coffee" {{ old('category') == 'Cold Coffee' ? 'selected' : '' }}>Cold Coffee</option>
                                <option value="Hot Coffee" {{ old('category') == 'Hot Coffee' ? 'selected' : '' }}>Hot Coffee</option>
                                <option value="Bottle Beverages" {{ old('category') == 'Bottle Beverages' ? 'selected' : '' }}>Bottle Beverages</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Stock</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                id="exampleFormControlInput1" 
                                max="100" 
                                placeholder="stocks"
                                name="stock"
                                value="{{ old('stock') }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Price</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                id="exampleFormControlInput1" 
                                placeholder="price"
                                name="price"
                                value="{{ old('price') }}">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Product Image</label>
                            <input 
                                class="form-control" 
                                type="file" 
                                id="formFile"
                                name="img">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary custom-btn">Add New Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="products">
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex align-items-start">
                            <img src="{{ $product->img ? asset('storage/' . $product->img) : asset('img/final-logo.png') }}" class="img-fluid rounded" style="width: 100px; height: 150px;">
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
