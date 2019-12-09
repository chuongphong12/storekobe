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

//Pages
Route::get('/', 'PageController@index')->name('trang-chu');
Route::get('/search', 'PageController@search')->name('search');
Route::get('/contact', 'PageController@Contact')->name('pages.contact');
Route::post('/contact', 'ContactController@postContact')->name('contact');
Route::post('/newletter', 'ContactController@postNewLetter')->name('newletter');

//Report
Route::get('report', 'OrderChartController@index')->name('report')->middleware('auth');

//About Us
Route::get('/about-us', 'PageController@About')->name('pages.about');
Route::get('/quy-trinh-san-xuat-thit', 'PageController@PageMeat')->name('pages.meat');
Route::get('/quy-trinh-san-xuat-sua', 'PageController@PageMilk')->name('pages.milk');
Route::get('/dieu-khoan-va-chinh-sach', 'PageController@PageTerm')->name('pages.term');
Route::get('/cong-ty', 'PageController@PageCompany')->name('pages.company');
Route::get('/page/{id}', 'PageController@getPage')->name('pages.show');

//Cart
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart/add/{id}', 'CartController@addToCart')->name('cart.add');
Route::get('/cart/add/{id}', 'CartController@addToQCart')->name('cart.Qadd');
Route::get('/cart/remove/{rowId}', 'CartController@removeItem')->name('cart.remove');
Route::get('/cart/update/{id}', 'CartController@updateQty')->name('cart.update');
Route::post('/cart/style/{rowId}', 'CartController@updateStyle')->name('cart.upStyle');
Route::get('/cart/increase/{rowId}', 'CartController@increase')->name('cart.increase');
Route::get('/cart/decrease/{rowId}', 'CartController@decrease')->name('cart.decrease');

//Checkout
Route::get('/checkout', 'CartController@getCheckout')->name('checkout');
Route::get('/districts/{id}', 'CartController@district');
Route::get('/wards', 'CartController@ward');
Route::post('/checkout', 'CartController@postCheckout')->name('Pcheckout');
Route::get('/success', 'CartController@orderSuccess')->name('success');

//Product
Route::get('/high', 'ProductController@High_product')->name('high');
Route::get('/product/{id}', 'ProductController@getProduct')->name('product');
Route::get('/medium', 'ProductController@Medium_product')->name('medium');
Route::get('/common', 'ProductController@Low_product')->name('common');
Route::get('/milk', 'ProductController@Milk_product')->name('milk');
Route::get('filter/{id}', 'ProductController@Filter_product')->name('filter');
Route::get('product', 'ProductController@showProduct')->name('shop');

//Rating
Route::post('/rating', 'ProductController@ratingProduct')->name('rating');

//Auth
Auth::routes();

//Facebook Login
Route::get('facebook/redirect', 'SocialAuthFacebookController@redirect')->name('fbredirect');
Route::get('facebook/callback', 'SocialAuthFacebookController@callback')->name('fbcallback');

//Google Login
Route::get('google/redirect', 'SocialAuthGoogleController@redirect')->name('ggredirect');
Route::get('google/callback', 'SocialAuthGoogleController@callback')->name('ggcallback');

//Customer
Route::get('logout', 'PageController@getLogout')->name('logout');
Route::get('login', 'CustomerController@getLogin')->name('login');
Route::post('login', 'CustomerController@postLogin')->name('Plogin');
Route::get('register', 'CustomerController@getRegister')->name('register');
Route::post('register', 'CustomerController@postRegister')->name('Pregister');
Route::get('detail/{id}', 'CustomerController@detailCustomer')->name('cus.detail')->middleware('auth');
Route::get('/order/detail/{id}', 'CustomerController@orderDetail')->name('order.detail')->middleware('auth');
Route::post('edit/{id}', 'CustomerController@editCustomer')->name('cus.edit')->middleware('auth');
Route::post('address/{id}', 'CustomerController@editAddress')->name('cus.address')->middleware('auth');
Route::post('change-password/{id}', 'CustomerController@passwordChange')->name('cus.password')->middleware('auth');

//Address
Route::get('province', 'CustomerController@province');

//Ajax
Route::get('/ajaxData', 'ProductController@ajaxData')->name('product-ajax');
Route::get('/ajaxOrder/{id}', 'ProductController@ajaxOrder')->name('order-ajax');

//Admin
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
