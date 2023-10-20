<?php

use App\Http\Controllers\APIProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Models\User;

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


    Route::prefix('api/')->group(
        function () {
            Route::get('/products', [APIProductController::class, 'getAllProducts'])->name('api.products');
        }
    );

    Route::group(
        ['middleware' => ['can:create-blog-posts']],
        function () {
            Route::get('/create', [ProductController::class, 'create'])->name('products.create');
            Route::post('/create', [ProductController::class, 'store'])->name('products.store');
        }
    );

    Route::group(
        ['middleware' => ['can:edit-blog-posts']],
        function () {
            Route::get('/editing/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
            Route::put('/editing/{product}', [ProductController::class, 'update'])->name('products.update');
        }
    );

    Route::group(
        ['middleware' => ['can:delete-blog-posts']],
        function () {
            Route::delete('/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        }
    );

    Route::group(
        ['middleware' => ['can:create-users']],
        function () {
            // ..
        }
    );

    Route::group(
        ['middleware' => ['can:edit-users']],
        function () {
            Route::put('/users/edit/{user}/update', [UserController::class, 'update'])->name('users.update');
            Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
            Route::get(
                '/users/edit/download/{user}',
                function (User $user) {
                        //dd($user);
                        return Storage::download((string) $user->avatar);
                    }
            )->name('users.download');
        }
    );

    Route::group(
        ['middleware' => ['can:delete-users']],
        function () {
            Route::get('/users/editor/searching', [UserController::class, 'searchUser'])->name('users.search');
            Route::get('/users/editor', [UserController::class, 'showEditing'])->name('users.editor');
        }
    );

    Route::group(
        ['middleware' => ['can:edit-others-blog-posts']],
        function () {
            Route::get('/editing', [ProductController::class, 'showEditing'])->name('products.index');
        }
    );


    Route::group(
        ['middleware' => ['can:delete-others-blog-posts']],
        function () {
        }
    );

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
            Route::get('/profile/{user}', [UserController::class, 'show'])->name('home.profile');
            Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
        }
    );
});