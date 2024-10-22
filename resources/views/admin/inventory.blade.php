@extends('layouts.admin')

@section('content')
<section class="dashboard-container">
    <div class="dashboard-text">
        <h1>Inventory</h1>
        <h3>Home > Inventory</h3>
    </div>

<!-- Flash Success Message -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

    <div class="recent-orders p-3 border bg-light fw-bold" style="border-radius: 10px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title mb-0">Inventory List</h4>
            <button class="btn btn-link text-dark p-0">
                <i class="fas fa-ellipsis-h"></i>
            </button>
        </div>
        <hr>
        <table class="table table-striped">
            <thead>
                <tr class="orders-header">
                    <th scope="col">Product</th>
                    <th scope="col">Category</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="recent-orders-tr">
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>₱{{ $product->price }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="#" 
                           class="btn btn-link text-dark p-0 me-2" 
                           title="Edit" 
                           data-bs-toggle="modal" 
                           data-bs-target="#editProductModal{{ $product->product_id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editProductModal{{ $product->product_id }}" tabindex="-1" aria-labelledby="editProductModalLabel{{ $product->product_id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('products.update', $product->product_id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editProductModalLabel{{ $product->product_id }}">Edit Product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
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
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-save">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection

@section('scripts')
@endsection
