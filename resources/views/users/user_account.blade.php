@extends('layouts.app')

@section('content')
     <!-- Myaccount-Section-starts -->

     <section class="my-account">
        <h1 class="page-title">My Account</h1>
        

        <div class="my-account-container">
            <div class="my-account-management">
                <h1>Manage my Account</h1>
                <a href="" >My Profile</a>

                <h1>My Orders</h1>
                <a href="mypurchase.html" >My Purchase</a>
            </div>

            <div class="my-account-profile-edit">
                <h1>Edit your profile</h1>
                <form action="" class="my-account-form">

                <div class="edit-container">
                    <div class="personal-info-section">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="fname" placeholder="Name" required>
                    
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lname" placeholder="Name" required>

                        <label for="">Password Changes</label>
                        <div class="input-column">
                            <input type="password" id="current-password" name="current-password" placeholder="Current Password" required>
                            <input type="password" id="new-password" name="new-password" placeholder="New Password" required>
                            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm New Password" required>
                        </div>
                    </div>
                    
                    <div class="contact-info-section">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Email" required>
                    
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" placeholder="Address" required>
                    </div>
                    
                </div>
                <div class="action-buttons">
                    <a href="" class="cancel">Cancel</a>
                    <a href="" class="save-changes">Save Changes</a>
                </div>

            </div>

             
        </form>
           
            

        </div>

       
    
     </section>
@endsection