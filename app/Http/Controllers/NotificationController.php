<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function showNotif()
{
    $notifications = auth()->user()->notifications()->paginate(10);
    return view('users.notifications', compact('notifications'));
}



    public function markAsRead($id)
    {
        $notification = auth()->user()->notifications()->findOrFail($id);
        $notification->markAsRead();

        return redirect()->back()->with('error', 'Notification not found.');
    }


    public function indexAdmin(Request $request)
    {
        $notifications = $request->user()->notifications; // Fetch notifications for the logged-in admin or staff
        return response()->json($notifications);
    }

    // Mark notifications as read
    public function markAsReadAdmin($id)
    {
        $notification = auth()->user()->notifications()->find($id);
    
        if (!$notification) {
            return response()->json(['success' => false, 'message' => 'Notification not found'], 404);
        }
    
        $notification->markAsRead();
    
       return redirect()->back();
    }

    public function markAsReadStaff($id)
    {
        $notification = auth()->user()->notifications()->findOrFail($id);
        $notification->markAsRead();

        return redirect()->back()->with('error', 'Notification not found.');
    }
}
