<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductShowController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ShoppingCart;
use App\Http\Controllers\PaymentController;
use GuzzleHttp\Middleware;
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

Route::group(['middleware' => ['auth', 'verified', 'user.active', 'logout.back']], function () {
    Route::view('profile', 'profile')->name('profile');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});

Route::get('shopping', [ShoppingCart::class, 'payment'])->name('cart.shopping');
Route::get('webcheckout', [PaymentController::class, 'createSession'])->name('webcheckout');
Route::get('payments', [PaymentController::class, 'resultTransation'])->name('payments');
Route::get('pendings', [PaymentController::class, 'pendings'])->name('pendings');
Route::get('/', [ProductShowController::class, 'home'])->name('welcome');
Route::get('/products/{product}', [ProductShowController::class, 'show'])->name('products.show');

require __DIR__.'/auth.php';
