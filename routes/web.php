<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [CartController::class, 'cartList'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('products', [ProductController::class, 'productList'])
    ->name('products.list');

Route::get('confirmed', [CartController::class, 'latestOrder'])
    ->name('cart.confirmation');

Route::get('cart', [CartController::class, 'cartList'])
    ->name('cart.list');

Route::post('products', [CartController::class, 'sendOrder'])
    ->name('cart.store');

// Route::post('remove', [CartController::class, 'removeCart'])
//     ->name('cart.remove');
// Route::post('clear', [CartController::class, 'clearAllCart'])
//     ->name('cart.clear');
// Route::post('sendorder', [CartController::class, 'sendOrder'])
//     ->name('cart.sendorder');


require __DIR__.'/auth.php';
