<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userauthcontroller;
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

route:: get('login', [userauthcontroller::class,'login']);
route:: get('register', [userauthcontroller::class,'register']);


Route::post('/create', 'userauthcontroller@create');
Route::post('/check', 'userauthcontroller@check');
Route::get('/profile', 'userauthcontroller@profile');
Route::get('/logout', 'userauthcontroller@logout');