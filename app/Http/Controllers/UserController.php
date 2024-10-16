<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{

    public function showMyPurchase() {
        // Retrieve orders for the authenticated user, with pagination
        $orders = Order::where('user_id', auth()->id())  // Filter by logged-in user
            ->with('orderProducts.product')  // Eager load related products
            ->orderBy('created_at', 'desc')
            ->simplepaginate(5);
        
        // Pass the $orders variable to the view
        return view('users.my_purchase', compact('orders'));
    }

    public function showOrderDetails($orderId) {
        // Retrieve the specific order with user and product details
        $order = Order::with(['user', 'orderProducts.product'])
            ->where('order_id', $orderId)
            ->firstOrFail();
        
        // Pass the $order variable to the view
        return view('users.order.order-details', compact('order'));
    }
    

    public function markAsReceived($order_id)
        {
            // Find the order by ID
            $order = Order::findOrFail($order_id);

            // Ensure the order is delivered before allowing the status to be marked as completed
            if ($order->user_id !== auth()->id()) {
                return redirect()->back()->with('error', 'You are not authorized to update this order.');
            }

            if ($order->status === 'Delivered') {
                // Update the order status to 'Completed'
                $order->status = Order::STATUS_COMPLETED;
                $order->save();

                return redirect()->back()->with('success', 'Order has been marked as completed.');
            }

            return redirect()->back()->with('error', 'This order cannot be marked as completed.');
        }

        public function cancelOrder($order_id)
        {
            // Find the order by ID
            $order = Order::findOrFail($order_id);

            // Ensure the order is delivered before allowing the status to be marked as completed
            if ($order->user_id !== auth()->id()) {
                return redirect()->back()->with('error', 'You are not authorized to update this order.');
            }

            if ($order->status === 'Pending') {
                // Update the order status to 'Completed'
                $order->status = Order::STATUS_CANCELLED;
                $order->save();

                return redirect()->back()->with('success', 'Order has been cancel.');
            }

            return redirect()->back()->with('error', 'This order cannot be marked as cancel.');
        }


    

    
    

     //Show ORder Message
     public function showOrderMessage($order_number)
     {
         // Find the order by the custom order_number
         $order = Order::where('order_number', $order_number)->first();
         
         if (!$order) {
             // Redirect to the shop page if the order is not found
             return redirect()->route('shop')->with('error', 'Order not found.');
         }
     
         // Return the success view with the order data
         return view('payment.success', compact('order'));
     }
     


    
    // Show Login Form
    public function login() {
        return view('users.login');
    }

    // Show Register Form
    public function signup() {
        return view('users.signup');
    }



     //Show user purchase page 
     public function UserPurchase() {
        return view('users.my_purchase');
     }

    // New user
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6'],
            'phone_number' => ['nullable', 'string', 'max:11'], // Adjust as needed
            'address' => ['nullable', 'string', 'max:255'], // Adjust as needed
        ]);

         // Hash Password
         $formFields['password'] = bcrypt($formFields['password']);

         // Create User
         $user = User::create($formFields);

         // Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
 
    }

     // Logout User
     public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');

    }

   

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('email', $user->email)->first();

            if ($findUser) {
                Auth::login($findUser);

                return redirect()->intended('/');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('my-google'),
                ]);

                Auth::login($newUser);

                return redirect()->intended('/');
            }

        } catch (\Exception $e) {
            return redirect('auth/google');
        }
    }

        //Show user account 
        public function UserAccountSettings() {
            return view('users.user_account');
        }
  
        //Show Single User Account
        public function ShowUserAccount($id) {
            $user = User::where('id', $id)->firstOrFail();
            return view('users.user_account', compact('user'));
        }
        
       //Update profile
       public function updateProfile(Request $request){
        //validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'phone_number' => ['nullable', 'string', 'max:11'],
            'address' => 'nullable|string|max:255',
        ]);
        //get the auth user
        $user = Auth::user();

        // update user details
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->save();
    

        return back()->with('success', 'Profile updated successfully!');
       }

       //Change password
       public function updatePassword(Request $request){
        //Validate the input
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:10|confirmed',
        ]);

        //get the auth user
        $user = Auth::user();

       // Check if the current password is correct
         if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'The current password does not match our records.']);
         }

         // update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Change Password Successfully!');
       }

      
}
