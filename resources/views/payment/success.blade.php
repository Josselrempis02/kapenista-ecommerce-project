@extends('layouts.app')

@section('content')

<section class="cart" id="cart">
    <h1 class="page-title">Order Pending</h1>

    <div class="small-container cart-page">
      
    <div class="cart-empty">
               
                <p>Thank you for your purchase! Your order (#{{ $order->order_id }}) is currently pending. You can view the status of your order in My Purchases</a>.</p>
            </div>
            <div class="button-shop">
                <button><a href="{{ route('mypurchases') }}" class="shop-link">My Purchases</a></button>
            </div>
           
    </div>
</section>




@endsection
