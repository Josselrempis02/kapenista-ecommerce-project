<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    // Show Login Form
    public function login() {
        return view('users.login');
    }

    // Show Register Form
    public function signup() {
        return view('users.signup');
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
        
       
}
