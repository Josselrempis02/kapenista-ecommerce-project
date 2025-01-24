@extends('layouts.admin')

@section('content')

<section class="dashboard-container">
<div class="dashboard-text">
        <h1>Customer List</h1>
        <h3>Home > Customer List</h3>
    </div>

    <!-- Flash Success Message -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show " role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


    <div class="recent-orders p-3 border bg-light fw-bold" style="border-radius: 10px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title mb-0">Customer List</h4>
            <button class="btn btn-link text-dark p-0">
                <i class="fas fa-ellipsis-h"></i>
            </button>
        </div>
        <hr>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="orders-header">
                    <th scope="col">Customer Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="recent-orders-tr">
                    <td>{{ $user->name }}</td>
                    <td>{{  $user->email}}</td>
                    <td>{{  $user->created_at }}</td>
                    <td>
                    <form action="{{ route ('customer.destroy', $user->id )}}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-dark p-0 me-2" title="Delete" onclick="return confirm('Are you sure you want to delete this customer?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                    
                </tr>

            
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
   
</section>






@endsection