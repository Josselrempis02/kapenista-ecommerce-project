<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrdersProduct;
use Illuminate\Support\Facades\DB;
use App\Notifications\OrderInvoice;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

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
    
        // Retrieve cart items from the session
        $cartItems = Cart::content();
        
        $order = null; // Initialize the order variable
    
        // Start a database transaction
        DB::transaction(function () use ($request, $cartItems, &$order) {
            // Create a new order
            $order = new Order;
            $order->user_id = Auth::id();
            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->address = $request->address;
            $order->city = $request->city;
            $order->payment_method = $request->payment_method;
    
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
    
        // Redirect to the order message with the order ID
        return redirect()->route('OrderMessage', ['order_id' => $order->order_id]) // Ensure using the correct property
            ->with('success', 'Order placed successfully!');
    }
    
}
