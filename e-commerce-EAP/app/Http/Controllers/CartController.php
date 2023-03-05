<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function index() {
        $products = auth()->user()->carts;
        return view('cart', [
            'products' => $products,
            'categories' => Category::all()
        ]);
    }
}
