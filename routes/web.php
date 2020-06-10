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

// External Pages
Route::get('/', 'PagesController@index')->name('index');
Route::get('/page/login', 'PagesController@showLoginPage')->name('page.login');
Route::get('/page/register', 'PagesController@showRegistrationPage')->name('page.register');
Route::get('/page/about', 'PagesController@showAboutPage')->name('page.about');
Route::get('/page/details', 'PagesController@showDetailsPage')->name('page.details');
Route::get('/pages/dashboard', 'PagesController@showDashboardPage')->name('page.dashboard');



Route::get('/banks', 'PaymentController@banks');

// Payment Routes
Route::get('/payfor/{slug}', 'ProductController@findProductSlug')->name('start.payment');
Route::post('/finditem', 'ProductController@findItem')->name('findit');
Route::post('/findtransaction', 'TransactionController@findTransaction')->name('findtransaction');
Route::get('/convert/{ref}', 'AdminController@convert');


Route::post('/finditem', 'ProductController@findItem')->name('findit');
Route::post('/findtransaction', 'TransactionController@findTransaction')->name('findtransaction');



Route::get('/customer-dashboard', 'CustomerController@index')->name('customerdashboard');

//Products
Route::post('/products/create', 'ProductController@createProduct');
Route::post('/products/update/{id}', 'ProductController@updateProduct');
Route::get('/products/{id}', 'ProductController@details')->name('view.item');
Route::post('/products/invoice/{id}', 'ProductController@doInvoice')->name('create.invoice');
Route::post('/products/schedule', 'ProductFrequencyController@createFrequency');




Route::group(['middleware' => ['auth', 'admin']], function () {
  Route::get('/dashboard', 'AdminController@index')->name('dashboard');
});

// Admin Routes
Route::post('/admin/add-new-item', 'AdminController@addProduct')->name('add.item');
Route::get('/admin/add-new-item', 'AdminController@showAddProductPage')->name('add.item');
Route::get('/admin/edit-item/{itemId}', 'AdminController@showEditProductPage')->name('edit.item');
Route::post('/admin/edit-item/{itemId}', 'AdminController@editProduct')->name('edit.item');

Route::get('/admin/transactionlist', 'AdminController@getTransactionList')->name('transactionlist');

Route::post('/admin/checkstat', 'AdminController@checkStat')->name('checkstat');
Route::post('/admin/validatepayment', 'AdminController@validatePayment')->name('validateuserpayment');


//Customer 
// Route::get('/customer/transactionlist', 'CustomerController@getCustomerTransactionList')->name('customertransactions');


// Ajax Routes
Route::get('/ajax/product/{id}', 'AjaxController@getItemDetails')->name('getitemdetails');


Route::get('/transaction/verifypayment/{id}', 'TransactionController@verifypayment')->name('verifypayment');
Route::get('/transaction/{id}', 'TransactionController@transaction')->name('processpayment');
Route::post('/transaction/validate', 'TransactionController@validateTransfer')->name('validatepayment');

Route::get('/misc/getslug/{slug}', 'ProductController@getSlug');


// Paystack
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/sub', 'PaymentController@sub')->name('sub');
Route::get('/payment/finalize', 'PaymentController@handleGatewayCallback')->name('payment.callback');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/getdetails', 'TransactionController@getDetails')->name('get.details');

Route::get('/test', 'TestController@index');
