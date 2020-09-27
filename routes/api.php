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


Route::get('open', 'App\Http\Controllers\API\FinanceController@open');
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'App\Http\Controllers\API\AuthController@login');
    Route::post('register', 'App\Http\Controllers\API\AuthController@register');
    Route::post('logout', 'App\Http\Controllers\API\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\API\AuthController@refresh');
    Route::get('user-profile', 'App\Http\Controllers\API\AuthController@userProfile');
    Route::get('closed', 'App\Http\Controllers\API\FinanceController@closed');
});
