@extends('layouts.admin')

@section('content')
<section class="order-details-container mb-4">
    <div class="dashboard-text">
        <h1>Order Details</h1>
        <h3>Home > Order List > Order Details</h3>
    </div>
    
    <div class="p-4">
        <div class="recent-orders p-3 border bg-light fw-bold" style="border-radius: 10px;">
            <div class="d-flex gap-3 align-items-center mb-3">
                <h4 class="card-title mb-0">Order ID: #{{ $orders->order_id }}</h4>
                <div class="badge bg-warning text-dark">{{ $orders->order_status }}</div>
                <button class="btn btn-link text-dark p-0">
                    <i class="fas fa-ellipsis-h"></i>
                </button>
            </div>

            <form action="/update-order-status" method="POST">
                @csrf
                <input type="hidden" name="order_id" value="{{ $orders->order_id }}">
                <div class="d-flex gap-3">
                    <div class="dropdown ms-auto d-flex">
                        <button 
                            class="btn custon-btn-admin dropdown-toggle d-flex align-items-center no-dropdown-icon" 
                            type="button" 
                            id="dropdownMenuButton" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false">
                            <span class="me-2">Change Status</span>
                            <i class="bi bi-chevron-down"></i> 
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li>
                                <button class="dropdown-item" type="button" onclick="document.getElementById('order_status').value='Processing';">Processing</button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button" onclick="document.getElementById('order_status').value='Completed';">Completed</button>
                            </li>
                            <li>
                                <button class="dropdown-item" type="button" onclick="document.getElementById('order_status').value='Cancelled';">Cancelled</button>
                            </li>
                        </ul>
                    </div>
                    <input type="hidden" id="order_status" name="order_status" value="{{ old('order_status') }}">
                    <button type="submit" class="btn btn-secondary">Save</button>
                </div>
            </form>

            <div class="container">
                <div class="row mt-4">
                    <div class="col-12 col-md-4 d-flex justify-content-center align-items-center mb-3">
                        <div class="border p-3 rounded d-flex align-items-center">
                            <i class="lni lni-user custom-icon me-3"></i>
                            <span class="details">
                                <h4 class="mb-2">Customer</h4>
                                <h5>Full Name: {{ $orders->user->name ?? 'N/A' }}</h5>
                                <h5>Email: {{ $orders->user->email ?? 'N/A' }}</h5>
                                <h5>Phone: {{ $orders->user->phone_number ?? 'N/A' }}</h5>
                            </span>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center align-items-center mb-3">
                        <div class="border p-3 rounded d-flex align-items-center">
                            <i class="lni lni-credit-cards me-3 custom-icon"></i>
                            <span class="details">
                                <h4 class="mb-2">Order Info</h4>
                                <h5>Payment Method: {{ $orders->payment_method }}</h5>
                            </span>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center align-items-center mb-3">
                        <div class="border p-3 rounded d-flex align-items-center">
                            <i class="lni lni-delivery custom-icon me-3"></i>
                            <span class="details">
                                <h4 class="mb-2">Deliver to</h4>
                                <h5>{{ $orders->user->address ?? 'N/A' }}</h5>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title mb-0">Product</h4>
                    <button class="btn btn-link text-dark p-0">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
                <hr>
                <table class="table table-striped">
                    <thead>
                        <tr class="orders-header">
                            <th scope="col">Product Name</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderProducts as $orderProduct)
                            <tr class="recent-orders-tr">
                                <td>{{ $orderProduct->product->name ?? 'N/A' }}</td> <!-- Safely accessing product name -->
                                <td>#{{ $orderProduct->order_id }}</td>
                                <td>{{ $orderProduct->quantity }}</td>
                                <td>{{ number_format($orderProduct->quantity * $orderProduct->price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

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
