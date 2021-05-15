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

  Route::get('/', function () {
    return view('welcome');
})->name("baseUrl");

Auth::routes();

Route::match(['get', 'post'], '/home', 'HomeController@index')->name('home');
Route::get('/home','HomeController@index')->name('home');


Route::get('/update', 'ProfileController@editUser')->name('edit');
Route::post('/userprofile', 'ProfileController@insertUser')->name("userProfile");
Route::post('/ ', 'ProfileController@admin')->name('adminProfile');


Route::post('/commiitteeWiseUpload', 'AdminController@commiitteeWiseUpload')->name("committeeWiseUpload");

// Route::get('/admin-committee-input', 'AdminController@adminCommitteeInput')->name('admin-committee-input');

// Route::post('/insert-committee','AdminController@adminCommitteeInput')->name('insert-committee');

// Route::post('/insert-club','AdminController@insertClub')->name('insert-club');

Route::get('/get-clubs-by-comm-event/{eventId}/{committeeId}','AdminController@getClubByCommNEvent')->name('getClubByCommNEvent');

Route::get('/get-clubs-by-comm-user-event/{eventId}/{committeeId}','AdminController@getClubByCommUserEvent')->name('getClubByCommUserEvent');

Route::get('/get-committee-by-user-event/{eventId}','AdminController@getCommitteeByUserEvent')->name('getCommitteeByUserEvent');


Route::get('/admin/select-event','AdminController@eventSelection')->name('eventSelection');

Route::get('/admin/event-committee/list/{event}','AdminController@clubCommitteeSelection')->name('club-n-committee-list');
Route::get('/admin/notice-upload','AdminController@noticeUpload')->name('admin-notice-upload');

Route::get('/admin/committee/list','AdminController@committeeList')->name('admin-committee-list');
Route::get('/admin/club/list','AdminController@clubList')->name('admin-club-list');



Route::post('/admin/committee/store','AdminController@storeCommittee')->name('committeeCRUD');
Route::post('/admin/club/store','AdminController@storeClub')->name('clubCRUD');



Route::get('/committee-edit/{edit_id}', 'AdminController@editCommittee')->name('committee-edit');
Route::get('/club-edit/{edit_id}', 'AdminController@editClub')->name('club-edit');


Route::post('/admin/committee/update','AdminController@updateCommittee')->name('committee-update');
Route::post('/admin/club/update','AdminController@updateClub')->name('club-update');


Route::get('/committee-delete/{delete_id}', 'AdminController@deleteCommittee')->name('committee-delete');
Route::get('/club-delete/{delete_id}', 'AdminController@deleteClub')->name('club-delete');



Route::get('/event-fee/{event_id}/{registration_id}','PaymentController@eventFee')->name('eventFee');
Route::post('/user/payment','PaymentController@userPayment')->name('userPayment');
Route::match(array('GET', 'POST'), '/payment/success','PaymentController@paymentSuccess')->name('paymentSuccess');
Route::match(array('GET', 'POST'), '/payment/fail','PaymentController@paymentFail')->name('paymentFail');
Route::match(array('GET', 'POST'), '/payment/cancel','PaymentController@paymentCancel')->name('paymentCancel');



Route::get('/events/{event}', 'EventController@event')->name('eventName');
Route::post('/delegateRegistration', 'EventController@registration')->name('delegateRegistration');

Route::post('/admin/event-committee/store','ClubncommitteeController@committeeClub')->name('clubNcommittee');



// Route::match(array('GET', 'POST'), '/admin/committee-event-search', 'AdminController@committeeEventsearch')->name('committeeEventSearching');