<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShopController extends Controller
{
    // Show the shop page
    public function shop() {
        return view('pages.shop');
    }

    // Show the cart page
    public function cart() {
        return view('users.cart');
    }

    // Show the checkout page
    public function checkout() {
        return view('users.checkout');
    }

    // Fetch and show all products on the shop page
    public function showProducts() {
        $products = Product::all();
        return view('pages.shop', compact('products'));
    }

    // Fetch and show details for a single product, including a selection of other products
    public function showProductDetails($product_id) {
        $product = Product::where('product_id', $product_id)->firstOrFail();
    
        $otherProducts = Product::where('product_id', '!=', $product->product_id)
                                ->take(5) // Fetch 5 other products to display as recommendations
                                ->get();
    
        return view('pages.shop-details', compact('product', 'otherProducts'));
    }
    
  // Add product to the cart with selected size and quantity
public function store(Request $request) {
    // Validate the size and quantity fields
    $request->validate([
        'size' => 'required',
        'quantity' => 'required|integer|min:1',
    ], [
        'size.required' => 'Please select a size before adding to the cart.',
    ]);

    // Find the product by its ID
    $product = Product::findOrFail($request->input('product_id'));
    
    // Adjust the price based on the selected size
    $price = $product->price;
    if ($request->input('size') === '22oz') {
        $price += 10; // Add 10 to the base price for the 22oz size
    }
    
    // Add the product to the cart with the adjusted price, selected size, and quantity
    Cart::add(
        $product->product_id,
        $product->name,
        $request->input('quantity'),
        $price, // Use the adjusted price
        ['size' => $request->input('size')] // Store size as an option
    );
    
    return redirect()->back()->with('success', 'Product added to cart successfully!');
}

    
    // Show the current cart contents
    public function showCart()
    {
        $cartItems = Cart::content(); // Get all items in the cart
        $total = Cart::subtotal(); // Get the cart subtotal (total before any additional fees)
        
        return view('users.cart', compact('cartItems', 'total'));
    }

    // Remove a single item from the cart by its row ID
    public function removeItem($rowId)
    {
        Cart::remove($rowId); // Remove the item from the cart
        return redirect()->route('shop.cart')->with('success', 'Product removed from cart!');
    }

    // Clear the entire cart
    public function clearCart()
    {
        Cart::destroy(); // Empty the cart
        return redirect()->route('shop.cart')->with('success', 'Cart cleared successfully!');
    }

    // Show the checkout page with a summary of cart items, subtotal, delivery fee, and total
    public function showCheckout()
    {
        $cartItems = Cart::content(); // Get all items in the cart
        $subtotal = Cart::subtotal(); // Get the cart subtotal
    
        $deliveryFee = 50; // Set a fixed delivery fee
    
        // Calculate the total including delivery fee
        $total = $subtotal + $deliveryFee;
    
        return view('users.checkout', compact('cartItems', 'subtotal', 'deliveryFee', 'total'));
    }

    // Show products by category, based on the category name provided in the URL
    public function showByCategory($categoryName) {
        // Fetch category by its name
        $category = CategoryModel::where('name', $categoryName)->first();
    
        if ($category) {
            // Fetch products that belong to the category
            $products = Product::where('category_id', $category->id)->get();
        } else {
            // If the category is not found, return an empty product list
            $products = collect();
        }
    
        return view('pages.shop', compact('products'));
    }


    public function update(Request $request)
{
    \Cart::update($request->rowId, $request->qty);
    return response()->json(['success' => true]);
}
}
