<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Staff;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\OrdersProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\OrderDelivered;
use App\Notifications\OrderStatusUpdated;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.admin-login');
    }

    //LOGIN STAF,ADMIN
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

        if (Auth::guard('staff')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin/dashboard')->with('success', 'Logged in successfully');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            $redirectTo = '/admin/login';
        } elseif (Auth::guard('staff')->check()) {
            Auth::guard('staff')->logout();
            $redirectTo = '/admin/login';
        } else {
            $redirectTo = '/login';
        }
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect($redirectTo)->with('success', 'Logged out successfully');
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
    public function customerOrder(Request $request)
    {
        // Retrieve filter inputs
        $search = $request->input('search');
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');

        // Build the query
        $query = Order::with(['user', 'orderProducts.product']);

        // Apply search filter
        if ($search) {
            $query->where('order_number', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
        }

        // Apply date filters
        if ($fromDate) {
            $query->whereDate('created_at', '>=', $fromDate);
        }

        if ($toDate) {
            $query->whereDate('created_at', '<=', $toDate);
        }

        // Order by latest first
        $orders = $query->orderBy('created_at', 'desc')->simplePaginate(10); // Adjust pagination as needed

        // Preserve query parameters in pagination links
        $orders->appends($request->all());

        return view('admin.order-list', compact('orders', 'search', 'fromDate', 'toDate'));
    }

  
   

    //Add Staff
    public function addStaff(Request $request) {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:staff',
            'password' => 'required|string|min:8',
        ]);

        $admin = new Staff;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return back()->with('success', "Admin Succesfully Created");
    }

    public function staffList(){
        $admins = Staff::all();
        return view('admin.staff', compact('admins'));
    }

    //edit single staff 
    public function updateStaff(Request $request, $id)
    {
        $admin = Staff::findOrFail($id);
        $admin->update($request->only('name', 'email'));
        
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Staff updated successfully');
    }
    

   //Delete single staff 
   public function destroy($id)
    {
        $admin = Staff::findOrFail($id);
        $admin->delete();

        return redirect()->back()->with('success', 'Staff deleted successfully');
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

    //Order UPdate status 

    public function updateOrderStatus(Request $request, $order_id)
    {
        // Validate the incoming request
        $request->validate([
            'status' => 'required|in:Processing,Delivered,Completed,Cancelled',
        ]);

        // Find the order by ID
        $order = Order::findOrFail($order_id);

        // Store the old status to compare later
        $oldStatus = $order->status;

        // Update the order status
        $order->status = $request->status;
        $order->save();

        // Get the user associated with the order
        $user = $order->user; // Ensure the Order model has a 'user' relationship

        // Always send a general status update notification
        $user->notify(new OrderStatusUpdated($order));

        // If the status is changed to 'Delivered', send an additional notification
        if ($oldStatus !== 'Delivered' && $order->status === 'Delivered') {
            $user->notify(new OrderDelivered($order));
        }

        // Redirect back with a success message
        return back()->with('success', 'Order status updated successfully.');
    }

        //Show Customer list 
        public function showCustomerList(){

            $users = User::all();
           
            return view('admin.customer-list', compact('users'));
        }

        //Delet single Customer 
       
        public function destroyCustomer($id)
        {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->back()->with('success', 'User deleted successfully');
        }

        //Show Dashboard
        public function showDashboard(Request $request)
        {
            // Get all orders with their associated order products using eager loading
            $totalOrder = Order::with('orderProducts')->get(); 
            $orderCount = $totalOrder->count();
        
            // Calculate total sales by summing the price from the associated order products
            $priceCount = $totalOrder->sum(function ($order) {
                return $order->orderProducts->sum('total_price'); // Sum the price for each order's products
            });
        
            // Fetch all orders with the status of 'complete'
            $completedOrders = Order::where('status', 'Completed')->get();
            $completedOrderCount = $completedOrders->count();
        
            // Get the best-selling product
            $bestSellingProduct = OrdersProduct::select('product_id', \DB::raw('COUNT(*) as total_sales'))
                ->groupBy('product_id')
                ->orderBy('total_sales', 'DESC')
                ->first();
        
            // If you want to get more details about the product, you may join with the products table
            if ($bestSellingProduct) {
                $bestSellingProductDetails = Product::find($bestSellingProduct->product_id);
            }
        
            // Calculate total sales amount by month for the graph
            $salesData = OrdersProduct::select(
                    \DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), 
                    \DB::raw('SUM(total_price) as total_sales')
                )
                ->groupBy('month')
                ->orderBy('month')
                ->get();
        
            // Prepare labels and data for the graph
            $labels = $salesData->pluck('month')->map(function ($month) {
                return \Carbon\Carbon::parse($month)->format('F Y'); // Format month for display
            });
            $data = $salesData->pluck('total_sales');

            $query = Order::with(['user', 'orderProducts.product']);

            //Order by latest first
            $orders = $query->orderBy('created_at', 'desc')->simplePaginate(10); // Adjust pagination as needed

            // Preserve query parameters in pagination links
            $orders->appends($request->all());
        
            // Return the view with all necessary data
            return view('admin.dashboard', compact('orderCount', 'totalOrder', 'priceCount', 'completedOrders', 'completedOrderCount', 'bestSellingProduct', 'bestSellingProductDetails', 'labels', 'data', 'orders'));
        }
        

        
}
