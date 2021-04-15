<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/user/login', function () {
    return view('visitor.content.login');
})->name('user.login');
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
Route::get('tags', function () {
    return view('user.content.tags');
})->name('tags');
Route::get('workspaces', function () {
    return view('user.content.workspaces');
})->name('workspaces');

Auth::routes();
// Admin Routes
Route::get('admin/login','Admin\AuthController@login')->name('admin.login.form');
//Protected admin routes.
Route::prefix('admin')->middleware('role:superadministrator')->name('admin.')->group(function () {
    Route::get('/dashboard','Admin\DashboardController@index')->name('dashboard');
    //Profile
    Route::get('/update-profile','Admin\ProfileController@updateProfile')->name('update.profile');
    Route::put('/update-profile','Admin\ProfileController@updateProfile')->name('put.profile');
    Route::get('/profile','Admin\ProfileController@index')->name('profile');
    Route::get('/change-password','Admin\ProfileController@changePassword')->name('change.password');
    Route::put('/change-password','Admin\ProfileController@changePassword')->name('change.password.update');
    Route::get('/change-avatar','Admin\ProfileController@changeAvatar')->name('change.avatar');
    Route::post('/change-avatar','Admin\ProfileController@changeAvatar')->name('update.avatar');
    Route::get('/delete-avatar','Admin\ProfileController@deleteAvatar')->name('delete.avatar');

    //Content management Routes
    Route::get('/manage-content','Admin\ContentController@manageContent')->name('manage.content');
    Route::get('/edit-content/{content}','Admin\ContentController@editContent')->name('edit.content');
    Route::put('/update-content/{content}','Admin\ContentController@editContent')->name('update.content');

    //Slider conent management
    Route::get('/slider','Admin\ContentController@slider')->name('slider');
});





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('homes');
