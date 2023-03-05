<?php

use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function(){

    Route::get('/admin/subCategories', [SubCategoryController::class, 'index'])->name('subCategory.index');

    Route::get('/admin/subCategories/create', [SubCategoryController::class, 'create'])->name('subCategory.create');
    Route::post('/admin/subCategories/store', [SubCategoryController::class, 'store'])->name('subCategory.store');

    Route::get('/admin/subCategories/{subCategory}/edit', [SubCategoryController::class, 'edit'])->name('subCategory.edit');
    Route::put('/admin/subCategories/{subCategory}/update', [SubCategoryController::class, 'update'])->name('subCategory.update');

    Route::delete('/admin/subCategories/{subCategory}/delete', [SubCategoryController::class, 'destroy'])->name('subCategory.destroy');

});
