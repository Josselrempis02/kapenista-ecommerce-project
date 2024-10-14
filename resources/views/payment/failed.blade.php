@extends('layouts.app')

@section('content')
<section class="payment-failed">
    <h1>Payment Failed</h1>
    <p>We're sorry, but your payment for order (#{{ $order->order_id }}) was not successful. Please try again or choose a different payment method.</p>
    <a href="{{ route('checkout') }}" class="btn btn-secondary">Retry Payment</a>
</section>
@endsection
