<?php

use App\RequestItem;
use App\Suppliers_Company;
use Illuminate\Support\Facades\Route;
use App\User;
use App\Order;
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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware'=>'auth'] ,function (){
    Route::get('companies/suppliers','SupplierCompanyController@index')->name('companies.suppliers');
    Route::post('SupplierCompany/store','SupplierCompanyController@store')->name('SupplierCompany.store');
    Route::get('/SupplierCompany/{Suppliers_Company}/destroy','SupplierCompanyController@destroy')->name('SupplierCompany.delete');

    Route::get('/dashboard/company', 'DashboardController@company')->name('dashboard.company');
    Route::get('/dashboard/suppliers', 'DashboardController@supplier')->name('dashboard.suppliers');


    Route::get('/home', 'HomeController@index')->name('home');


    Route::post('/companies','CompaniesController@store')->name('companies.store');
    Route::get('/companies','CompaniesController@create')->name('companies.create');

Route::resource('/categories','CategoriesController');

Route::resource('/items','ItemsController');
Route::get('/manager/AllItem','ItemsController@AllItem')->name('manager.AllItem');
Route::get('/GetAll','ItemsController@GetAll')->name('GetAll');
Route::post('/search','ItemsController@search')->name('search');
Route::get('/items','ItemsController@index')->name('items.index');
Route::get('/manager/delete','ItemsController@destroymanager')->name('manager.delete');

Route::get('/users','UsersController@index')->name('users.index')->middleware('checkCompany');;
Route::get('/users/create','UsersController@create')->name('users.create');
Route::get('/manager/users','UsersController@AllUser')->name('users.AllUser');
Route::get('/users/{user}/makeAdmin','UsersController@makeAdmin')->name('users.makeAdmin');
Route::get('/users/{user}/makeEmployed','UsersController@makeEmployed')->name('users.makeEmployed');
Route::get('/users/AdminCon','UsersController@AdminCon')->name('users.AdminCon');
Route::get('/users/{user}/destroy','UsersController@destroy')->name('users.delete');
Route::post('/users/store','UsersController@store')->name('users.store');

    Route::get('/suppliers/index', 'SuppliersController@index')->name('suppliers.index');
    Route::get('/suppliers/{supplier}/profile', 'SuppliersController@show')->name('suppliers.profile');
Route::post('/suppliers/store', 'SuppliersController@store')->name('suppliers.store');
Route::get('/suppliers/create', 'SuppliersController@create')->name('suppliers.create');

Route::post('/orders', 'OrdersController@store')->name('order.store');
Route::get('/orders', 'OrdersController@index')->name('order.index');
Route::get('/orders/show', 'OrdersController@show')->name('order.show');


Route::post('/Invoice', 'InvoiceController@store')->name('invoice.store');
Route::get('/Invoice', 'InvoiceController@index')->name('invoice.index');
Route::get('/Invoice/show', 'InvoiceController@show')->name('invoice.show');
Route::get('/Invoice/completed', 'InvoiceController@completed')->name('invoice.completed');
Route::get('/Invoice/{lnvoice}/Payment','InvoiceController@payment')->name('invoice.payment');


Route::post('/request','RequestItemController@store')->name('RequestItem.store');
Route::get('/request','RequestItemController@index')->name('RequestItem.index');
Route::get('/request/show','RequestItemController@show')->name('RequestItem.show');
Route::get('/Request/{RequestItem}/makeOrder','RequestItemController@MakeOrder')->name('RequestItem.makeOrder');
Route::get('/Request/{order}/Delivered','OrdersController@MakeDelivered')->name('orders.delivered');



});
