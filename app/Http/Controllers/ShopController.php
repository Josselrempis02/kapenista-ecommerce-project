<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //Show Shop pages
    public function shop() {
        return view('pages.shop');
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
    
    
    
    
    
    
}    
