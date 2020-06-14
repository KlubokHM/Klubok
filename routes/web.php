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
Auth::routes(['verify' => true]);

Route::group([
    'middleware' => 'auth',
    'namespace' => 'Klubok\Admin\Globals'
],function (){
    Route::group(['middleware' => 'is_admin'], function (){
        Route::get('/adminpanel', 'AdminpanelController@index')->name('admin.panel.view');
        Route::get('/all_orders','OrderController@index')->name('admin.index.view.orders');
        Route::get('/order/details/{id}','OrderController@details')->name('order.details');
        Route::get('/orders/active','OrderController@active')->name('admin.index.view.orders.active');
        Route::get('/orders/pay','OrderController@pay')->name('admin.index.view.orders.pay');
        Route::get('/orders/finished','OrderController@finished')->name('admin.index.view.orders.finished');
        Route::get('/orders/canceled','OrderController@canceled')->name('admin.index.view.orders.canceled');
    });
});
//admin.index.view.orders.active
Route::get('send', 'MailController@send')->name('send');


Route::namespace('Klubok\Customer')->group(function(){
    Route::get('/','LandingController@index')->name('customer.index.view');
    Route::get('/product/{id}','LandingController@product')->name('customer.index.view.product');
    Route::get('institutions/category/products','ProductController@index')->name('customer.index.view.products');
    Route::get('/institutions/{id}','ProductController@institution')->name('customer.index.view.institutions');
    Route::get('/institutions/category/{id}','ProductController@category')->name('customer.index.view.category');
    Route::get('/basket','BasketController@index')->name('customer.index.view.basket');
    Route::post('/basket/add/{id}', 'BasketController@add')->name('customer.index.view.basket.add');
    Route::post('/basket/remove/{id}', 'BasketController@remove')->name('customer.index.view.basket.remove');
            Route::group(['middleware'=>'verified',], function () {
            Route::get('/basket/form', 'OrederController@index')->name('customer.index.view.order.form');
            Route::post('/order', 'OrederController@order')->name('customer.index.view.order');
            Route::get('/home', 'HomeController@index')->name('customer.index.view.home');
            $methods = ['edit','store','update'];
            Route::resource('user','userController')->only($methods)->names('user');
            });


});


Route::namespace('Klubok\Admin\Moderator')->group(function(){
    Route::get('/test','OrderController@index');
});

/*
 * Route::get('/', function () {
    return view('welcome');
});
 */

