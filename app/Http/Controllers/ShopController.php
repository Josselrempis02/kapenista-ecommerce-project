<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShopController extends Controller
{
    public function shop() {
        return view('pages.shop');
    }

    public function cart() {
        return view('users.cart');
    }

    public function checkout() {
        return view('users.checkout');
    }

    public function showProducts() {
        $products = Product::all();
        return view('pages.shop', compact('products'));
    }

    public function showProductDetails($product_id) {
        $product = Product::where('product_id', $product_id)->firstOrFail();
    
        $otherProducts = Product::where('product_id', '!=', $product->product_id)
                                ->take(5)
                                ->get();
    
        return view('pages.shop-details', compact('product', 'otherProducts'));
    }

    public function store(Request $request) {
        $request->validate([
            'size' => 'required',
            'quantity' => 'required|integer|min:1',
        ], [
            'size.required' => 'Please select a size before adding to the cart.',
        ]);

        $product = Product::findOrFail($request->input('product_id'));
        
        $price = $product->price;
        if ($request->input('size') === '22oz') {
            $price += 10;
        }
        
        Cart::add(
            $product->product_id,
            $product->name,
            $request->input('quantity'),
            $price,
            ['size' => $request->input('size')]
        );
        
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function showCart()
    {
        $cartItems = Cart::content();
        $total = Cart::subtotal();
        
        return view('users.cart', compact('cartItems', 'total'));
    }

    public function removeItem($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('shop.cart')->with('success', 'Product removed from cart!');
    }

    public function clearCart()
    {
        Cart::destroy();
        return redirect()->route('shop.cart')->with('success', 'Cart cleared successfully!');
    }

    public function showCheckout()
    {
        $cartItems = Cart::content();
        $subtotal = Cart::subtotal();
    
        $deliveryFee = 50;
    
        $total = $subtotal + $deliveryFee;
    
        return view('users.checkout', compact('cartItems', 'subtotal', 'deliveryFee', 'total'));
    }

    public function showByCategory($categoryName) {
        $category = CategoryModel::where('name', $categoryName)->first();
    
        if ($category) {
            $products = Product::where('category_id', $category->id)->get();
        } else {
            $products = collect();
        }
    
        return view('pages.shop', compact('products'));
    }

    public function update(Request $request)
{
    $rowId = $request->input('rowId');
    $quantity = $request->input('quantity');

    // Update the quantity in the cart
    Cart::update($rowId, $quantity);

    // Retrieve the updated cart item
    $cartItem = Cart::get($rowId);

    // Recalculate totals
    $total = Cart::subtotal();

    return response()->json([
        'status' => 'success',
        'message' => 'Cart updated successfully.',
        'subtotal' => $cartItem->subtotal,
        'total' => $total,
    ]);
}
}
