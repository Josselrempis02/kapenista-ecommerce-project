@extends('layouts.admin')

@section('content')

<section class="d-flex align-items-center justify-content-between allproducts-container">

    <div class="allproducts-text">
        <h1>Category</h1>
        <h3>Home > Category</h3>
    </div>
   
   <!-- Button trigger modal -->
   <div class="custome-button">
        <button class="add-product-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <span class="icon">+</span> ADD NEW CATEGORY
        </button>
    </div>

    <!-- Modal for Adding New Category -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('admin.category.store') }}" id="addCategoryForm">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                            @if ($errors->has('name'))
                                <div class="text-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        
                        <div class="mb-3">
                            <label for="categorySlug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter slug, URL" >
                            @if ($errors->has('slug'))
                                <div class="text-danger">{{ $errors->first('slug') }}</div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="categoryTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" >
                            @if ($errors->has('title'))
                                <div class="text-danger">{{ $errors->first('title') }}</div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="categoryDescription" class="form-label">Description</label>
                           <textarea class="form-control" name="description" id="description"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="categoryKeywords" class="form-label">Keywords</label>
                            <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Enter keywords" >
                            @if ($errors->has('keywords'))
                                <div class="text-danger">{{ $errors->first('keywords') }}</div>
                            @endif
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-save">Add Category</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<!-- Flash Success Message -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show " role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<section class="dashboard-container">
    <div class="recent-orders p-3 border bg-light fw-bold" style="border-radius: 10px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title mb-0">Category List</h4>
            <button class="btn btn-link text-dark p-0">
                <i class="fas fa-ellipsis-h"></i>
            </button>
        </div>
        <hr>
        <table class="table table-striped">
            <thead>
                <tr class="orders-header">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Keywords</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr class="recent-orders-tr">
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->keywords }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="#" 
                           class="btn btn-link text-dark p-0 me-2" 
                           title="Edit" 
                           data-bs-toggle="modal" 
                           data-bs-target="#editCategoryModal{{ $category->id }}">
                            <i class="fas fa-edit"></i>
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-dark p-0 me-2" title="Delete" onclick="return confirm('Are you sure you want to delete this category?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                <!-- Modal for Editing Each Category -->
                <div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="editCategoryModalLabel{{ $category->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editCategoryModalLabel{{ $category->id }}">Edit Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="categoryName{{ $category->id }}" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="categoryName{{ $category->id }}" name="name" value="{{ old('name', $category->name) }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="categorySlug{{ $category->id }}" class="form-label">Slug</label>
                                        <input type="text" class="form-control" id="categorySlug{{ $category->id }}" name="slug" value="{{ old('slug', $category->slug) }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="categoryTitle{{ $category->id }}" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="categoryTitle{{ $category->id }}" name="title" value="{{ old('title', $category->title) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="categoryDescription{{ $category->id }}" class="form-label">Description</label>
                                        <textarea class="form-control" id="categoryDescription{{ $category->id }}" name="description">{{ old('description', $category->description) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="categoryKeywords{{ $category->id }}" class="form-label">Keywords</label>
                                        <input type="text" class="form-control" id="categoryKeywords{{ $category->id }}" name="keywords" value="{{ old('keywords', $category->keywords) }}">
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
