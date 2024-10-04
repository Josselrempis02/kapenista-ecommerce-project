@extends('layouts.admin')

@section('title', 'All Products')

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
</section>

<!-- Add Product Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Product Name -->
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input 
                            type="text" 
                            class="form-control @error('name') is-invalid @enderror" 
                            id="productName" 
                            name="name" 
                            value="{{ old('name') }}" 
                            required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Description -->
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Description</label>
                        <textarea 
                            class="form-control @error('description') is-invalid @enderror" 
                            id="productDescription" 
                            name="description" 
                            rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Category -->
                    <div class="mb-3">
                        <label for="productCategory" class="form-label">Category</label>
                        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Stock -->
                    <div class="mb-3">
                        <label for="productStock" class="form-label">Stock</label>
                        <input 
                            type="number" 
                            class="form-control @error('stock') is-invalid @enderror" 
                            id="productStock" 
                            name="stock" 
                            value="{{ old('stock') }}" 
                            min="0" 
                            required>
                        @error('stock')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Price -->
                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Price</label>
                        <input 
                            type="number" 
                            class="form-control @error('price') is-invalid @enderror" 
                            id="productPrice" 
                            name="price" 
                            value="{{ old('price') }}" 
                            min="0" 
                            step="0.01" 
                            required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Product Image -->
                    <div class="mb-3">
                        <label for="productImage" class="form-label">Product Image</label>
                        <input 
                            class="form-control @error('img') is-invalid @enderror" 
                            type="file" 
                            id="productImage"
                            name="img">
                        @error('img')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Modal Footer with Submit Button -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary custom-btn">Add New Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Flash Success Message -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Products Section -->
<section class="products mt-4">
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex align-items-start">
                            <img src="{{ $product->img ? asset('storage/' . $product->img) : asset('img/final-logo.png') }}" class="img-fluid rounded" style="width: 100px; height: 150px;">
                            <div class="ms-3">
                                <h5 class="card-title mb-1">{{ $product->name }}</h5>
                                <p class="card-subtitle text-muted mb-2">{{ $product->category->name ?? 'Uncategorized' }}</p>
                                <h6 class="card-subtitle text-success fw-bold">₱{{ number_format($product->price, 2) }}</h6>
                            </div>
                        </div>
                        <div class="mt-3">
                            <h6 class="fw-bold">Description</h6>
                            <p class="card-text text-muted">{{ $product->description }}</p>
                        </div>
                        <div class="mt-auto d-flex justify-content-between">
                            <!-- Edit button opens the modal -->
                            <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editProductModal-{{ $product->product_id }}">Edit</button>

                            <!-- Delete button with form -->
                            <form action="{{ route('products.destroy', $product->product_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Product Modal -->
            <div class="modal fade" id="editProductModal-{{ $product->product_id }}" tabindex="-1" aria-labelledby="editProductModalLabel-{{ $product->product_id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProductModalLabel-{{ $product->product_id }}">Edit Product: {{ $product->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('products.update', $product->product_id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Product Name -->
                                <div class="mb-3">
                                    <label for="editProductName-{{ $product->product_id }}" class="form-label">Product Name</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('name') is-invalid @enderror" 
                                        id="editProductName-{{ $product->product_id }}" 
                                        name="name" 
                                        value="{{ old('name', $product->name) }}" 
                                        required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Description -->
                                <div class="mb-3">
                                    <label for="editProductDescription-{{ $product->product_id }}" class="form-label">Description</label>
                                    <textarea 
                                        class="form-control @error('description') is-invalid @enderror" 
                                        id="editProductDescription-{{ $product->product_id }}" 
                                        name="description" 
                                        rows="3">{{ old('description', $product->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Category -->
                                <div class="mb-3">
                                    <label for="editProductCategory-{{ $product->product_id }}" class="form-label">Category</label>
                                    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ (old('category_id', $product->category_id) == $category->id) ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Stock -->
                                <div class="mb-3">
                                    <label for="editProductStock-{{ $product->product_id }}" class="form-label">Stock</label>
                                    <input 
                                        type="number" 
                                        class="form-control @error('stock') is-invalid @enderror" 
                                        id="editProductStock-{{ $product->product_id }}" 
                                        name="stock" 
                                        value="{{ old('stock', $product->stock) }}" 
                                        min="0" 
                                        required>
                                    @error('stock')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Price -->
                                <div class="mb-3">
                                    <label for="editProductPrice-{{ $product->product_id }}" class="form-label">Price</label>
                                    <input 
                                        type="number" 
                                        class="form-control @error('price') is-invalid @enderror" 
                                        id="editProductPrice-{{ $product->product_id }}" 
                                        name="price" 
                                        value="{{ old('price', $product->price) }}" 
                                        min="0" 
                                        step="0.01" 
                                        required>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!-- Product Image -->
                                <div class="mb-3">
                                    <label for="editProductImage-{{ $product->product_id }}" class="form-label">Product Image</label>
                                    <input 
                                        class="form-control @error('img') is-invalid @enderror" 
                                        type="file" 
                                        id="editProductImage-{{ $product->id }}"
                                        name="img">
                                    @error('img')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @if($product->img)
                                        <img src="{{ asset('storage/' . $product->img) }}" class="img-fluid mt-2" style="width: 100px; height: 150px;">
                                    @endif
                                </div>
                                
                                <!-- Modal Footer with Submit Button -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary custom-btn">Save Changes</button>
                                </div>
                            </form>
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
