<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\LoginController;
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

    });
    Route::group(['prefix' => 'admin', 'namespace' => 'Dashboard', 'middleware' => ['guest:admin']], function () {
        Route::get('login', [LoginController::class, 'login'])->name('admin.login');
        Route::post('login', [LoginController::class, 'postLogin'])->name('admin.post.login');
    });

});
