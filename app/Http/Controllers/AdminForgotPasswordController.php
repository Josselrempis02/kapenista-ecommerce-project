<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Notifications\AdminResetPasswordNotification;

class AdminForgotPasswordController extends Controller
{
    // Method to show the form for requesting a password reset link
    public function showLinkRequestForm()
    {
        return view('admin-auth.forgot-password'); // Returns the view for admins to request a password reset link
    }

    // Method to handle the form submission and send the reset link
    public function sendResetLinkEmail(Request $request)
    {
        // Validate the email address
        $request->validate(['email' => 'required|email']);

        // Send the reset link
        $status = Password::broker('admins')->sendResetLink(
            $request->only('email'),
            function ($admin, $token) {
                // Notify the admin with the reset password notification
                $admin->notify(new AdminResetPasswordNotification($token));
            }
        );

        // Return the appropriate response based on the status
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)]) // Success message
            : back()->withErrors(['email' => __($status)]); // Error message
    }
}

