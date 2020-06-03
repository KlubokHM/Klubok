<?php

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
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/*
 * Просмотр
 */
Route::namespace('Klubok\Customer')->group(function(){
    Route::get('/','LandingController@index')->name('customer.index.view');
    Route::get('/product/{id}','LandingController@product')->name('customer.index.view.product');
    Route::get('/category/products','ProductController@index')->name('customer.index.view.products');
    Route::get('/category/{id}','ProductController@category')->name('customer.index.view.category');
    Route::get('/basket','BasketController@index')->name('customer.index.view.basket');
    Route::post('/basket/add/{id}', 'BasketController@add')->name('customer.index.view.basket.add');
    Route::post('/basket/remove/{id}', 'BasketController@remove')->name('customer.index.view.basket.remove');
    Route::get('/order/form','OrederController@index')->name('customer.index.view.order.form');

});

/*
 * работа с карзиной
 *
 */
Route::namespace('Klubok\Customer')->group(function(){

});

/*
 * Route::get('/', function () {
    return view('welcome');
});
 */

