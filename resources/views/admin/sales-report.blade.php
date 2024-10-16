@extends('layouts.admin')

@section('content')
<section class="dashboard-container">
    <div class="dashboard-text">
        <h1>Sales Report</h1>
        <h3>Home > Sales Report</h3>
    </div>

    <div class="container-fluid">
        

    
        <!-- Export to PDF Button -->
        <div class="mb-4">
            <a href="{{ route('export.sales.report')}}" class="btn btn-danger">Export to PDF</a>
        </div>

        <!-- Summary Cards -->

        <!-- Sales Table -->
        <div class="card mb-4">
            <div class="card-header">
                Sales Details
            </div>
            <div class="card-body">
                <table class="table table-hover">
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
    

  
</section>
@endsection
