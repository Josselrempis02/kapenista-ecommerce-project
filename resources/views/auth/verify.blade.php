@extends('layouts.app')

@section('content')
<section class="login-container" style="padding:200px;">

 
  <div class="verify-card">
     <!-- Display Session Message -->
  @if (session('message'))
    <div class="alert alert-info">
      {{ session('message') }}
    </div>
  @endif

    <h1>Verify Your Email Address</h1>
    <p>Before proceeding, please check your email for a verification link.</p>
    <p>If you did not receive the email, <a href="{{ route('verification.send') }}">click here to request another</a>.</p>
  </div>
</section>

@endsection



