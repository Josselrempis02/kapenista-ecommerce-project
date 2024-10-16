@extends('layouts.app')

@section('content')
    <section class="my-account">
        <h1 class="page-title">My Purchase</h1>

        <div class="my-account-container">
            <div class="my-account-management">
                <h1>Manage my Account</h1>
                <a href="{{ route('user.account', Auth::user()->id) }}" id="myText">My Profile</a>

                <h1>My Orders</h1>
                <a href="{{ route('mypurchases') }}">My Purchase</a>
            </div>

            <div class="small-container cart-page">
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Order Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->order_number }}</td>
                                <td>{{ $order->orderProducts->sum('quantity') }}</td>
                                @php
                                    // Calculate total product amount
                                    $totalProductAmount = $order->orderProducts->sum(fn($orderProduct) => $orderProduct->quantity * $orderProduct->product->price);
                                    $deliveryFee = 50; // Fixed delivery fee
                                    $totalAmount = $totalProductAmount + $deliveryFee; // Total amount including delivery fee
                                @endphp
                                <td>₱{{  number_format($totalAmount, 2) }}</td>
                                <td class="status-btn">
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
                                </td>
                                <td>{{ $order->created_at->format('F j, Y') }}</td>
                                <td>
                                    <a href="{{ route('orders.details', $order->order_id) }}" class="btn btn-save">View Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination-container">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
