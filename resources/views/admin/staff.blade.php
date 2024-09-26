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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Staff</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form  method="POST" action="/add-staff" id="addStaffForm">
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
                    <!-- Add other fields as necessary -->
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="submitStaffButton">Add Staff</button>
            </div>
            </form>
        </div>
    </div>
</div>

    

</section>

     <!-- Flash Success Message -->
     @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
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
            @foreach($admins as $admin)
                <tr class="recent-orders-tr">
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="" class="btn btn-link text-dark p-0 me-2" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        
                        <!-- Delete Button -->
                        <form action="" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-dark p-0" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

                
               

                <!-- Repeat similar rows for other staff -->
            </tbody>
        </table>
    </div>
</section>

@endsection