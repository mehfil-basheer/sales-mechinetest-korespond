<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController as ItemController ;
use App\Http\Controllers\SaleController;

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

// Route::get('items', 'App\Http\Controllers\Api\ItemController@index');

// Route::get('items','ItemController@index')->name('items.index');


Route::resource('items', ItemController::class);

Route::resource('sales', SaleController::class);