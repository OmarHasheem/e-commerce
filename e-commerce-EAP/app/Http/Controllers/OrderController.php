<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $products = auth()->user()->carts;
        return view('checkout', [
            'products'=>$products,
            'categories' => Category::all()
        ]);
    }

    public function show() {
        return view('admin.order.index',[
            'orders' => Order::all(),
        ]);
    }

    public function show_products_by_user(Order $order) {
        return view('user.products-of-order', [
            'order' => $order,
            'products' => $order->products,
            'categories' => Category::all()
        ]);
    }

    public function show_products_by_admin(Order $order) {
        return view('admin.order.products-of-order', [
            'order' => $order,
            'products' => $order->products,
        ]);
    }

    public function store() {
        request()->validate([
            'payment' => 'required'
        ]);

        if(request('payment') == 'cash') {
            $payment = 0;
        } else {
            $payment = 1;
        }

        Order::create([
            'user_id' => auth()->user()->id,
            'total_price' => request('total'),
            'payment' => $payment,
        ]);

        $order = Order::get()->last();

        foreach(auth()->user()->carts as $product) {
            $order->products()->attach($product->id);

            $product->stock = $product->stock - Product::stockInCart($product->id);
            $product->save();

            $order->products()->updateExistingPivot($product->id, ['stock' => Product::stockInCart($product->id)]);
            
        }

        auth()->user()->carts()->sync([]);

        return back();
    }
}
