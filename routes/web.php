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
Route::get('/products/orderlist', 'ProductsController@orderList')->name('products.orderList')->middleware('auth');
Route::post('/products/fetch', 'ProductsController@fetch')->name('products.fetch');
Route::post('/products/productStore', 'ProductsController@orderStore')->name('products.store');
Route::post('/products/add', 'ProductsController@addProduct')->name('products.addProduct');
Route::get('/products/editorder/{id}', 'ProductsController@editOrder')->name('products.editOrder');

// });

// orders routes
Route::get('/invoice/{id}', 'OrdersController@editOrder')->name('editOrders');
Route::post('/updateOrder', 'OrdersController@update_Order')->name('updateOrders');
Route::post('/deleteOrder', 'OrdersController@order_delete')->name('deleteOrders');
Route::post('/invoice/fetch', 'OrdersController@fetch')->name('order.fetch');
Route::post('/productlist/fetch', 'OrdersController@fetchProducts')->name('products.fetchProducts');


// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/getorder', 'OrdersController@getorder')->name('viewOrders')->middleware('auth:admin');
    Route::get('/', 'admin\auth\LoginController@showLoginForm')->name('admin.login');
    Route::get('/productlist', 'ProductsController@productList')->name('view.productlist');
    Route::post('/productlist/{id}', 'ProductsController@deleteProduct')->name('delete.product');
    Route::post('/invoicelist/{id}', 'ProductsController@deleteInvoice')->name('delete.invoice');
    Route::get('/addproduct', 'ProductsController@viewAddProduct')->name('view.addProduct');
    Route::post('/addproduct', 'ProductsController@insertProduct')->name('insert.product');
    Route::get('/editproduct/{id}', 'ProductsController@viewProduct')->name('view.editProduct');
    Route::post('/editproduct/{id}', 'ProductsController@updateProduct')->name('update.product');
    Route::post('/', 'admin\auth\LoginController@login');
    Route::get('/users', 'UsersController@userlists')->name('admin.userlist');
    Route::post('/adduser', 'UsersController@addUser')->name('admin.addUser');
    Route::post('/delusers/{id}', 'UsersController@delUser')->name('admin.deluser');
    Route::post('/logout', 'admin\auth\LoginController@logout')->name('admin.logout');
    // Invoice routes
    Route::get('/addinvoice', 'InvoicesController@viewAddInvoice')->name('admin.addInvoice');
    Route::post('/addinvoice', 'InvoicesController@orderStore')->name('admin.postAddInvoice');
    Route::post('/addinvoice/fetch', 'InvoicesController@fetch')->name('addInvoice.fetch');
    // Locations routes
    Route::prefix('location')->group(function () {
        Route::get('/', 'locationsController@index')->name('settings.viewLocation');
        Route::get('/newlocation', 'locationsController@viewNewLocation')->name('settings.addNewLocation');
        Route::post('/newlocation', 'locationsController@createLocation')->name('settings.createLocation');
        Route::get('/editLocation/{id}', 'locationsController@openEditLocationPage')->name('editLocation');
        Route::post('/editLocation/{id}', 'locationsController@updateLocation')->name('post.editLocation');
        Route::post('/deletelocation/{id}', 'locationsController@deleteLocation')->name('deleteLocation');
    });
    // company settings routes
    Route::prefix('company')->group(function () {
        Route::get('/', 'CompanyController@index')->name('company.viewSettings');
        Route::post('/', 'CompanyController@saveSettings')->name('company.saveSettings');
    });
    // user role settings routes
    Route::prefix('userrole')->group(function () {
        Route::get('/addUserRole', 'UserRoleController@addNewUserRole')->name('addUserRole');
        // Route::post('/', 'CompanyController@saveSettings')->name('company.saveSettings');

    });
    // departments routes
    Route::prefix('department')->group(function () {
        Route::get('/', 'DepartmentsController@index')->name('department.viewlist');
        Route::post('/newdepartment', 'DepartmentsController@addNewDepartment')->name('department.addNew');
        Route::get('/editdepartment/{id}', 'DepartmentsController@editDepartment')->name('department.edit');
        Route::post('/editdepartment', 'DepartmentsController@updateDepartment')->name('department.update');
        Route::post('/deletedepartment/{id}', 'DepartmentsController@deleteDepartment')->name('department.delete');
    });
    // finance routes
    Route::prefix('finance')->group(function () {
        Route::get('/paymentterms', 'PaymentTermsController@index')->name('PaymentTerms.viewlist');
        Route::post('/newpayment', 'PaymentTermsController@savePaymentTerm')->name('paymentTerm.addNew');
        Route::get('/editpayment/{id}', 'PaymentTermsController@editPayment')->name('payment.edit');
        Route::post('/updatepayment', 'PaymentTermsController@updatePayment')->name('payment.update');
        Route::post('/deletepayment/{id}', 'PaymentTermsController@deletePaymentTerm')->name('deletePaymentTerm.delete');

        Route::prefix('tax')->group(function () {
            Route::get('/', 'TaxController@index')->name('taxes.viewlist');
            Route::post('/newtax', 'TaxController@saveTax')->name('taxes.addNew');
            Route::get('/edittax/{id}', 'TaxController@editTax')->name('taxes.edit');
            Route::post('/updatetax', 'TaxController@updateTax')->name('taxes.update');
            Route::post('/deletetax/{id}', 'TaxController@deleteTax')->name('taxes.delete');
        });
    });
    // general settings routes
    Route::prefix('generalsettings')->group(function () {
        Route::prefix('categories')->group(function () {
            Route::get('/', 'CategoriesController@index')->name('itemCategories.viewlist');
            Route::post('/newcategory', 'CategoriesController@saveCategory')->name('category.addNew');
            Route::get('/editcategory/{id}', 'CategoriesController@editCategory')->name('category.edit');
            Route::post('/updatecategory', 'CategoriesController@updateCategory')->name('category.update');
            Route::post('/deletecategory/{id}', 'CategoriesController@deleteCategory')->name('category.delete');
        });
        Route::prefix('languages')->group(function () {
            Route::get('/', 'LanguagesController@index')->name('language.viewlist');
            Route::post('/newlanguage', 'LanguagesController@saveLanguage')->name('language.addNew');
            Route::get('/editlanguage/{id}', 'LanguagesController@editLanguage')->name('language.edit');
            Route::post('/updatelanguage', 'LanguagesController@updateLanguage')->name('language.update');
            Route::post('/deletelanguage/{id}', 'LanguagesController@deleteLanguage')->name('language.delete');
        });
        Route::prefix('units')->group(function () {
            Route::get('/', 'UnitsController@index')->name('units.viewlist');
            Route::post('/newunit', 'UnitsController@saveUnit')->name('units.addNew');
            Route::get('/editunit/{id}', 'UnitsController@editUnit')->name('units.edit');
            Route::post('/updateunit', 'UnitsController@updateUnit')->name('units.update');
            Route::post('/deleteunit/{id}', 'UnitsController@deleteUnit')->name('units.delete');
        });
        Route::prefix('itemtype')->group(function () {
            Route::get('/', 'ItemTypesController@index')->name('itemType.viewlist');
            Route::post('/newitemtype', 'ItemTypesController@saveItemType')->name('itemType.addNew');
            Route::get('/edititemtype/{id}', 'ItemTypesController@editItemType')->name('itemType.edit');
            Route::post('/updateitemtype', 'ItemTypesController@updateItemType')->name('itemType.update');
            Route::post('/deleteitemtype/{id}', 'ItemTypesController@deleteItemType')->name('itemType.delete');
        });
    });
});
