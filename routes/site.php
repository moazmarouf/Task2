<?php

use App\Http\Controllers\Site\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {


    Route::get('index', [UserController::class, 'index'])->name('user.index');
    Route::get('user-login', [UserController::class, 'login'])->name('user.login');
    Route::post('user-login', [UserController::class, 'postLogin'])->name('user.post.login');

});


