@extends('layouts.admin')

@section('content')
<section class="dashboard-container">
    <div class="dashboard-text">
        <h1>Dashboard</h1>
        <h3>Home > Dashboard</h3>
    </div>

    <ul class="box-info">
        <li>
            <i class="lni lni-shopping-basket"></i>
            <span class="text">
                <h3>{{ $orderCount }}</h3>
                <p>Total Order</p>
            </span>
        </li>

        <li>
            <i class="lni lni-shopping-basket"></i>
            <span class="text">
                <h3>₱{{ $priceCount }}</h3>
                <p>Total Sales</p>
            </span>
        </li>

        <li>
            <i class="lni lni-shopping-basket"></i>
            <span class="text">
                <h3>{{ $completedOrderCount }}</h3>
                <p>Complete Orders</p>
            </span>
        </li>
    </ul>

    <div class="main-panel">
        <div class="row d-flex">

            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body rounded-2">
                        <h4 class="card-title">Sale Graph</h4>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>

            @if ($bestSellingProductDetails)
            <div class="item1">
                <div class="p-3 border bg-light fw-bold" style="border-radius: 10px;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-2">Best Sellers</h4>
                        <button class="btn btn-link text-dark p-0">
                            <i class="fas fa-ellipsis-h"></i>
                        </button>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('storage/' . $bestSellingProductDetails->img) }}" 
                            alt="{{ $bestSellingProductDetails->name }}" 
                            style="width: 100px; height: 150px; border-radius: 5px;">
                        
                        <div class="ms-3">
                            <p class="mb-0 fw-bold">{{ $bestSellingProductDetails->name }}</p>
                            <p class="mb-0 text-muted">₱{{ $bestSellingProductDetails->price }}</p>
                        </div>

                        <div class="ms-auto text-end">
                            <p class="mb-0 fw-bold">₱{{ $bestSellingProductDetails->price }}</p>
                            <p class="mb-0 text-muted">{{ $bestSellingProduct->total_sales }} Sales</p>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <p>No Best Seller data available.</p>
            @endif

        </div>
    </div>

    <section class="dashboard-container">
        <div class="recent-orders p-3 border bg-light fw-bold" style="border-radius: 10px;">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title mb-0">Latest Orders</h4>
                <button class="btn btn-link text-dark p-0">
                    <i class="fas fa-ellipsis-h"></i>
                </button>
            </div>


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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = {!! json_encode($labels) !!};
        const data = {!! json_encode($data) !!};

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line', // You can change this to 'bar' or 'pie' as needed
            data: {
                labels: labels,
                datasets: [{
                    label: 'Sales Amount',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</section>
@endsection
