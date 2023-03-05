<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
Route::middleware(['auth', 'verified'])->group(function(){

    Route::get('/admin/categories',[CategoryController::class, 'index'])->name('category.index');

    Route::get('/admin/categories/create',[CategoryController::class, 'create'])->name('category.create');
    Route::post('/categories/store',[CategoryController::class, 'store'])->name('category.store');

    Route::get('/admin/categories/{category}/edit',[CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/admin/categories/{category}/update',[CategoryController::class, 'update'])->name('category.update');

    Route::delete('/admin/categories/{category}/destroy',[CategoryController::class, 'destroy'])->name('category.destroy');

});