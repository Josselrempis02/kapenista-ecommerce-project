<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;
use App\Models\Staff;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\OrdersProduct;
use Illuminate\Support\Facades\DB;
use App\Notifications\OrderInvoice;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Notifications\NewOrderNotification;

class PaymentController extends Controller
{
    public function placeOrder(Request $request)
    {
        $request->validate([
            'Name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'payment_method' => 'required|in:GCash,COD',
            'gcash_reference_number' => 'required_if:payment_method,GCash|nullable|string|max:255',
            'gcash_receipt' => 'required_if:payment_method,GCash|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $orderToken = Str::uuid();
        $cartItems = Cart::content();

        $order = null;

        $orderNumber = $this->generateOrderNumber();
    
        DB::transaction(function () use ($request, $cartItems, &$order, $orderToken, $orderNumber) {
            if (Order::where('order_token', $orderToken)->exists()) {
                return redirect()->back()->withErrors('This order has already been processed.');
            }

            $order = new Order;
            $order->user_id = Auth::id();
            $order->Name = $request->Name;
            $order->address = $request->address;
            $order->city = $request->city;
            $order->payment_method = $request->payment_method;
            $order->order_token = $orderToken;
            $order->order_number = $orderNumber;
    
            if ($request->payment_method === 'GCash') {
                $order->gcash_reference_number = $request->gcash_reference_number;
    
                if ($request->hasFile('gcash_receipt')) {
                    $receiptPath = $request->file('gcash_receipt')->store('receipts', 'public');
                    $order->gcash_receipt = $receiptPath;
                }
            }
    
            $order->save();
    
            foreach ($cartItems as $item) {
                $order_product = new OrdersProduct;
                $order_product->order_id = $order->order_id;
                $order_product->product_id = $item->id;
                $order_product->quantity = $item->qty;
                $order_product->price = $item->price;
                $order_product->total_price = $item->price * $item->qty;
                $order_product->save();

                $product = Product::find($item->id);
                $product->stock -= $item->qty;
                $product->save();
            }
        });
    
        Cart::destroy();
    
        Auth::user()->notify(new OrderInvoice($order));

        $admins = Admin::all();
        foreach ($admins as $admin) {
            $admin->notify(new NewOrderNotification($order));
        }

        $staffMembers = Staff::all();
        foreach ($staffMembers as $staff) {
            $staff->notify(new NewOrderNotification($order));
        }
    
        return redirect()->route('OrderMessage', ['order_number' => $order->order_number])
            ->with('success', 'Order placed successfully!');
    }

    private function generateOrderNumber()
    {
        $date = now()->format('Ymd');
        $userId = Auth::id();
        $randomString = strtoupper(Str::random(6));

        return "{$date}-{$userId}-{$randomString}";
    }
}
