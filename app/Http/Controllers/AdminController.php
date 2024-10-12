<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\OrdersProduct;
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

    $categories = CategoryModel::all();

    return view('admin.all-products', compact('products', 'categories'));

 


    }




    //Add Product

    public function add(Request $request) {
       // Validate the incoming data
       $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'category_id' => 'required|exists:category,id',
        'stock' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'img' => 'nullable|image|max:2048',
    ]);

    // Handle product image upload if provided
    if ($request->hasFile('img')) {
        $validatedData['img'] = $request->file('img')->store('products', 'public');
    }

    // Create the product
    Product::create($validatedData);

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Product added successfully!');
}



    public function orderDetails($order_id) {
       // Fetch the order using the order ID
        $orders = Order::with('user', 'orderProducts.product')->find($order_id);

        if (!$orders) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        // Calculate the subtotal for products in the order
        $subtotal = $orders->orderProducts->sum(function ($orderProduct) {
            return $orderProduct->quantity * $orderProduct->price;
        });

        // Fetch related products if needed
        $orderProducts = $orders->orderProducts;
        
    
        return view('admin.order-details', compact('orders', 'subtotal','orderProducts'));
    }

    //show inventory

    public function showInventory() {
        // Fetch all products with their categories
        $products = Product::with('category')->get();
        
        return view('admin.inventory', compact('products'));
    }
    

    //Show customer order
    public function customerOrder(){
        $orders = Order::with(['user', 'orderProducts.product'])->get();
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



   // Update the product details in the database
public function updateProduct(Request $request, $id)
{   
    // Validate the incoming data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'category_id' => 'required|exists:category,id',
        'stock' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'img' => 'nullable|image|max:2048',
    ]);

    // Find the product by ID
    $product = Product::findOrFail($id);

    // Update product data
    $product->name = $validatedData['name'];
    $product->description = $validatedData['description'] ?? $product->description;
    $product->category_id = $validatedData['category_id'];
    $product->stock = $validatedData['stock'];
    $product->price = $validatedData['price'];

    // Handle product image upload if provided
    if ($request->hasFile('img')) {
        // Delete the old image if it exists
        if ($product->img) {
            \Storage::disk('public')->delete($product->img);
        }
        // Store the new image and save the path to the product
        $product->img = $request->file('img')->store('products', 'public');
    }


    // Save the updated product back to the database
    $product->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Product updated successfully!');
}


    //Delete Product 
    public function destroyProduct($id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

        // Delete the image if exists
        if ($product->img) {
            \Storage::disk('public')->delete($product->img);
        }

        // Delete the product
        $product->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }


    // Edit Inventory 
    public function updateInventory(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'stock' => 'required|integer|min:0',
        // Add any other fields you'd like to update
    ]);

    // Find the product by its ID
    $product = Product::findOrFail($id);

    // Update the product's stock (and other fields if needed)
    $product->stock = $request->input('stock');
    
    // Save the updated product
    $product->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Product updated successfully');
}

}
