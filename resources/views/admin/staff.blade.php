@extends('layouts.admin')

@section('content')

<section class="d-flex align-items-center justify-content-between allproducts-container">

    <div class="allproducts-text">
        <h1>Staff</h1>
        <h3>Home > Staff</h3>
    </div>
   
   <!-- Button trigger modal -->
   <div class="custome-button">
        <button class="add-product-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <span class="icon">+</span> ADD NEW STAFF
        </button>
    </div>

    <!-- Modal for Adding New Staff -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Staff</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('admin.staff.store') }}" id="addStaffForm">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="staffName" class="form-label">Staff Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="staffEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="staffpassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Staff</button>
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
            <h4 class="card-title mb-0">Staff List</h4>
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
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Table displaying admin data -->
                @foreach($admins as $admin)
                <tr class="recent-orders-tr">
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="#" 
                           class="btn btn-link text-dark p-0 me-2" 
                           title="Edit" 
                           data-bs-toggle="modal" 
                           data-bs-target="#editAdminModal{{ $admin->id }}">
                            <i class="fas fa-edit"></i>
                        </a>

                        <!-- Delete Button (Optional) -->
                         <!-- Delete Button -->
                        <form action="{{ route('admin.staff.destroy', $admin->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-dark p-0 me-2" title="Delete" onclick="return confirm('Are you sure you want to delete this staff?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                        <!-- You can add delete functionality here if needed -->
                    </td>
                </tr>

                <!-- Modal for Editing Each Admin -->
                <div class="modal fade" id="editAdminModal{{ $admin->id }}" tabindex="-1" aria-labelledby="editAdminModalLabel{{ $admin->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('admin.staff.update', $admin->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editAdminModalLabel{{ $admin->id }}">Edit Staff</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="adminName{{ $admin->id }}" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="adminName{{ $admin->id }}" name="name" value="{{ old('name', $admin->name) }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="adminEmail{{ $admin->id }}" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="adminEmail{{ $admin->id }}" name="email" value="{{ old('email', $admin->email) }}" required>
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
