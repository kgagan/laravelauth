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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/form-submit', 'Api\ApiController@form_submit');
Route::get('/display-form-data', 'Api\ApiController@display');
Route::get('/display-particular-data/{id}', 'Api\ApiController@display_data');

Route::put('/edit-form/{id}', 'Api\ApiController@edit_form');
Route::get('/delete-data/{id}', 'Api\ApiController@delete_data');
Route::post('/search-record', 'Api\ApiController@search');