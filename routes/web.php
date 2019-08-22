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

// Route::get('/', function () {
//     return view('admin.index');
// });

Route::prefix('admin')->middleware('checkAdmin')->group(function(){
    Route::get('/', 'Admin\IndexController@show');

    Route::resource('table/hangsx', 'Admin\HangSxController');
    Route::resource('table/sanpham', 'Admin\SanPhamController');
    Route::resource('table/comment', 'Admin\CommentController');
    Route::resource('table/user', 'Admin\UserController');

});


Auth::routes();
Route::get('/user/setting', 'Client\UserController@setting');
Route::post('user/setting', 'Client\UserController@update');

Route::get('/', 'Client\HomeController@index');
Route::get('/showSanphamByHangsx', 'Client\HomeController@showSanpham');
Route::get('/sanpham/{id}', 'Client\SanphamController@show');

Route::get('/cart', 'Client\CartController@index');
Route::post('/cart/addToCart', 'Client\CartController@addToCart');
Route::post('/cart/updateCart/{id}', 'Client\CartController@update');
Route::post('/cart/deleteProductInCart/{id}', 'Client\CartController@delete');
Route::post('/postProvince', 'LocationController@getDistrict');
Route::post('/postDistrict', 'LocationController@getWard');
Route::post('/postWard', 'LocationController@getVillage');
Route::post('/postPlaceOrder', 'Client\PlaceOrderController@postPlaceOrder');

Route::get('/checkout', 'Client\CheckoutController@index');

// Route::get('/contact', 'Client\ContactController@index');
Route::post('/contact', 'Client\ContactController@sendContact');

//login with google
Route::get('/login/google', 'Auth\LoginSocialiteController@redirectToProvider');
Route::get('/login/google/callback', 'Auth\LoginSocialiteController@handleProviderCallback');