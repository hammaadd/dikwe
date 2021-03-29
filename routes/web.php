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
})->name('home');
Route::get('register', function () {
    return view('visitor.content.register');
})->name('register');
Route::get('login', function () {
    return view('visitor.content.login');
})->name('login');
Route::get('confirm-email', function () {
    return view('visitor.content.confirmEmail');
})->name('confirm-email');
Route::get('forget-password', function () {
    return view('visitor.content.forgetPassword');
})->name('forgot-password');
Route::get('confirmation-code', function () {
    return view('visitor.content.confirmationCode');
})->name('confirmation-code');
Route::get('password-reset', function () {
    return view('visitor.content.resetPassword');
})->name('password-reset');
Route::get('short-url-search', function () {
    return view('visitor.content.searchShortURL');
})->name('short-url-search');
Route::get('url-search-result', function () {
    return view('visitor.content.searchResult');
})->name('url-search-result');
Route::get('pricing', function () {
    return view('visitor.content.pricing');
})->name('pricing');
Route::get('features', function () {
    return view('visitor.content.features');
})->name('features');
Route::get('dashboard', function () {
    return view('user.content.dashboard');
})->name('dashboard');





// Admin Routes
Route::get('admin/dashboard','Admin\DashboardController@index')->name('admin.dashboard');
