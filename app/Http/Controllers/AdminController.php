<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.admin-login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin/dashboard')->with('success', 'Logged in successfully');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login')->with('success', 'Logged out successfully');
    }

    //Show All products 
    // public function allproducts(){
    //     return view('admin.all-products');
    // }

    public function showAll()
    {
    // Assuming you are fetching products from a Product model
    $products = Product::Simplepaginate(6); // 6 products per page
    return view('admin.all-products', compact('products'));
    }

    //Add Product

    public function add(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'stock' => 'required',
            'price' => 'required',

        ]);


    $formFields = $request->all();
    
        if($request->hasFile('img')) {
            $formFields['img'] = $request->file('img')->store('img', 'public');
        }

        Product::create($formFields);

        return redirect('/products')->with('message', 'Add product successfully!');

    }



    public function orderDetails($order_id) {
        $orders = Order::where('order_id', $order_id)->with('orderProducts.product')->firstOrFail();
    
        $subtotal = $orders->orderProducts->sum(function ($orderProduct) {
            return $orderProduct->quantity * $orderProduct->price;
        });
    
        return view('admin.order-details', compact('orders', 'subtotal'));
    }

    //show inventory

    public function inventory(){
        return view('admin.inventory');
    }


    //Show customer order
    public function customerOrder(){
        $orders = Order::all();
        return view('admin.order-list', compact('orders'));
    }

    public function updateOrderStatus(Request $request)
    {
        // Validate the request data
        $request->validate([
            'order_id' => 'required|exists:orders,order_id',
            'order_status' => 'required|in:Processing,Completed,Cancelled',
        ]);
    
        // Find the order by ID
        $order = Order::find($request->order_id);
    
        // Update the order status
        $order->order_status = $request->order_status;
        $order->save();
    
        // Redirect back with a success message
        return back()->with('success', 'Order status updated successfully!');
    }
    

   

    //Add Staff

    public function addStaff(Request $request) {
        //code.................

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8',
        ]);

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return back()->with('success', "Admin Succesfully Created");
    }

    public function staffList(){
        $admins = Admin::all();
        return view('admin.staff', compact('admins'));
    }

    //edit single staff 
    public function updateStaff(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update($request->only('name', 'email'));
        
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Admin updated successfully');
    }
    

   //Delete single staff 
   public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->back()->with('success', 'Admin deleted successfully');
    }

        
}