<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'home'])->name('welcome');

Route::group(['middleware' => ['auth', 'verified', 'user.active', 'logout.back']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});

Route::get('/', [ProductController::class, 'home'])->name('welcome');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('products', [ProductController::class, 'index'])
            ->name('products.index');;

Route::post('products', [ProductController::class, 'store'])
            ->middleware(['auth', 'verified', 'user.active', 'logout.back'])
            ->name('products.store');;

Route::put('/products/{product}', [ProductController::class, 'update'])
            ->middleware(['auth', 'verified', 'user.active', 'logout.back'])
            ->name('products.update');

Route::get('/products/create', [ProductController::class, 'create'])
            ->middleware(['auth', 'verified', 'user.active', 'logout.back'])
            ->name('products.create');

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
            ->middleware(['auth', 'verified', 'user.active', 'logout.back'])
            ->name('products.edit');


require __DIR__.'/auth.php';
