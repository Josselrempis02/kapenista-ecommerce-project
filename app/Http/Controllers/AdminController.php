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
use Illuminate\Support\Facades\Storage;
use App\Notifications\OrderStatusUpdated;
use Illuminate\Support\Facades\Notification;

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

    public function showAll()
    {
        $products = Product::Simplepaginate(6);
        $categories = CategoryModel::all();

        return view('admin.all-products', compact('products', 'categories'));
    }

    public function add(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:category,id',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'img' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('img')) {
            $validatedData['img'] = $request->file('img')->store('products', 'public');
        }

        Product::create($validatedData);

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function orderDetails($order_id) {
        $orders = Order::with('user', 'orderProducts.product')->find($order_id);

        if (!$orders) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        $subtotal = $orders->orderProducts->sum(function ($orderProduct) {
            return $orderProduct->quantity * $orderProduct->price;
        });

        $orderProducts = $orders->orderProducts;

        return view('admin.order-details', compact('orders', 'subtotal','orderProducts'));
    }

    public function showInventory() {
        $products = Product::with('category')->get();

        return view('admin.inventory', compact('products'));
    }

    public function customerOrder(Request $request)
    {
        $search = $request->input('search');
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');

        $query = Order::with(['user', 'orderProducts.product']);

        if ($search) {
            $query->where('order_number', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
        }

        if ($fromDate) {
            $query->whereDate('created_at', '>=', $fromDate);
        }

        if ($toDate) {
            $query->whereDate('created_at', '<=', $toDate);
        }

        $orders = $query->orderBy('created_at', 'desc')->simplePaginate(10);

        $orders->appends($request->all());

        return view('admin.order-list', compact('orders', 'search', 'fromDate', 'toDate'));
    }

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

    public function updateStaff(Request $request, $id)
    {
        $admin = Staff::findOrFail($id);
        $admin->update($request->only('name', 'email'));

        return redirect()->back()->with('success', 'Staff updated successfully');
    }

    public function destroy($id)
    {
        $admin = Staff::findOrFail($id);
        $admin->delete();

        return redirect()->back()->with('success', 'Staff deleted successfully');
    }

    public function updateProduct(Request $request, $id)
    {   
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:category,id',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'img' => 'nullable|image|max:2048',
        ]);

        $product = Product::findOrFail($id);

        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'] ?? $product->description;
        $product->category_id = $validatedData['category_id'];
        $product->stock = $validatedData['stock'];
        $product->price = $validatedData['price'];

        if ($request->hasFile('img')) {
            if ($product->img) {
                \Storage::disk('public')->delete($product->img);
            }
            $product->img = $request->file('img')->store('products', 'public');
        }

        $product->save();

        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    public function destroyProduct($id)
{
    $product = Product::findOrFail($id);

    if ($product->img) {
        Storage::disk('public')->delete($product->img);
    }

    $product->delete();

    return redirect()->back()->with('success', 'Product deleted successfully!');
}

    public function updateInventory(Request $request, $id)
    {
        $request->validate([
            'stock' => 'required|integer|min:0',
        ]);

        $product = Product::findOrFail($id);

        $product->stock = $request->input('stock');

        $product->save();

        return redirect()->back()->with('success', 'Product updated successfully');
    }

    public function updateOrderStatus(Request $request, $order_id)
    {
        $request->validate([
            'status' => 'required|in:Processing,Delivered,Completed,Cancelled',
        ]);

        $order = Order::findOrFail($order_id);

        $oldStatus = $order->status;

        $order->status = $request->status;
        $order->save();

        $user = $order->user;

        $user->notify(new OrderStatusUpdated($order));

        if ($oldStatus !== 'Delivered' && $order->status === 'Delivered') {
            $user->notify(new OrderDelivered($order));
        }

        return back()->with('success', 'Order status updated successfully.');
    }

    public function showCustomerList(){
        $users = User::all();

        return view('admin.customer-list', compact('users'));
    }

    public function destroyCustomer($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully');
    }

    public function showDashboard(Request $request)
    {
        $totalOrder = Order::with('orderProducts')->get(); 
        $orderCount = $totalOrder->count();

        $priceCount = $totalOrder->sum(function ($order) {
            return $order->orderProducts->sum('total_price');
        });

        $completedOrders = Order::where('status', 'Completed')->get();
        $completedOrderCount = $completedOrders->count();

        $bestSellingProduct = OrdersProduct::select('product_id', \DB::raw('COUNT(*) as total_sales'))
            ->groupBy('product_id')
            ->orderBy('total_sales', 'DESC')
            ->first();

        if ($bestSellingProduct) {
            $bestSellingProductDetails = Product::find($bestSellingProduct->product_id);
        }

        $salesData = OrdersProduct::select(
                \DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), 
                \DB::raw('SUM(total_price) as total_sales')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = $salesData->pluck('month')->map(function ($month) {
            return \Carbon\Carbon::parse($month)->format('F Y');
        });
        $data = $salesData->pluck('total_sales');

        $query = Order::with(['user', 'orderProducts.product']);

        $orders = $query->orderBy('created_at', 'desc')->simplePaginate(10);

        $orders->appends($request->all());

        return view('admin.dashboard', compact('orderCount', 'totalOrder', 'priceCount', 'completedOrders', 'completedOrderCount', 'bestSellingProduct', 'bestSellingProductDetails', 'labels', 'data', 'orders'));
    }
}
