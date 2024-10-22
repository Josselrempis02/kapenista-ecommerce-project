@extends('layouts.app')

@section('content')
    <!-- Myaccount-Section-starts -->
    <section class="my-account">
        <h1 class="page-title">My Account</h1>

        <!-- Display success messages or errors -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="my-account-container">
            <div class="my-account-management">
                <h1>Manage my Account</h1>
                <a href="">My Profile</a>

                <h1>My Orders</h1>
                <a href="{{ route('mypurchases') }}">My Purchase</a>
            </div>

            <div class="my-account-profile-edit">
                <h1>Edit your profile</h1>
                <form action="{{ route('user.updateProfile') }}" method="POST" class="my-account-form">
                    @csrf
                    @method('PUT')

                    <div class="edit-container">
                        <div class="personal-info-section">
                            <label for="fname">Name</label>
                            <input type="text" id="fname" name="name" value="{{ old('fname', $user->name) }}" placeholder="Name" required>

                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}" placeholder="Address" required>
                        </div>

                        <div class="contact-info-section">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Email" required>

                            <label for="email">Phone number</label>
                            <input type="tel" id="number" name="phone_number" placeholder="Phone number" value="{{old('phone_number', $user->phone_number)}}">

                        </div>
                    </div>

                    <div class="action-buttons">
                        <a href="" class="cancel">Cancel</a>
                        <button type="submit" class="save-changes">Save Changes</button>
                    </div>
                </form>

                <h1>Change Password</h1>
                <form action="{{ route('user.updatePassword') }}" method="POST" class="my-account-form">
                    @csrf
                    @method('PUT')

                    <div class="edit-container">

                        <div class="current_password_section">
                            <label for="current-password">Current Password</label>
                        <input type="password" id="current-password" name="current_password" placeholder="Current Password" required>
                        
                        </div>

                        <div class="new_password_section">
                            <label for="new-password">New Password</label>
                        <input type="password" id="new-password" name="new_password" placeholder="New Password">

                        <label for="confirm-password">Confirm New Password</label>
                        <input type="password" id="confirm-password" name="new_password_confirmation" placeholder="Confirm New Password" >
                        </div>
                        
                    </div>

                    <div class="action-buttons">
                        <a href="" class="cancel">Cancel</a>
                        <button type="submit" class="save-changes">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
