@extends('layouts.app')

@section('content')
    <!-- Myaccount-Section-starts -->

    <section class="my-account">
        <h1 class="page-title">My Account</h1>
    
        <div class="my-account-container">
            <div class="my-account-management">
                <h1>Manage my Account</h1>
                <a href="{{ route('user.account', Auth::user()->id) }}" id="myText">My Profile</a>
    
                <h1>My Orders</h1>
                <a href="">My Purchase</a>
            </div>
    
            <div class="small-container cart-page">
                <table>
                    <tbody>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td>
                            <div class="cart-info">
                                <img src="/assets/img/menu3.jfif" alt="">
                                <div>
                                    <p>Caffe Latte</p>
                                    <a href="">remove</a>
                                </div>
                            </div>
                        </td>
                        <td><span class="Quantity-num">1</span></td>
                        <td>₱120</td>
                        <td class="status-btn">
                            <span><a href="">Order confirmed</a></span>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
