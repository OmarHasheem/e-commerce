<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {


        return view('home',[
            'categories' => Category::all(),
            'newProducts' => Product::latest()->take(8)->get(),
            'popularProducts' => Product::whereBetween('id', ['4', '12'])->get(),
            'saleProducts' => Product::whereBetween('stock', ['1', '3'])->get(),
        ]);
    }
}
