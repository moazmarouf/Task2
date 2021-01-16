<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\UserAjaxController;
use App\Http\Controllers\Dashboard\UserController;
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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'middleware' => ['auth:admin']], function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [UserController::class, 'index'])->name('index.user');

            Route::get('create-user', [UserController::class, 'createUser'])->name('create.user');
            Route::post('create-user', [UserController::class, 'storeUser'])->name('post.user');

            Route::get('edit/{id}', [UserController::class, 'editUser'])->name('edit.user');
            Route::post('edit/{id}', [UserController::class, 'updateUser'])->name('edit.post.user');

            Route::get('delete/{id}', [UserController::class, 'getDelete'])->name('delete.user');
            Route::post('delete/{id}', [UserController::class, 'delete'])->name('delete.post.user');

        });

        Route::group(['prefix' => 'ajax-users'], function () {

            Route::get('create-user', [UserAjaxController::class, 'create'])->name('ajax.users.create');
            Route::post('create-user', [UserAjaxController::class, 'store'])->name('ajax.users.store');
        });

        Route::group(['prefix' => 'category'], function () {
            Route::get('/', [CategoryController::class, 'index'])->name('category.index');


            Route::get('create', [CategoryController::class, 'create'])->name('category.create');
            Route::post('create', [CategoryController::class, 'store'])->name('category.store');

            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
            Route::post('edit/{id}', [CategoryController::class, 'update'])->name('category.update');

            Route::get('delete/{id}', [CategoryController::class, 'getDelete'])->name('category.get.delete');
            Route::post('delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

        });

        Route::group(['prefix' => 'product'], function () {
            Route::get('/', [ProductController::class, 'index'])->name('product.index');

            Route::get('create', [ProductController::class, 'create'])->name('product.create');
            Route::post('create', [ProductController::class, 'store'])->name('product.store');

            Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
            Route::post('edit/{id}', [ProductController::class, 'update'])->name('product.update');

            Route::get('delete/{id}', [ProductController::class, 'getDelete'])->name('product.get.delete');
            Route::post('delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

        });
        //Route::get('news','News');


    });
    Route::group(['prefix' => 'admin', 'namespace' => 'Dashboard', 'middleware' => ['guest:admin']], function () {
        Route::get('login', [LoginController::class, 'login'])->name('admin.login');
        Route::post('login', [LoginController::class, 'postLogin'])->name('admin.post.login');
    });

});
