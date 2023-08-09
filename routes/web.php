<?php

use Illuminate\Support\Facades\Route;
use App\Jobs\OrderJob;

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


    OrderJob::dispatch();

    return response("Order Dispatched");
   // return view('welcome');
});

Route::get('orders','OrdersController@index');
