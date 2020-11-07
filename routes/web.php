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
    return view('index');
});
Route::get('/AboutUs', function () {
    return view('about_page');
});
Route::get('/Services', function () {
    return view('service_page');
});
Route::get('/Portfolio', function () {
    return view('protfolio_page');
});
Route::get('/Contact', function () {
    return view('contact_page');
});
Route::get('/AdminLogin', function () {
    return view('admin.admin_login');
});
Route::get('/AdminHome', function () {
    return view('admin.admin_index');
});
Route::get('/MySlider', function () {
    return view('admin.my_slider');
});
Route::resource('mySliderOption','WebSiteSliderController');
Route::get('/get/all/mySlider','WebSiteSliderController@getAllMYSlider')->name('all.mySlider');

Route::resource('myWorkingMenus','WorkMainMenuController');
Route::get('/get/all/myWorkingMenu','WorkMainMenuController@getAllMYSlider')->name('all.myWorkingMenu');

Route::resource('OurServices','OurServicesController');
Route::get('/get/all/myOurServices','OurServicesController@getAllOurServices')->name('all.myOurServices');

Route::resource('OurAbouts','MyAboutUsController');
Route::get('/get/all/myOurAbout','MyAboutUsController@getAllOurAbout')->name('all.myOurAbout');

Route::resource('myAdminUsers','AdminUsersController');
Route::get('/get/all/myAdminUser','AdminUsersController@getAllAdminUsers')->name('all.myAdminUser');

Route::resource('MyContactUsInfos','MyContactUsInfoController');
Route::get('/get/all/myContactUsInfo','MyContactUsInfoController@getAllAdminUsers')->name('all.myMyContactUsInfo');


Route::post('/adminLogIn','AdminUsersController@useLogin');
Route::get('/adminLogout','AdminUsersController@userLogOut');
