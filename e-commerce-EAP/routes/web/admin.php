<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'authadmin'])->group(function(){

    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/admin/users',[UserController::class, 'index'])->name('user.index');
    Route::put('/admin/users/updated',[UserController::class, 'update'])->name('user.update');
    Route::delete('/admin/users/{user}/destroy',[UserController::class, 'destroy'])->name('user.destroy');


    Route::get('/admin/tags',[TagController::class, 'index'])->name('tag.index');
    Route::get('/admin/tags/create',[TagController::class, 'create'])->name('tag.create');
    Route::post('/admin/tags/store',[TagController::class, 'store'])->name('tag.store');
    Route::get('/admin/tags/{tag}/edit',[TagController::class, 'edit'])->name('tag.edit');
    Route::put('/admin/tags/{tag}/update',[TagController::class, 'update'])->name('tag.update');
    Route::delete('/admin/tags/{tag}/destroy',[TagController::class, 'destroy'])->name('tag.destroy');



    Route::get('/admin/details',[DetailController::class, 'index'])->name('detail.index');
    Route::get('/admin/details/create',[DetailController::class, 'create'])->name('detail.create');
    Route::post('/admin/details/store',[DetailController::class, 'store'])->name('detail.store');
    Route::get('/admin/details/{detail}/edit',[DetailController::class, 'edit'])->name('detail.edit');
    Route::put('/admin/details/{detail}/update',[DetailController::class, 'update'])->name('detail.update');
    Route::delete('/admin/details/{detail}/destroy',[DetailController::class, 'destroy'])->name('detail.destroy');


    Route::get('/admin/users/contacts',[ContactController::class, 'show'])->name('contact.show');
    Route::delete('/admin/users/contacts/{contact}/destroy',[ContactController::class, 'destroy'])->name('contact.destroy');

    Route::get('/admin/users/orders',[OrderController::class, 'show'])->name('order.show');
    Route::delete('/admin/users/orders/{order}/destroy',[OrderController::class, 'destroy'])->name('order.destroy');

    Route::get('/admin/products-of-order/{order}', [OrderController::class, 'show_products_by_admin'])->name('admin.productsOfOrder');
    
});