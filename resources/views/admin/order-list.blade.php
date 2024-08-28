@extends('layouts.admin')

@section('content')
<section class="dashboard-container">
    <div class="dashboard-text">
        <h1>Order List</h1>
        <h3>Home > Order List</h3>
    </div>

    <section class="dashboard-container">
        <div class="recent-orders p-3 border bg-light fw-bold" style="border-radius: 10px;">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title mb-0">Recent Orders</h4>
                <button class="btn btn-link text-dark p-0">
                    <i class="fas fa-ellipsis-h"></i>
                </button>
            </div>
            <hr>
            <table class="table table-striped">
                <thead>
                    <tr class="orders-header">
                        <th scope="col">Product</th>
                        <th scope="col">Order ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="recent-orders-tr" onclick="window.location='{{ route('order.details') }}'" style="cursor: pointer;">
                        <td>Cafe latte</td>
                        <td>#25426</td>
                        <td>Nov 8th, 2023</td>
                        <td><img src="customer-image.jpg" alt="Kavin" class="rounded-circle" style="width: 30px;"> Kavin</td>
                        <td><span class="badge bg-success">Delivered</span></td>
                        <td>₱110.40</td>
                    </tr>
                    <!-- Repeat similar rows for other products -->
                </tbody>
            </table>
        </div>
    </section>
</section>
@endsection
