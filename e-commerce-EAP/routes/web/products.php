<?php

use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use App\Models\Category;
use App\Models\Detail;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'authadmin'])->group(function(){

    Route::get('/admin/products',[ProductController::class, 'index'])->name('product.index');

    Route::get('/admin/products/create',[ProductController::class, 'create'])->name('product.create');
    Route::post('/admin/products/store',[ProductController::class, 'store'])->name('product.store');

    Route::get('/admin/products/{product}/edit',[ProductController::class, 'edit'])->name('product.edit');
    Route::put('/admin/products/{product}/update',[ProductController::class, 'update'])->name('product.update');

    Route::delete('/admin/products/{product}/destroy',[ProductController::class, 'destroy'])->name('product.destroy');

    Route::get('admin/product/{product}/add_detail', function($product){
        $product = Product::find($product);
    
        return view('admin.product.add-details', [
            'product' => $product,
            'details' => Detail::all(),
        ]);
    })->name('product.detail.add');

    Route::put('/admin/product/{product}/attach_details', [ProductController::class, 'attach_detail'])->name('product.detail.attach');
    Route::put('/admin/product/{product}/detach_details', [ProductController::class, 'detach_detail'])->name('product.detail.detach');

    Route::get('admin/product/{product}/add_tag', function($product){
        $product = Product::find($product);
    
        return view('admin.product.add-tags', [
            'product' => $product,
            'tags' => Tag::all(),
        ]);
    })->name('product.tag.add');

    Route::put('/admin/product/{product}/attach_tags', [ProductController::class, 'attach_tag'])->name('product.tag.attach');
    Route::put('/admin/product/{product}/detach_tags', [ProductController::class, 'detach_tag'])->name('product.tag.detach');

});

Route::middleware(['auth', 'verified'])->group(function(){

    Route::get('/shop/wishlist', function(){
        $products = auth()->user()->wishlist;
        return view('wishlist', [
            'products'=>$products,
            'categories' => Category::all(),
        ]);
    })->name('wishlist');

    Route::put('/product/add-to-wishlist', [ProductController::class, 'attach_product_wishlist'])->name('add.wishlist');
    Route::put('/product/delete-from-wishlist', [ProductController::class, 'detach_product_wishlist'])->name('delete.wishlist');


    Route::get('/product/cart',[CartController::class, 'index'])->name('cart');

    Route::put('/product/add-to-cart', [ProductController::class, 'attach_product_cart'])->name('add.toCart');
    Route::put('/product/delete-from-cart', [ProductController::class, 'detach_product_cart'])->name('delete.fromCart');
    Route::put('/product/delete-all-cart', [ProductController::class, 'detach_product_cart'])->name('delete.allCart');

    Route::put('/product/edit/stock/{product}', [ProductController::class, 'edit_stock'])->name('product.cart.stock');

    Route::get('product/checkout', [OrderController::class, 'index'])->name('checkout'); 
});

Route::get('/user/product-details/{product}', [ProductController::class, 'show'])->name('product-details');

Route::get('/shop/{name}',[ShopController::class, 'index'])->name('product.category');