<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    //Show Shop pages
    public function shop() {
        return view('pages.shop');
    }
}
