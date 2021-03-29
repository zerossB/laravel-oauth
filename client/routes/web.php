<?php

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

Route::get('', function () {
    return view('welcome');
});

Route::prefix('auth')->namespace('Auth')->group(function () {
    Route::get('login')->name('auth.login')->uses('LoginController');
    Route::get('callback')->name('auth.callback')->uses('CallbackController');
    Route::get('login/form/')->name('auth.login.form')->uses('LoginFormController');
    Route::post('callback/password/')->name('auth.callback.password')->uses('CallbackPasswordController');
});
