<!-- resources/views/emails/order_invoice.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 600px;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Order Invoice</h3>
                <p class="mb-0">Order #{{ $order->order_id }}</p>
                <small class="text-light">Order Date: {{ $order->created_at->format('F d, Y') }}</small>
            </div>
            <div class="card-body">
                <h5 class="card-title">Hello, {{ $order->first_name }} {{ $order->last_name }}</h5>
                <p class="card-text">Thank you for your purchase! Below are the details of your order:</p>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderProducts as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>₱{{ number_format($item->price, 2) }}</td>
                                <td>₱{{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


                <p>If you have any questions regarding your order, please feel free to contact us.</p>
            </div>
            <div class="card-footer text-muted">
                &copy; {{ date('Y') }} Kapenista. All rights reserved.
            </div>
        </div>
    </div>
</body>
</html>
