<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

/************************ 前台 ************************************/

//Event
Route::get('allevent', 'Api\EventController@allevent');
Route::get('playing', 'Api\EventController@playing');
Route::get('ending', 'Api\EventController@ending');
Route::post('searchActivities', 'Api\EventController@searchActivities');
Route::post('showAward', 'Api\EventController@showAward');
Route::post('BannerClick', 'Api\EventController@BannerClick');
Route::post('StoreClick', 'Api\EventController@StoreClick');
Route::post('ActivityClick', 'Api\EventController@ActivityClick');
Route::post('ShareClick', 'Api\EventController@ShareClick')->name('ShareClick');

//Event-info
Route::post('selProduct', 'Api\EventController@selProduct');
Route::post('registerSubmit', 'Api\EventController@registerSubmit');
Route::post('getProductImage', 'Api\EventController@getProductImage');

//Award
Route::post('searchAward', 'Api\AwardController@searchAward');


//Register
Route::post('selArea', 'Api\RegisterController@selArea')->name('selArea');
Route::post('Authcode', 'Api\RegisterController@Authcode')->name('Authcode');
Route::post('ResendAuthcode', 'Api\RegisterController@ResendAuthcode')->name('ResendAuthcode');
Route::post('authCheck', 'Api\RegisterController@authCheck')->name('authCheck');

/************************ End ************************************/



/************************ 後台 ************************************/

//Event
Route::post('addProduct', 'back\Api\EventController@addProduct');
Route::post('addStore', 'back\Api\EventController@addStore');
Route::post('getProductName', 'back\Api\EventController@getProductName');
Route::post('getStoreName', 'back\Api\EventController@getStoreName');
Route::post('exceldownload', [ 'as' => 'export', 'uses' => 'back\Api\EventController@export']);


//Event-add
Route::post('addEvent', 'back\Api\EventController@addEvent');

//Event-edit
Route::post('editEvent', 'back\Api\EventController@editEvent');
Route::post('delEvent', 'back\Api\EventController@delEvent');


//Banner
Route::post('getActTime', 'back\Api\TypeController@getActTime');
Route::post('addBanner', 'back\Api\TypeController@addBanner');
Route::post('editBanner', 'back\Api\TypeController@editBanner');
Route::post('delBanner', 'back\Api\TypeController@delBanner');
Route::post('editCSS', 'back\Api\TypeController@editCSS');


//member
Route::get('memberTable', 'back\Api\MemberController@memberTable');
Route::post('memberTableSearch', 'back\Api\MemberController@memberTableSearch');

//account
Route::post('addAccount', 'back\Api\AccountController@addAccount');
Route::post('passSecurity', 'back\Api\AccountController@passSecurity');


//dashboard
Route::post('searchMemberArea', 'back\Api\DashboardController@searchMemberArea');
Route::post('dataSearch', 'back\Api\DashboardController@dataSearch');
Route::post('activeSearch', 'back\Api\DashboardController@activeSearch');

//activity-info
Route::post('registerPie', 'back\Api\DashboardController@registerPie');
Route::post('loginPie', 'back\Api\DashboardController@loginPie');
Route::post('regSearch', 'back\Api\DashboardController@regSearch');

/************************ End ************************************/