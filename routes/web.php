<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Livewire\ShoppingCart;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [WelcomeController::class, 'index']);



Route::middleware(['auth'])->group(function (){
    Route::middleware(['can:isAdmin'])->group(function (){
        //products section
        //Route::resource('products', ProductController::class);
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/show/{product}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
        Route::post('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::get('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        //users section
        Route::get('/users/list', [UserController::class, 'index'])->name('users.index');
        Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });
    //koszyk
    Route::get('/cart',ShoppingCart::class)->name('shopping-cart');
    Route::get('/cart/{item}', [ShoppingCart::class, 'destroy'])->name('shopping-cart.destroy');
    //finalizacja zamowienia
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    //strona po zalogowaniu
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::get('/details/{product}', [ProductController::class, 'details'])->name('products.details');

Auth::routes();
