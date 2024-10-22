<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report for {{ Carbon\Carbon::parse($month)->format('F Y') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #343a40;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Sales Report for {{ Carbon\Carbon::parse($month)->format('F Y') }}</h1>

    <h3>Total Sales: {{ number_format($totalSales, 2) }}</h3>
    <h3>Total Profit: {{ number_format($totalProfit, 2) }}</h3>

    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Total Quantity Sold</th>
                <th>Total Sales</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dailySales as $sale)
            <tr>
                <td>{{ $sale->sale_date }}</td>
                <td>{{ $sale->total_quantity }}</td>
                <td>{{ number_format($sale->total_sales, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
