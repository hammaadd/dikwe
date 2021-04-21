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


Route::get('/', 'VisitorController@homePage')->name('home');
Route::post('/subscribe', 'VisitorController@subscribe')->name('subscribe');
Route::get('register', function () {
    return view('visitor.content.register');
})->name('register');
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
Route::get('tags', function () {
    return view('user.content.tags');
})->name('tags');
Route::get('workspaces', function () {
    return view('user.content.workspaces');
})->name('workspaces');



Auth::routes();

Route::prefix('u')->group(function(){
    Route::get('/login','Auth\LoginController@showLoginForm')->name('login.form');
    Route::post('/login','Auth\LoginController@login')->name('login');
    Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('register.form');
    Route::post('/register','Auth\RegisterController@register')->name('register');
    Route::post('/logout','Auth\LoginController@logout')->name('logout');
     Route::get('contact-us', function () {
        return view('user.content.contactus');
    })->name('contactus');
    Route::post('user/contactus','VisitorController@contactus')->name('user.contactus');

});

Route::prefix('u')->middleware('role:user')->name('u.')->group(function () {
    Route::get('dashboard', function () {
        return view('user.content.dashboard');
    })->name('dashboard');
   
});

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
    Route::get('/manage-slides','Admin\ContentController@slides')->name('slides');
    Route::post('/add-slide','Admin\ContentController@addSlide')->name('add.slide');
    Route::get('/edit-slide/{slide}','Admin\ContentController@editSlide')->name('edit.slide');
    Route::put('/update-slide/{slide}','Admin\ContentController@editSlide')->name('update.slide');

    //Feature content Management
    Route::get('/manage-features','Admin\FeatureController@features')->name('features');
    Route::post('/add-feature','Admin\FeatureController@addFeature')->name('add.feature');
    Route::get('/edit-feature/{feature}','Admin\FeatureController@editFeature')->name('edit.feature');
    Route::get('/delete-feature-image/{feature}','Admin\FeatureController@deleteImage')->name('delete.feature.image');
    Route::put('/update-feature/{feature}','Admin\FeatureController@updateFeature')->name('update.feature');
    Route::get('/delete-feature/{feature}','Admin\FeatureController@deleteFeature')->name('delete.feature');

    //Frequently Asked Questions
    Route::get('/manage-faqs','Admin\FaqController@faqs')->name('faqs');
    Route::post('/add-faq','Admin\FaqController@addFaq')->name('add.faq');
    Route::get('/edit-faq/{faq}','Admin\FaqController@editFaq')->name('edit.faq');
    Route::put('/update-faq/{faq}','Admin\FaqController@updateFaq')->name('update.faq');
    Route::get('/delete-faq/{faq}','Admin\FaqController@deleteFaq')->name('delete.faq');
    // users manage 
    Route::get('/subscriber/all','Admin\UserManageController@index')->name('subscriber.all');
    Route::get('/subscriber/delete/{subcriber}','Admin\UserManageController@delete')->name('delete.subscribe');
    // Short Codes
    Route::get('/short-code/all','Admin\ScodeController@codes')->name('shortcode.all');
    Route::post('/add-code','Admin\ScodeController@addCode')->name('add.code');
    Route::get('/edit-scode/{scode}','Admin\ScodeController@editscode')->name('edit.code');
    Route::put('/update-scode/{scode}','Admin\ScodeController@updatecode')->name('update.code');
    Route::get('/delete-scode/{scode}','Admin\ScodeController@deletecode')->name('delete.code');
    // users management 
    Route::get('users/all','Admin\UsersController@users')->name('users.all'); 
    Route::post('change/status/{user}','Admin\UsersController@changestatus')->name('change.status');
    Route::get('user/verifyemail/{user}','Admin\UsersController@verifyemail')->name('user.verifyemail');
    
    Route::get('delete/user/{user}','Admin\UsersController@deleteuser')->name('delete.user');
    Route::get('deleted-users','Admin\UsersController@deleteduser')->name('deleted.user');
    Route::get('activateuser/{user}','Admin\UsersController@activateuser')->name('activate.user');

    Route::get('contactus/message','Admin\UserManageController@contactus')->name('contactus.message');
    Route::get('delete/contact/{contact}','Admin\UserManageController@deletecontact')->name('delete.contact');
});





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('homes');
