@extends('layouts.admin')

@section('content')
<section class="dashboard-container py-4">
    <div class="dashboard-text mb-4">
        <h1 class="fw-bold">Sales Report</h1>
        <h3 class="text-muted">Home > Sales Report</h3>
    </div>

    <div class="container-fluid">
        <!-- Month Selector -->
        <form action="{{ route('showSalesReport') }}" method="GET" class="mb-4">
            <div class="row g-3">
                <div class="col-12 col-sm-6 col-md-4">
                    <input type="month" name="month" class="form-control" value="{{ $month }}">
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <button type="submit" class="btn btn-save w-100">Generate Sales for Month</button>
                </div>
            </div>
        </form>

        <!-- Export to PDF Button -->
        <div class="mb-4 d-flex justify-content-start">
            <a href="{{ route('export.sales.report', ['month' => $month]) }}" class="btn btn-danger">Export to PDF</a>
        </div>

        <!-- Summary Cards -->
<div class="row g-4">
    <div class="col-6">
        <div class="card shadow-sm w-100">
            <div class="card-body">
                <h5 class="card-title">Total Sales for {{ Carbon\Carbon::parse($month)->format('F Y') }}</h5>
                <p class="card-text fs-4 fw-bold">₱{{ number_format($totalSales, 2) }}</p>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card shadow-sm w-100">
            <div class="card-body">
                <h5 class="card-title">Total Profit for {{ Carbon\Carbon::parse($month)->format('F Y') }}</h5>
                <p class="card-text fs-4 fw-bold">₱{{ number_format($totalProfit, 2) }}</p>
            </div>
        </div>
    </div>
</div>


        <!-- Sales Table -->
        <div class="card mb-4 shadow-sm mt-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Sales Details for {{ Carbon\Carbon::parse($month)->format('F Y') }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Date</th>
                                <th>Total Quantity Sold</th>
                                <th>Total Sales</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($SalesReport as $sale)
                        <tr>
                            <td>{{ $sale->sale_date }}</td>
                            <td>{{ $sale->total_quantity }}</td>
                            <td>₱{{ number_format($sale->total_sales, 2) }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
