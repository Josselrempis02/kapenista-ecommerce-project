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

            <!-- Filter Form -->
            <form method="GET" action="{{ route('admin.orders.index') }}" class="mb-4">
                <div class="row g-3">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search by Order # or Customer Name" value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="from_date" class="form-control" placeholder="From Date" value="{{ request('from_date') }}">
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="to_date" class="form-control" placeholder="To Date" value="{{ request('to_date') }}">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>
                </div>
            </form>
            <!-- End Filter Form -->

            <hr>
            <table class="table table-striped">
                <thead>
                    <tr class="orders-header">
                        <th scope="col">Order #</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr class="recent-orders-tr" onclick="window.location='{{ route('order.details', ['order_id' => $order->order_id]) }}'" style="cursor: pointer;">
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>
                                @php
                                    $badgeClass = match($order->status) {
                                        'Pending' => 'bg-warning',
                                        'Processing' => 'bg-info',
                                        'Completed' => 'bg-success',
                                        'Cancelled' => 'bg-danger',
                                        default => 'bg-secondary',
                                    };
                                @endphp
                                <span class="badge {{ $badgeClass }}">{{ $order->status }}</span>
                            </td>
                            <td>₱{{ number_format($order->orderProducts->sum('total_price'), 2) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-end">
                {{ $orders->withQueryString()->links() }}
            </div>
        </div>
    </section>
</section>
@endsection
