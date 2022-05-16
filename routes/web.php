<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripsController;
use App\Http\Controllers\CategoriesController;

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


// Trips Management
Route::group(['prefix' => 'admin', 'middleware' => 'web'], function () {
    Route::resource('trips', TripsController::class);
    Route::resource('categories', CategoriesController::class);
});


// Trips Listing and showcase
Route::get('/', function () {
    return view('welcome');
});
Route::get('trips', 'LstingController@trips');
Route::get('trip/{slug}', 'LstingController@trip');
