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
                <h4 class="card-title mb-0">Order ID: {{ $orders->order_id}}</h4>

                <div class="badge bg-warning text-dark">{{ $orders->order_status}}</div>
                <button class="btn btn-link text-dark p-0">
                    <i class="fas fa-ellipsis-h"></i>
                </button>
            </div>

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
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item click" href="#">Processing</a>
                        <a class="dropdown-item click" href="#">Delivered</a>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary">Save</button>
            </div>

            <div class="container">
                <div class="row mt-4">
                    <div class="col-12 col-md-4 d-flex justify-content-center align-items-center mb-3">
                        <div class="border p-3 rounded d-flex align-items-center">
                            <i class="lni lni-user custom-icon me-3"></i>
                            <span class="details">
                                <h4 class="mb-2">Customer</h4>
                                <h5>Full Name: {{ $orders->user->name}}</h5>
                                <h5>Email: {{ $orders->user->email}}</h5>
                                <h5>Phone: {{ $orders->user->phone_number}}</h5>
                            </span>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center align-items-center mb-3">
                        <div class="border p-3 rounded d-flex align-items-center">
                            <i class="lni lni-credit-cards me-3 custom-icon"></i>
                            <span class="details">
                                <h4 class="mb-2">Order Info</h4>
                                <h5>Payment Method: {{ $orders->payment->payment_method}}</h5>
                                
                            </span>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center align-items-center mb-3">
                        <div class="border p-3 rounded d-flex align-items-center">
                            <i class="lni lni-delivery custom-icon me-3"></i>
                            <span class="details">
                                <h4 class="mb-2">Deliver to</h4>
                                <h5> {{ $orders->user->address}}</h5>
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
                        <tr class="recent-orders-tr">
                            <td>Cafe latte</td>
                            <td>#25426</td>
                            <td>3</td>
                            <td>₱110.40</td>
                        </tr>
                        <!-- Repeat similar rows for other products -->
                    </tbody>
                </table>

                <div class="total-price cart-price d-flex justify-content-end p-3">
    <div class="table-container">
        <table class="table table-borderless text-end mb-0">
            <tr>
                <td class="pe-3">Subtotal</td>
                <td class="fw-bold">₱110.40</td>
            </tr>
            <tr>
                <td class="pe-3">Delivery Fee</td>
                <td class="fw-bold">₱50.00</td>
            </tr>
            <tr class="border-top">
                <td class="pt-2 pe-3">Total</td>
                <td class="fw-bold fs-5 pt-2">₱160.40</td>
            </tr>
        </table>
    </div>
</div>

            </div>
        </div>
    </div>
   
</section>
@endsection
