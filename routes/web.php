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
    return view('users.landing');
});

Route::get('/admin/users','UsersController@index_admin')->name('users');
Route::get('users/getdata','UsersController@getdata')->name('users.getdata');
Route::post('users/postdata','UsersController@postdata')->name('insert_users.postdata');
Route::get('/admin/profile','UsersController@admin_profile')->name('admin.profile');
Route::post('/admin/profile/upload','UsersController@upload_picture')->name('admin.upload');
Route::post('/admin/profile/update','UsersController@updateProfile')->name('admin.update');
Route::post('/checkEmail','UsersController@checkEmail')->name('checkEmail');
Route::post('/changeEmail','UsersController@changeEmail')->name('admin.email');
Route::post('/changePassword','UsersController@changePassword')->name('admin.password');
Route::get('/home/profile','UsersController@user_profile')->name('users.profile');

Route::get('/admin','DashboardController@index')->name('dashboard');

Route::get('/admin/event','EventController@index')->name('event');
Route::get('event/getdata','EventController@getdata')->name('event.getdata');
Route::post('event/postdata','EventController@postdata')->name('insert_event.postdata');
Route::get('event/fetchdata', 'EventController@fetchdata')->name('eventdata.fetchdata');
Route::get('event/removedata', 'EventController@removedata')->name('eventdata.removedata');
Route::get('/home/','EventController@index_user');
Route::resource('event','EventController');

Route::get('/login','LoginController@index');
Route::get('/register','LoginController@registerPage');
Route::post('/','LoginController@checkLogin')->name('success.login');	
Route::get('/login/success','LoginController@successlogin');
Route::get('/login/logout','LoginController@logout')->name('logout');
Route::post('/login/','LoginController@checkEmail')->name('login.checkEmail');
Route::post('/home','LoginController@register')->name('register');

Route::get('/admin/rsvp','rsvpController@index')->name('rsvp'); 
Route::get('rsvp/getdata','rsvpController@getdata')->name('rsvp.getdata');
Route::get('rsvp/attendance','rsvpController@attendance')->name('rsvp.attendance');

Route::get('/admin/card','CardController@index')->name('card');
Route::get('card/getdata','CardController@getdata')->name('card.getdata');

Route::get('/error',function()
{
	return abort(404);
});

