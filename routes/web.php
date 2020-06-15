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
        Route::group(['prefix'=>'order'],function (){
            Route::get('/all_orders','OrderController@index')->name('admin.index.view.orders');
            Route::get('/details/{id}','OrderController@details')->name('order.details');
            Route::get('/active','OrderController@active')->name('admin.index.view.orders.active');
            Route::get('/pay','OrderController@pay')->name('admin.index.view.orders.pay');
            Route::get('/finished','OrderController@finished')->name('admin.index.view.orders.finished');
            Route::get('/canceled','OrderController@canceled')->name('admin.index.view.orders.canceled');
        });
        Route::group(['prefix'=>'order'],function (){
            Route::get('/all','ProductsController@index')->name('admin.index.view.products.all');
            Route::get('/publish','ProductsController@is_publish')->name('admin.index.view.products.publish-products');
            Route::get('/not_publish','ProductsController@is_not_publish')->name('admin.index.view.products.not-publish-products');
            Route::get('/publish/{id}/edit','ProductsController@edit')->name('admin.index.view.products.publish-products.edit');
            Route::post('/publish/update/{id}','ProductsController@update')->name('admin.index.view.products.publish-products.update');
        });
        Route::group(['prefix' => 'institution'],function (){
            Route::get('/','IstitutionController@index')->name('admin.index.view.institution');
        });

        Route::group(['prefix'=>'order'],function (){
            Route::get('/','StatementController@index')->name('admin.statements');
            Route::get('/disable','StatementController@disable_statments')->name('admin.statements.disable');
            Route::get('/active/{id}','StatementController@activation_institution')->name('admin.statements.activation_institution');
            Route::get('/remove/{id}','StatementController@remove_statment')->name('admin.statements.remove');
        });
    });
});



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
            Route::get('statement/institution', 'StatementController@institution_statement')->name('customer.institution.statement');
            Route::post('statement/institution/create', 'StatementController@create')->name('customer.institution.statement.create');
            Route::get('statement/operator', 'StatementController@operator_statement')->name('customer.operator.statement');
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

