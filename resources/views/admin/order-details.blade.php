@extends('layouts.admin')

@section('content')
<section class="order-details-container mb-4">
    <div class="dashboard-text">
        <h1 class="fs-3">Order Details</h1>
        <h3 class="fs-5">Home > Order List > Order Details</h3>
    </div>

    <div class="p-4">
        <div class="recent-orders p-3 border bg-light fw-bold" style="border-radius: 10px;">
            <div class="d-flex flex-column flex-md-row gap-3 align-items-center mb-3">
                <h4 class="card-title mb-0 fs-4">Order ID: #{{ $orders->order_id }}</h4>
                <div class="badge 
                        @if($orders->status == 'Processing')
                            bg-warning text-dark
                        @elseif($orders->status == 'Delivered')
                            bg-success text-white
                        @elseif($orders->status == 'Completed')
                            bg-primary text-white
                        @elseif($orders->status == 'Cancelled')
                            bg-danger text-white
                        @else
                            bg-info text-dark
                        @endif
                    ">
                        {{ $orders->status }}
                    </div>

                <button class="btn btn-link text-dark p-0">
                    <i class="fas fa-ellipsis-h"></i>
                </button>
            </div>

                        <!-- Display Success Message -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Display Error Messages -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('order.updateStatus', $orders->order_id) }}" method="POST">
                @csrf
                <div class="d-flex flex-column flex-md-row gap-3">
                    <div class="ms-md-auto d-flex">
                        <select name="status" class="form-select" required>
                            <option value="" disabled selected>Select Status</option>
                            <option value="Processing" {{ old('order_status') == 'Processing' ? 'selected' : '' }}>Processing</option>
                            <option value="Delivered" {{ old('order_status') == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                            <option value="Completed" {{ old('order_status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                            <option value="Cancelled" {{ old('order_status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-secondary mt-3 mt-md-0">Save</button>
                </div>
            </form>


            <div class="container">
                <div class="row mt-4">
                    <div class="col-12 col-md-4 d-flex justify-content-center align-items-center mb-3">
                        <div class="border p-3 rounded d-flex align-items-center">
                            <i class="lni lni-user custom-icon me-3"></i>
                            <span class="details">
                                <h4 class="mb-2 fs-6">Customer</h4>
                                <h5 class="mb-1 fs-6">Full Name: {{ $orders->user->name ?? 'N/A' }}</h5>
                                <h5 class="mb-1 fs-6">Email: {{ $orders->user->email ?? 'N/A' }}</h5>
                                <h5 class="fs-6">Phone: {{ $orders->user->phone_number ?? 'N/A' }}</h5>
                            </span>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center align-items-center mb-3">
                        <div class="border p-3 rounded d-flex align-items-center">
                            <i class="lni lni-credit-cards me-3 custom-icon"></i>
                            <span class="details">
                                <h4 class="mb-2 fs-6">Order Info</h4>
                                <h5 class="fs-6">Payment Method: {{ $orders->payment_method }}</h5>

                                @if($orders->payment_method == 'GCash')
                                    <button type="button" class="btn btn-save mt-2" data-bs-toggle="modal" data-bs-target="#gcashDetailsModal">
                                        View GCash Details
                                    </button>
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center align-items-center mb-3">
                        <div class="border p-3 rounded d-flex align-items-center">
                            <i class="lni lni-delivery custom-icon me-3"></i>
                            <span class="details">
                                <h4 class="mb-2 fs-6">Deliver to</h4>
                                <h5 class="fs-6">{{ $orders->user->address ?? 'N/A' }}</h5>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- GCash Details Modal -->
            @if($orders->payment_method == 'GCash')
            <div class="modal fade" id="gcashDetailsModal" tabindex="-1" aria-labelledby="gcashDetailsModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="gcashDetailsModalLabel">GCash Payment Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Reference Number:</strong> {{ $orders->gcash_reference_number ?? 'N/A' }}</p>
                            <p><strong>Receipt:</strong></p>
                            @if($orders->gcash_receipt)
                                <img src="{{ asset('storage/' . $orders->gcash_receipt) }}" alt="GCash Receipt" class="img-fluid">
                            @else
                                <p>No receipt available.</p>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title mb-0 fs-4">Product</h4>
                    <button class="btn btn-link text-dark p-0">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="orders-header">
                                <th scope="col">Product Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Order ID</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderProducts as $orderProduct)
                                <tr class="recent-orders-tr">
                                    <td>{{ $orderProduct->product->name ?? 'N/A' }}</td> 
                                    <td>{{ $orderProduct->product->category->name }}</td> 
                                    <td>#{{ $orderProduct->order_id }}</td>
                                    <td>{{ $orderProduct->quantity }}</td>
                                    <td>{{ number_format($orderProduct->quantity * $orderProduct->price, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="total-price cart-price d-flex justify-content-end p-3">
                    <div class="table-container">
                        <table class="table table-borderless text-end mb-0">
                            <tr>
                                <td class="pe-3">Subtotal</td>
                                <td class="fw-bold">{{ number_format($subtotal, 2) }}</td>
                            </tr>
                            <tr>
                                <td class="pe-3">Delivery Fee</td>
                                <td class="fw-bold">₱50.00</td>
                            </tr>
                            <tr class="border-top">
                                <td class="pt-2 pe-3">Total</td>
                                <td class="fw-bold fs-5 pt-2">₱{{ number_format($subtotal + 50.00, 2) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
