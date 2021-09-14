<?php

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
//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');


/*************************** 前台 ****************************************/
//登入
Route::get('/login', 'LoginController@show');
Route::post('/login', [ 'as' => 'login', 'uses' => 'LoginController@login']);
Route::post('/eventlogin', [ 'as' => 'eventlogin', 'uses' => 'LoginController@eventlogin']);
Route::post('/memberlogin', [ 'as' => 'memberlogin', 'uses' => 'LoginController@memberlogin']);
Route::get('/logout', 'LoginController@logout');

//註冊
Route::post('/register', [ 'as' => 'register', 'uses' => 'RegisterController@register']);

//web 頁面
Route::get('/', 'ActivitiesController@index')->name('index');

Route::get('/event', 'EventController@event')->name('eventA');

Route::get('/event/event-info/{id}', 'EventController@eventinfo')->name('evevntinfo');

//客制活動
Route::get('/event/event-info/13/video', 'EventController@video')->name('video');

Route::get('/event/event-info/13/video/redirect', 'EventController@redirect')->name('redirect');

Route::get('/event/event-info/13/video/redirect2', 'EventController@redirect2')->name('redirect2');

Route::get('/event/event-info/13/video/FBstore', 'EventController@FBstore')->name('FBstore');

Route::get('/event/event-info/13/video/FBstore2', 'EventController@FBstore2')->name('FBstore2');

Route::get('/event/event-info/13/video/fb', 'EventController@fb')->name('fb');

//客制活動End

Route::get('/award', 'AwardController@award')->name('awardB');

Route::get('/member-login', 'MemberController@memberlogin');


//測試uplaod file
// Route::post('/file', [ 'as' => 'file', 'uses' => 'RegisterController@file']);
Route::get('/info', function(){
	return view('info');
});

Route::get('/qrcode-event', 'LoginController@qrcode')->name('qrcode');

//登入驗證後
Route::group(['middleware' => ['auth:web']], function () {

    Route::get('/member', 'MemberController@member')->name('member');

    Route::post('/editinfo', [ 'as' => 'editinfo', 'uses' => 'MemberController@editinfo']);

    //member
    Route::post('/changePass', 'RegisterController@changePass')->name('changePass');

});


/*************************** End ****************************************/



/*************************** 後台 ****************************************/

Route::get('/backstage/login', [ 'as' => 'back-show', 'uses' => 'back\LoginController@show']);
Route::post('/back-login', [ 'as' => 'testlogin', 'uses' => 'back\LoginController@login']);
Route::get('/back-logout', 'back\LoginController@logout');


//登入驗證後
Route::group(['middleware' => ['auth:admin']], function () {

	Route::get('/backstage/dashboard', 'back\DashboardController@dashboard')->name('dashboard');

	Route::get('/backstage/activity-info/{id}', 'back\DashboardController@activityInfo');

	Route::get('/backstage/type', 'back\TypeController@type');	

	Route::get('/backstage/account-info', 'back\AccountController@accountInfo');

	Route::get('/backstage/event', 'back\EventController@event')->name('test');	

	Route::get('/backstage/event-info/{id}', 'back\EventController@eventinfo');

	Route::get('/backstage/event-add', 'back\EventController@eventadd');


	Route::get('/backstage/member', 'back\MemberController@member');

	Route::get('/backstage/member-info/{id}', 'back\MemberController@memeberInfo');


	Route::post('/addEvent', [ 'as' => 'addEvent', 'uses' => 'back\EventController@addEvent']);
});


/*************************** End ****************************************/
//Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::group(['prefix' => 'admin'], function () {
//   Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
//   Route::post('/login', 'AdminAuth\LoginController@login')->name('testlogin');
//   Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

//   Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
//   Route::post('/register', 'AdminAuth\RegisterController@register');

//   Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
//   Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
//   Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
//   Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
// });
