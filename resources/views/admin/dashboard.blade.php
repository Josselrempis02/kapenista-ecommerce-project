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
                <h3>1230</h3>
                <p>Total Order</p>
            </span>
        </li>

        <li>
            <i class="lni lni-shopping-basket"></i>
            <span class="text">
                <h3>1230</h3>
                <p>Total Sales</p>
            </span>
        </li>

        <li>
            <i class="lni lni-shopping-basket"></i>
            <span class="text">
                <h3>1230</h3>
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
                        <img src="{{ asset('assets/img/menu3.jfif') }}" alt="Cafe latte" style="width: 100px; height: 150px; border-radius: 5px;">
                        <div class="ms-3">
                            <p class="mb-0 fw-bold">Cafe latte</p>
                            <p class="mb-0 text-muted">₱126.500</p>
                        </div>
                        <div class="ms-auto text-end">
                            <p class="mb-0 fw-bold">₱126.50</p>
                            <p class="mb-0 text-muted">999 sales</p>
                        </div>
                    </div>
                    <button class="btn btn-warning mt-3 fw-bold" style="border-radius: 5px;">REPORT</button>
                </div>
            </div>
        </div>

     

    </div>
</section>

<section class="dashboard-container">
<div class="recent-orders p-3 border bg-light fw-bold" style="border-radius: 10px;">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title mb-0">Recent Order</h4>
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
            <tr class="recent-orders-tr">
                <td>Cafe latte</td>
                <td>#25426</td>
                <td>Nov 8th, 2023</td>
                <td><img src="customer-image.jpg" alt="Kavin" class="rounded-circle" style="width: 30px;"> Kavin</td>
                <td><span class="badge bg-success">Delivered</span></td>
                <td>₱110.40</td>
            </tr>

            <tr class="recent-orders-tr">
                <td>Cafe latte</td>
                <td>#25426</td>
                <td>Nov 8th, 2023</td>
                <td><img src="customer-image.jpg" alt="Kavin" class="rounded-circle" style="width: 30px;"> Kavin</td>
                <td><span class="badge bg-success">Delivered</span></td>
                <td>₱110.40</td>
            </tr>

            <tr class="recent-orders-tr">
                <td>Cafe latte</td>
                <td>#25426</td>
                <td>Nov 8th, 2023</td>
                <td><img src="customer-image.jpg" alt="Kavin" class="rounded-circle" style="width: 30px;"> Kavin</td>
                <td><span class="badge bg-success">Delivered</span></td>
                <td>₱110.40</td>
            </tr>

            <tr class="recent-orders-tr">
                <td>Cafe latte</td>
                <td>#25426</td>
                <td>Nov 8th, 2023</td>
                <td><img src="customer-image.jpg" alt="Kavin" class="rounded-circle" style="width: 30px;"> Kavin</td>
                <td><span class="badge bg-success">Delivered</span></td>
                <td>₱110.40</td>
            </tr>

            <tr class="recent-orders-tr">
                <td>Cafe latte</td>
                <td>#25426</td>
                <td>Nov 8th, 2023</td>
                <td><img src="customer-image.jpg" alt="Kavin" class="rounded-circle" style="width: 30px;"> Kavin</td>
                <td><span class="badge bg-success">Delivered</span></td>
                <td>₱110.40</td>
            </tr>

            <tr class="recent-orders-tr">
                <td>Cafe latte</td>
                <td>#25426</td>
                <td>Nov 8th, 2023</td>
                <td><img src="customer-image.jpg" alt="Kavin" class="rounded-circle" style="width: 30px;"> Kavin</td>
                <td><span class="badge bg-success">Delivered</span></td>
                <td>₱110.40</td>
            </tr>

            <tr class="recent-orders-tr">
                <td>Cafe latte</td>
                <td>#25426</td>
                <td>Nov 8th, 2023</td>
                <td><img src="customer-image.jpg" alt="Kavin" class="rounded-circle" style="width: 30px;"> Kavin</td>
                <td><span class="badge bg-success">Delivered</span></td>
                <td>₱110.40</td>
            </tr>

            <tr class="recent-orders-tr">
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
@endsection
