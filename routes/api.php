<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/login', 'App\Http\Controllers\API\AuthController@login');
Route::get('/loans/all', 'App\Http\Controllers\API\LoanController@all');
Route::get('/loan', 'App\Http\Controllers\API\LoanController@loan');
Route::get('/currencies', 'App\Http\Controllers\API\LoanController@getCurrencies');
Route::post('/apply', 'App\Http\Controllers\API\LoanController@applyLoan');
