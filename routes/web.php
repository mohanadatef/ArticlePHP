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
//--------------------------------------------------------------------
//----------------------------------------home------------------------
//--------------------------------------------------------------------
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//--------------------------------------------------------------------
//-----------------------------------articale-------------------------
//--------------------------------------------------------------------
//add articale
Route::get('/articale/add','ArticaleController@addarticale');
Route::Post('/articale/add','ArticaleController@addarticale');

//show articale
Route::get('/articale/show','ArticaleController@showarticale');

//delete articale
Route::get('/articale/delete/{id}','ArticaleController@deletearticale');

//edit articale
Route::get('/articale/edit/{id}','ArticaleController@editarticale');
Route::Post('/articale/edit/{id}','ArticaleController@editarticale');

//export articale
Route::get('/articale/export','ArticaleController@export');

//import member
Route::get('/articale/import','ArticaleController@import');
Route::Post('/articale/import','ArticaleController@import');
//--------------------------------------------------------------------
//-----------------------------------guest----------------------------
//--------------------------------------------------------------------
//show guest articale
Route::get('/articale/show/guest','GuestController@showarticaleguest');

Route::get('/welcome', function () {
    return view('welcome');
});
//--------------------------------------------------------------------
//-----------------------------------memeber--------------------------
//--------------------------------------------------------------------
//show member
Route::get('/member/show','MemberController@showmember');

//edit member
Route::get('/member/edit/{id}','MemberController@editmember');
Route::Post('/member/edit/{id}','MemberController@editmember');

//delete member
Route::get('/member/delete/{id}','MemberController@deletemember');

//add member
Route::get('/member/add','MemberController@addmember');
Route::Post('/member/add','MemberController@addmember');
Route::get('get-state-list','MemberController@getStateList');
//export member
Route::get('/member/export','MemberController@export');

//import member
Route::get('/member/import','MemberController@import');
Route::Post('/member/import','MemberController@import');

//reset password member
Route::get('/member/reset/{id}','MemberController@resetpasswordmember');
Route::Post('/member/reset/{id}','MemberController@resetpasswordmember');
//--------------------------------------------------------------------
//-----------------------------------test----------------------------
//--------------------------------------------------------------------
//test
Route::get('/test/show','TestController@showtest');
//--------------------------------------------------------------------
//-----------------------------------city-----------------------------
//--------------------------------------------------------------------
//add city
Route::get('/city/add','CityController@addcity');
Route::Post('/city/add','CityController@addcity');

//show city
Route::get('/city/show','CityController@showcity');

//delete city
Route::get('/city/delete/{id}','CityController@deletecity');

//edit city
Route::get('/city/edit/{id}','CityController@editcity');
Route::Post('/city/edit/{id}','CityController@editcity');
//export member
Route::get('/city/export','CityController@export');

//import member
Route::get('/city/import','CityController@import');
Route::Post('/city/import','CityController@import');
//--------------------------------------------------------------------
//-----------------------------------country--------------------------
//--------------------------------------------------------------------
//add country
Route::get('/country/add','CountryController@addcountry');
Route::Post('/country/add','CountryController@addcountry');

//show country
Route::get('/country/show','CountryController@showcountry');

//delete country
Route::get('/country/delete/{id}','CountryController@deletecountry');

//edit country
Route::get('/country/edit/{id}','CountryController@editcountry');
Route::Post('/country/edit/{id}','CountryController@editcountry');
//export member
Route::get('/country/export','CountryController@export');

//import member
Route::get('/country/import','CountryController@import');
Route::Post('/country/import','CountryController@import');
//--------------------------------------------------------------------
//-----------------------------------mail-----------------------------
//--------------------------------------------------------------------
//send mail
Route::get('/sendbasicemail','MailController@basic_email');
Route::get('/sendhtmlemail','MailController@html_email');
Route::get('/sendattachmentemail','MailController@attachment_email');


Route::get('laravel-send-email', 'EmailController@sendEMail');