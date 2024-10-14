<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrdersProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\OrderInvoice;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function placeOrder(Request $request)
    {
        // Validate the request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'payment_method' => 'required|in:GCash,COD',
            'gcash_reference_number' => 'required_if:payment_method,GCash|nullable|string|max:255',
            'gcash_receipt' => 'required_if:payment_method,GCash|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Generate a unique order token (to prevent duplicate submissions)
        $orderToken = Str::uuid(); // Generate a unique UUID token
    
        // Retrieve cart items from the session
        $cartItems = Cart::content();

        $order = null; // Initialize the order variable

        // Generate a unique order number
        $orderNumber = $this->generateOrderNumber();
    
        // Start a database transaction
        DB::transaction(function () use ($request, $cartItems, &$order, $orderToken, $orderNumber) {
            // Check if the order with the same token already exists
            if (Order::where('order_token', $orderToken)->exists()) {
                return redirect()->back()->withErrors('This order has already been processed.');
            }

            // Create a new order
            $order = new Order;
            $order->user_id = Auth::id();
            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->address = $request->address;
            $order->city = $request->city;
            $order->payment_method = $request->payment_method;
            $order->order_token = $orderToken; // Save unique token to the order
            $order->order_number = $orderNumber; // Save custom order number
    
            // Save GCash information if applicable
            if ($request->payment_method === 'GCash') {
                $order->gcash_reference_number = $request->gcash_reference_number;
    
                if ($request->hasFile('gcash_receipt')) {
                    $receiptPath = $request->file('gcash_receipt')->store('receipts', 'public'); // Save the receipt
                    $order->gcash_receipt = $receiptPath; // Save the path to the receipt
                }
            }
    
            // Save the order
            $order->save();
    
            // Loop through the cart items and create OrdersProduct entries
            foreach ($cartItems as $item) {
                $order_product = new OrdersProduct;
                $order_product->order_id = $order->order_id; // Use the correct ID property
                $order_product->product_id = $item->id;
                $order_product->quantity = $item->qty;
                $order_product->price = $item->price;
                $order_product->total_price = $item->price * $item->qty;
                $order_product->save();
            }
        });
    
        // Clear the cart after placing the order
        Cart::destroy();
    
        // Send the order invoice notification to the user
        Auth::user()->notify(new OrderInvoice($order));
    
        // Redirect to the order message with the custom order number
        return redirect()->route('OrderMessage', ['order_number' => $order->order_number])
            ->with('success', 'Order placed successfully!');
    }

    /**
     * Generate a unique custom order number.
     *
     * @return string
     */
    private function generateOrderNumber()
    {
        // Example format: ORDER-YYYYMMDD-USERID-RANDOM
        $date = now()->format('Ymd'); // Get the current date in YYYYMMDD format
        $userId = Auth::id(); // Get the user ID
        $randomString = strtoupper(Str::random(6)); // Generate a random 6-character string

        return "{$date}-{$userId}-{$randomString}";
    }
}
