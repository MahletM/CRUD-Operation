<?php

use App\Http\Controllers\DriverController;
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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', "App\Http\Controllers\DriverController@index");
Route::get('/edit/{id}', "App\Http\Controllers\DriverController@edit");
Route::get('/show/{id}', "App\Http\Controllers\DriverController@show");
Route::get('/create', "App\Http\Controllers\DriverController@create");
Route::get('/delete/{id}', "App\Http\Controllers\DriverController@destroy");
Route::post('/store', "App\Http\Controllers\DriverController@store");
Route::post('/update/{id}', "App\Http\Controllers\DriverController@update");





