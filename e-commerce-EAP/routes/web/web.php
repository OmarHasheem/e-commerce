<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/shop', [ShopController::class, 'index'])->name('shop');

Route::get('/about', function(){
    return view('about', [
        'categories' => Category::all(),
    ]);
})->name('about');

Route::get('/privacy-policy', function(){
    return view('privacy-policy', [
        'categories' => Category::all()
    ]);
})->name('privacy_policy');

Route::get('/terms-conditions', function(){
    return view('terms-conditions', [
        'categories' => Category::all()
    ]);
})->name('terms_conditions');


require __DIR__.'/auth.php'; 