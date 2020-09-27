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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/pay_loan/{loan_id}', 'App\Http\Controllers\FinanceController@pay');
    Route::get('/loans', 'App\Http\Controllers\FinanceController@index');
    Route::get('/loans/create', 'App\Http\Controllers\FinanceController@create');
    Route::post('/loans', 'App\Http\Controllers\FinanceController@store');
});

