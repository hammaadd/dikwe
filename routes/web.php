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

Route::get('/', function () {
    return view('visitor.content.mainScreen');
});
Route::get('register', function () {
    return view('visitor.content.register');
});
Route::get('login', function () {
    return view('visitor.content.login');
})->name('login');
Route::get('confirm-email', function () {
    return view('visitor.content.confirmEmail');
});
Route::get('forget-password', function () {
    return view('visitor.content.forgetPassword');
});
Route::get('confirmation-code', function () {
    return view('visitor.content.confirmationCode');
});
Route::get('password-reset', function () {
    return view('visitor.content.resetPassword');
});
Route::get('short-url-search', function () {
    return view('visitor.content.searchShortURL');
});
Route::get('url-search-result', function () {
    return view('visitor.content.searchResult');
});
Route::get('pricing', function () {
    return view('visitor.content.pricing');
});
Route::get('features', function () {
    return view('visitor.content.features');
});
