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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware(['auth'])->group(function(){

    Route::resource('customers', 'CustomerController');
    Route::resource('balances', 'BalanceController');
    Route::resource('seams', 'SeamController');

    Route::get('/sales', 'SaleController@index')->name('sales');
    Route::put('/{seam}/seam_mark_as_paid', 'SeamController@markPaid')->name('seam_mark_as_paid');


  });
  Route::get('/profile', 'UserController@index')->name('profile')->middleware('auth');
  Route::post('/update', 'UserController@update')->name('user.update')->middleware('auth');

