@extends('layouts.app')

@section('content')
    <!-- Myaccount-Section-starts -->

    <section class="my-account">
        <h1 class="page-title">Order Details</h1>
    
        <div class="my-account-container">
            <div class="my-account-management">
                <h1>Manage my Account</h1>
                <a href="{{ route('user.account', Auth::user()->id) }}" id="myText">My Profile</a>
    
                <h1>My Orders</h1>
                <a href="{{ route('mypurchases') }}">My Purchase</a>
            </div>
    
            <div class="order-details-container">
                <!-- User Details -->
                <div class="order-user-info">
                    <p><strong>Name:</strong> {{ $order->user->name }} </p>
                    <p><strong>Email:</strong> {{ $order->user->email }}</p>
                    <p><strong>Address:</strong> {{ $order->address }}, {{ $order->apartment }}, {{ $order->city }}</p>
                    <p><strong>Order Date:</strong> {{ $order->created_at->format('F j, Y') }}</p>
                    <p><strong>Status:</strong>
                        <span class="badge 
                            @if($order->status === 'Completed')
                                badge-success
                            @elseif($order->status === 'Processing')
                                badge-warning
                            @elseif($order->status === 'Delivered')
                                badge-info
                            @elseif($order->status === 'Cancelled')
                                badge-cancel
                            @else
                                badge-secondary
                            @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </p>

                    @if($order->status === 'Delivered')
                        <form action="{{ route('order.received', $order->order_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Order Received</button>
                        </form>
                    @endif

                    @if($order->status !== 'Cancelled' && $order->status !== 'Completed' && $order->status !== 'Processing' && $order->status !== 'Delivered')
                        <form action="{{ route('order.cancel', $order->order_id) }}" method="POST" style="margin-top: 10px;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger">Cancel Order</button>
                        </form>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>

                <!-- Product Details -->
                <div class="order-products">
                    <h2>Order Products</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderProducts as $orderProduct)
                            <tr>
                                <td>
                                    <div class="product-info">
                                        <img src="{{ $orderProduct->product->img }}" alt="{{ $orderProduct->product->name }}" width="50">
                                        <p>{{ $orderProduct->product->name }}</p>
                                    </div>
                                </td>
                                <td>{{ $orderProduct->product->category->name }}</td>
                                <td>{{ $orderProduct->quantity }}</td>
                                <td>₱{{ number_format($orderProduct->product->price, 2) }}</td>
                                <td>₱{{ number_format($orderProduct->quantity * $orderProduct->product->price, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Payment Summary -->
                <div class="order-payment-info">
                <h2>Payment Information</h2>
                <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
                @if($order->payment_method === 'GCash')
                    <p><strong>GCash Reference Number:</strong> {{ $order->gcash_reference_number }}</p>
                    <p><strong>GCash Receipt:</strong> 
                        <!-- Button to open the modal -->
                        
                        <a href="" id="openModalButton" >View Receipt</a>
                    </p>
                @endif

                <!-- Modal structure -->
                <div id="gcashReceiptModal" class="custom-modal">
                    <div class="custom-modal-content">
                        <span class="close-btn" id="closeModalButton">&times;</span>
                        <h3>GCash Receipt</h3>
                        <img src="{{ Storage::url($order->gcash_receipt) }}" alt="GCash Receipt" class="receipt-img">
                    </div>
                </div>
                                
                @php
                    // Calculate total product amount
                    $totalProductAmount = $order->orderProducts->sum(fn($orderProduct) => $orderProduct->quantity * $orderProduct->product->price);
                    $deliveryFee = 50; // Fixed delivery fee
                    $totalAmount = $totalProductAmount + $deliveryFee; // Total amount including delivery fee
                @endphp
                
                <p><strong>Delivery Fee:</strong> ₱{{ number_format($deliveryFee, 2) }}</p>
                <p><strong>Total Amount:</strong> ₱{{ number_format($totalAmount, 2) }}</p>
            </div>


            </div>
        </div>

        <script>
// Get the modal element
var modal = document.getElementById("gcashReceiptModal");

// Get the button that opens the modal
var btn = document.getElementById("openModalButton");

// Get the <span> element that closes the modal
var span = document.getElementById("closeModalButton");

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
    </section>

@endsection
