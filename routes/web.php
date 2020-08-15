<?php

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
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

/*//Access browser email
Route::get('/email', static function () {
   Mail::to('email@email.com')->send(new WelcomeMail());

   return new WelcomeMail();
});*/

Route::get('/about', 'HelloController@about');
Route::get('/service', 'ServiceController@index');
Route::post('/service', 'ServiceController@create');
/*Route::view('/about', 'about');
Route::view('/services','services');*/

Route::get('/customers', 'CustomerController@index')->name('customers');
Route::get('/customers/create', 'CustomerController@create');
Route::post('/customers', 'CustomerController@store');
//should be the same name as the parameter in the controller
Route::get('/customers/{customer}', 'CustomerController@show');
Route::get('/customers/{customer}/edit', 'CustomerController@edit');

Route::patch('/customers/{customer}', 'CustomerController@update');

Route::delete('/customers/{customer}', 'CustomerController@destroy')->name('customers.destroy');

Route::get('/basictable', 'CustomerController@anyData')->name('any.data');
