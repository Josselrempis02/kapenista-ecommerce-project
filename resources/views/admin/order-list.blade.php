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
                        
                        <th scope="col">Order ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr class="recent-orders-tr" onclick="window.location='{{ route('order.details', ['order_id' => $order->order_id]) }}'" style="cursor: pointer;">
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->orderDate }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td><span class="badge bg-success">{{ $order->order_status }}</span></td>
                        <td>{{ $order->TotalAmount }}</td>
                    </tr>
                    <!-- Repeat similar rows for other products -->
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</section>
@endsection
