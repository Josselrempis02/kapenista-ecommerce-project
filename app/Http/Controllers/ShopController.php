<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShopController extends Controller
{
    //Show Shop pages
    public function shop() {
        return view('pages.shop');
    }

      //Show cart pages
      public function cart() {
        return view('users.cart');
    }

       //Show checkout pages
       public function checkout() {
        return view('users.checkout');
    }



    //Show ALl product
    public function showProducts() {
        $products = Product::all();
        return view('pages.shop', compact('products'));
    }

    //Show Single product
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

        $product = Product::findorFail($request->input(key:'product_id'));
        
        Cart::add(
            $product->product_id,
            $product->name,
            $request->input('quantity'),
            $product->price,
            ['size' => $request->input('size')] // Storing size as an option
        );
        return redirect()->back()->with('success', 'Product added to cart successfully!');

    }
    
    public function showCart()
    {
        $cartItems = Cart::content(); // Get all items in the cart
        $total = Cart::subtotal(); // Get the cart subtotal
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
    $cartItems = Cart::content(); // Get all items in the cart
        $total = Cart::subtotal(); // Get the cart subtotal
        return view('users.checkout', compact('cartItems', 'total'));
    
    
}    

}
