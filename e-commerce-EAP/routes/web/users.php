<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function(){

    Route::post('user/address', [AddressController::class, 'store'])->name('create.address');

    Route::post('user/order', [OrderController::class, 'store'])->name('create.order');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

    Route::get('my-account', [UserController::class, 'show'])->name('my-account');

    Route::put('user/update', [UserController::class, 'edit'])->name('user.edit');

    Route::get('/user/products-of-order/{order}', [OrderController::class, 'show_products_by_user'])->name('productsOfOrder');
   
    Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');
});