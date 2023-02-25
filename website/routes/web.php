<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

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


Route::get('/', [HomeController::class, 'index'])->name('website.home');
Route::prefix('/')->group(function () {
    Route::get('/moderation', [ProductController::class, 'index'])->name('products.index');
    Route::post('/moderation', [ProductController::class, 'store'])->name('products.store');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('/moderation/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/moderation/{product}', [ProductController::class, 'update'])->name('products.update');

    Route::group(
        ['middleware' => ['guest']],
        function () {
            Route::get('/register', [RegisterController::class, 'index'])->name('register.show');
            Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');

            Route::get('/login', [LoginController::class, 'index'])->name('login.show');
            Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
        }
    );

    Route::group(
        ['middleware' => ['auth']],
        function () {
            Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
        }
    );
});