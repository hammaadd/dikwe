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

Route::get('u/reload-captcha', 'UserController@reloadCaptcha');

Route::get('/', 'VisitorController@homePage')->name('home');
Route::post('/subscribe', 'VisitorController@subscribe')->name('subscribe');
// Route::get('register', function () {
//     return view('visitor.content.register');
// })->name('register');
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
// Route::get('pricing', function () {
//     return view('visitor.content.pricing');
// })->name('pricing');
Route::get('features', function () {
    return view('visitor.content.features');
})->name('features');

Route::get('workspaces', function () {
    return view('user.content.workspaces');
})->name('workspaces');





Route::get('short-urls', function () {
    return view('user.content.shorturls');
})->name('short-urls');
Route::get('network', function () {
    return view('user.content.network');
})->name('network');
Route::get('network-statistics', function () {
    return view('user.content.network-statistics');
})->name('network-statistics');

Route::get('opened-notebook-gv', function () {
    return view('user.content.opened-notebook-gv');
})->name('opened-notebook-gv');
Route::get('add-note', function () {
    return view('user.content.add-note');
})->name('add-note');
Route::get('tag-bookmarks-lv', function () {
    return view('user.content.tag-bookmarks-lv');
})->name('tag-bookmarks-lv');
Route::get('add-bookmark', function () {
    return view('user.content.add-bookmark');
})->name('add-bookmark');
Route::get('workspace-info', function () {
    return view('user.content.workspace-info');
})->name('workspace-info');
Route::get('notes-info', function () {
    return view('user.content.notes-info');
})->name('notes-info');
Route::get('network-profile-tags', function () {
    return view('user.content.network-profile-tags');
})->name('network-profile-tags');
Route::get('network-profile-notes', function () {
    return view('user.content.network-profile-notes');
})->name('network-profile-notes');
Route::get('tag-info', function () {
    return view('user.content.tag-info');
})->name('tag-info');
Route::get('add-notebook', function () {
    return view('user.content.add-notebook');
})->name('add-notebook');
Route::get('workspace-collapse', function () {
    return view('user.content.workspace-collapse');
})->name('workspace-collapse');
Route::get('opened-bookmarks', function () {
    return view('user.content.opened-bookmarks');
})->name('opened-bookmarks');
Route::get('short-url-info', function () {
    return view('user.content.short-url-info');
})->name('short-url-info');
Route::get('tag-bookmarks-gv', function () {
    return view('user.content.tag-bookmarks-gv');
})->name('tag-bookmarks-gv');
Route::get('add-short-url', function () {
    return view('user.content.add-short-url');
})->name('add-short-url');
Route::get('network-tags-info', function () {
    return view('user.content.network-tags-info');
})->name('network-tags-info');
Route::get('add-workspace', function () {
    return view('user.content.add-workspace');
})->name('add-workspace');
Route::get('bookmark-info', function () {
    return view('user.content.bookmark-info');
})->name('bookmark-info');
Route::get('note-info', function () {
    return view('user.content.note-info');
})->name('note-info');
Route::get('include-bookmark-tags', function () {
    return view('user.content.include-bookmark-tags');
})->name('include-bookmark-tags');
Route::get('opened-notebook-lv', function () {
    return view('user.content.opened-notebook-lv');
})->name('opened-notebook-lv');

Route::get('tag-notebooks-lv', function () {
    return view('user.content.tag-notebooks-lv');
})->name('tag-notebooks-lv');
Route::get('tag-shorturl-lv', function () {
    return view('user.content.tag-shorturl-lv');
})->name('tag-shorturl-lv');
Route::get('edit-note-info', function () {
    return view('user.content.edit-note-info');
})->name('edit-note-info');
Route::get('add-note-tags', function () {
    return view('user.content.add-note-tags');
})->name('add-note-tags');
Route::get('include-shorturl-tag', function () {
    return view('user.content.include-shorturl-tag');
})->name('include-shorturl-tag');
Route::get('notifications', function () {
    return view('user.content.notifications');
})->name('notifications');

Route::get('listview', function () {
    return view('user.content.listview');
})->name('listview');
Route::get('new-layout', function () {
    return view('user.content.new-layout');
})->name('new-layout');
Route::get('new-note-layout', function () {
    return view('user.content.new-note-layout');
})->name('new-note-layout');
Route::get('practise', function(){
    return view('practise');
});

Route::post('practice','NoteController@practice')->name('practice');
Route::get('fetch/practice','NoteController@fetchData')->name('fetchPractice');


Auth::routes(['verify'=>true]);
Route::get('testing','NoteController@checkTest');
Route::get('pricing','VisitorController@pricing')->name('pricing');

// google Login
Route::get('google/login','Auth\LoginController@googlelogin')->name('googlecallbacklogin');

Route::post('u/register','Auth\RegisterController@register')->name('register');

Route::prefix('u')->group(function(){
    Route::get('/login','Auth\LoginController@showLoginForm')->name('login.form');
    Route::post('/login','Auth\LoginController@login')->name('login');
    Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('register.form');
    
    Route::post('/logout','Auth\LoginController@logout')->name('logout');
     Route::get('contact-us', function () {
        return view('user.content.contactus');
    })->name('contactus');
    Route::get('google-login','Auth\LoginController@redirectToProvoider')->name('google.login');
    Route::get('create-tags','UserController@create_tag')->name('create.tag');
    Route::post('store-tags','UserController@storetag')->name('store.tags');
    Route::get('create-short-url','UserController@addurl')->name('create.short.url');
    Route::post('create-short-url','UserController@storeurl')->name('store.url');

    // Create WorkSpace
    Route::get('create-workspace','UserController@addworkspace')->name('add.workspace');
    Route::post('create-workspace','UserController@storeworspace')->name('store.workspace');

    Route::post('/contactus','VisitorController@contactus')->name('user.contactus');
    Route::put('/update-profile','ProfileController@updateprofile')->name('user.update.profile');
    Route::get('/profile/{user}','ProfileController@viewUserProfile')->name('u.profile');
    Route::get('/profile-detail/{user}','ProfileController@viewUserDetailProfile')->name('u.profile.detail');
    // bookmarks
    // Route::get('allbookmarks','UserController@allbookmarks')->name('all.bookmarks');
    //  Route::get('addbookmarks','UserController@addbookmark')->name('add.bookmark');
    //  Route::post('create-bookmark','UserController@storebookmark')->name('store.bookmark');
    //  Route::get('edit-bookmark/{bookmark}','UserController@editbookmark')->name('edit.bookmark');
    // Route::post('update-bookmark/{bookmark}','UserController@updatebookmark')->name('update.bookmark');
    // Route::get('delete-bookmark/{bookmark}','UserController@deletebookmark')->name('delete.bookmark');


    

});

// Route::prefix('u')->middleware('role:user')->name('u.')->group(function () {

Route::prefix('u')->middleware('role:user')->middleware('auth')->group(function () {

    Route::get('dashboard', function () {
        return view('user.content.dashboard');
    })->name('dashboard');
    //User Profile Routes
    Route::get('profile','ProfileController@index')->name('user-profile');

    //Tags
    Route::get('add-tag','TagController@index')->name('add-tag');
    Route::get('tags', function () { return view('user.content.tags'); })->name('tags');
    Route::get('workspaces', function () { return view('user.content.workspaces'); })->name('workspaces');
    Route::get('notes', 'NoteController@index')->name('notes');
    Route::get('bookmarks','BookmarkController@index')->name('bookmarks');
});

Route::get('n/{id}','NoteController@show')->name('view.note');

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
    Route::middleware(["servicecheck:Content"])->group(function () {
        Route::get('/manage-content','Admin\ContentController@manageContent')->name('manage.content');
        Route::get('/edit-content/{content}','Admin\ContentController@editContent')->name('edit.content');
        Route::put('/update-content/{content}','Admin\ContentController@editContent')->name('update.content');
    });
    //Slider conent management
    Route::middleware(["servicecheck:Slides"])->group(function () {
        Route::get('/manage-slides','Admin\ContentController@slides')->name('slides');
        Route::post('/add-slide','Admin\ContentController@addSlide')->name('add.slide');
        Route::get('/edit-slide/{slide}','Admin\ContentController@editSlide')->name('edit.slide');
        Route::put('/update-slide/{slide}','Admin\ContentController@editSlide')->name('update.slide');
    });
    //Feature content Management
    Route::middleware(["servicecheck:Features"])->group(function () {
        Route::get('/manage-features','Admin\FeatureController@features')->name('features');
        Route::post('/add-feature','Admin\FeatureController@addFeature')->name('add.feature');
        Route::get('/edit-feature/{feature}','Admin\FeatureController@editFeature')->name('edit.feature');
        Route::get('/delete-feature-image/{feature}','Admin\FeatureController@deleteImage')->name('delete.feature.image');
        Route::put('/update-feature/{feature}','Admin\FeatureController@updateFeature')->name('update.feature');
        Route::get('/delete-feature/{feature}','Admin\FeatureController@deleteFeature')->name('delete.feature');
    });
    //Frequently Asked Questions
    Route::middleware(["servicecheck:Faq"])->group(function () {
        Route::get('/manage-faqs','Admin\FaqController@faqs')->name('faqs');
        Route::post('/add-faq','Admin\FaqController@addFaq')->name('add.faq');
        Route::get('/edit-faq/{faq}','Admin\FaqController@editFaq')->name('edit.faq');
        Route::put('/update-faq/{faq}','Admin\FaqController@updateFaq')->name('update.faq');
        Route::get('/delete-faq/{faq}','Admin\FaqController@deleteFaq')->name('delete.faq');
    });
    // Subscribers
    Route::middleware(["servicecheck:Subscriber"])->group(function () {
        Route::get('/subscriber/all','Admin\UserManageController@index')->name('subscriber.all');
        Route::get('/subscriber/delete/{subcriber}','Admin\UserManageController@delete')->name('delete.subscribe');
        Route::get('/subscriber/send-mail','Admin\UserManageController@sendmail')->name('subscriber.sendmail');
        Route::post('/subscriber/send-mail','Admin\UserManageController@send_mail')->name('sendmail.subscriber');
        Route::get('/csvexport/subscribers','Admin\UserManageController@exportsubscriber')->name('export.subscriber');
    });
   
    
    
    
    // Short Codes
    Route::middleware(["servicecheck:ShortCodes"])->group(function () {
        Route::get('/short-code/all','Admin\ScodeController@codes')->name('shortcode.all');
        Route::post('/add-code','Admin\ScodeController@addCode')->name('add.code');
        Route::get('/edit-scode/{scode}','Admin\ScodeController@editscode')->name('edit.code');
        Route::put('/update-scode/{scode}','Admin\ScodeController@updatecode')->name('update.code');
        Route::get('/delete-scode/{scode}','Admin\ScodeController@deletecode')->name('delete.code');
    });
    // users management
    Route::middleware(["servicecheck:Users"])->group(function () {
        Route::get('/users/all','Admin\UsersController@users')->name('users.all');
        Route::post('/change/status/{user}','Admin\UsersController@changestatus')->name('change.status');
        Route::get('/user/verifyemail/{user}','Admin\UsersController@verifyemail')->name('user.verifyemail');
        Route::get('/export/allusers','Admin\UsersController@exportusers')->name('export.allusers');
        Route::get('delete/user/{user}','Admin\UsersController@deleteuser')->name('delete.user');
        Route::get('deleted-users','Admin\UsersController@deleteduser')->name('deleted.user');
        Route::get('activateuser/{user}','Admin\UsersController@activateuser')->name('activate.user');
    });
    Route::middleware(["servicecheck:Administrator"])->group(function () {
        Route::get('/all/adminstators','Admin\UsersController@adminstators')->name('all.administators');
        Route::get('/create/adminstator','Admin\UsersController@addadministrator')->name('add.adminstrator');
        Route::post('/store/adminstator','Admin\UsersController@store')->name('createadminstator');
        Route::get('/delete/adminstator/{user}','Admin\UsersController@delete')->name('deleteadminstator');
    });
    

    Route::get('contactus/message','Admin\UserManageController@contactus')->name('contactus.message');
    Route::get('delete/contact/{contact}','Admin\UserManageController@deletecontact')->name('delete.contact');
    // Payment Plans
    Route::middleware(["servicecheck:Payment"])->group(function () {
        Route::get('/payment-plans','Admin\PaymentController@all')->name('payment.plans');
        // Route::get('/create/plans','Admin\PaymentController@create')->name('create.plan');
        // Route::post('/store/plans','Admin\PaymentController@store')->name('store.plan');
        Route::get('/edit-plans/{plan}','Admin\PaymentController@edit')->name('edit.plan');
        Route::post('/update-plans/{plan}','Admin\PaymentController@update')->name('update.plan');
        //Route::get('/delete-plans/{plan}','Admin\PaymentController@delete')->name('delete.plan');
    });
    // Services
    Route::get('services/all','Admin\ServiceController@all')->name('services.all');
    Route::get('edit/service/{service}','Admin\ServiceController@edit')->name('edit.service');
    Route::put('update/service/{service}','Admin\ServiceController@update')->name('update.service');

    
   
    // Permission 
    Route::middleware(["servicecheck:Permission"])->group(function () {
    Route::get('/permissions','Admin\PermissionController@all')->name('all.permission');
    Route::post('/add-permission','Admin\PermissionController@add')->name('add.permission');
    Route::get('/edit-permission/{permission}','Admin\PermissionController@edit')->name('edit.permission');
    Route::put('/update-permission/{permission}','Admin\PermissionController@update')->name('update.permission');
    Route::get('/delete-permission/{permission}','Admin\PermissionController@delete')->name('delete.permission');
    });
    // Assigning the permission to roles 
    
    Route::middleware(["servicecheck:assignment"])->group(function () {
    Route::get('/assign-permissions','Admin\AssignmentController@all')->name('assignment.list');
    Route::post('/assign-permission','Admin\AssignmentController@add')->name('assign.permission');
    Route::get('/edit-assignment/{role}','Admin\AssignmentController@edit')->name('edit.assignment');
    Route::post('/update-assignment/{role}','Admin\AssignmentController@update')->name('update.assignment');
    Route::get('/delete-assignment/{role}','Admin\AssignmentController@delete')->name('delete.assignment');
    });
    
    
  
});





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('homes');
