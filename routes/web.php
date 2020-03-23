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



Route::get('/ajax', function () {
    return view('ajax.index');
});

// Route::group(['middleware' => ['auth']], function () {
//     //

    Route::get('/contact/index', 'ContactController@getIndex');

    Route::get('/', 'HomeController@index');
    // Route::get('/search', 'ProductsController@search');
    // Route::get('/view', 'ProductsController@view');

    //jqueryAjax routes are here
    Route::get('/contact/list', 'ContactController@getlist')->name('contactRoute')->middleware('auth');
    Route::get('/contact/data', 'ContactController@getData');
    Route::post('/contact/store', 'ContactController@postStore')->name('store');
    Route::post('/contact/update', 'ContactController@postUpdate')->name('update');
    Route::post('/contact/delete', 'ContactController@PostDelete');

    // Autocomplete routes are here
    Route::get('/autocomplete', 'ContactController@getlist');
    Route::post('/autocomplete/fetch', 'ContactController@fetch')->name('autocomplete.fetch');

    Route::get('/search', 'ContactController@search');

    // pages controller
    Route::get('/login', 'PagesController@login');

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/products', 'PagesController@products')->name('products')->middleware('auth');

    //Products routes are here
    Route::get('/products/index', 'ProductsController@index')->name('products.index');
    Route::post('/products/fetch', 'ProductsController@fetch')->name('products.fetch');
    Route::post('/products/productStore', 'ProductsController@orderStore')->name('products.store');
    Route::post('/products/add', 'ProductsController@addProduct')->name('products.addProduct');

    Route::get('/getorder', 'ProductsController@getorder')->name('viewOrders')->middleware('auth');
// });

// Route::get('/form', function () {
//     return view('products.form');
// });

// orders routes
Route::get('/updateOrder/{id}', 'OrdersController@editOrder')->name('editOrders');
Route::post('/updateOrder', 'OrdersController@update_Order')->name('updateOrders');
Route::post('/deleteOrder', 'OrdersController@order_delete')->name('deleteOrders');

