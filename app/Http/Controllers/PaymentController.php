<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrdersProduct;
use Illuminate\Support\Facades\DB;
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
        ]);

        // Retrieve cart items from the session or another source
        $cartItems = Cart::content();  // Assuming your cart is stored in session

       
        // Start a database transaction
        DB::transaction(function () use ($request, $cartItems) {
            // Create a new order
            $order = new Order;
            $order->user_id = Auth::id(); // Get the authenticated user's ID
            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->address = $request->address;
            $order->city = $request->city;
            $order->payment_method = $request->payment_method;

            // Save the order
            $order->save();

             // Loop through the cart items and create OrdersProduct entries
           foreach ($cartItems as $item) {
                $order_product = new OrdersProduct;
                
                // Assigning the order ID to the order_id property of the OrdersProduct model
                $order_product->order_id = $order->order_id; // Correctly assign order_id
                $order_product->product_id = $item->id; // Access 'id' from CartItem
                $order_product->quantity = $item->qty;  // Access 'qty' from CartItem
                $order_product->price = $item->price;   // Access 'price' from CartItem
                
                // Calculate total price based on quantity and price
                $order_product->total_price = $item->price * $item->qty;
                
                // Save the OrdersProduct instance to the database
                $order_product->save();
        }
            
            
            

        });
        // Clear the cart after placing the order
        Cart::destroy();

        // Redirect back to the home page
        return redirect()->route('shop')->with('success', 'Order placed successfully!');

        
    }
}
