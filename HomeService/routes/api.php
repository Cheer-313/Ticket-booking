<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
Route::match(['get', 'post'], '/home', [Controllers\HomeController::class, 'index']);
Route::match(['get', 'post'], '/search-box', [Controllers\Controller::class, 'SearchBar']);
Route::match(['get', 'post'], '/list/{search?}', [Controllers\ListController::class, 'list']);
Route::match(['get', 'post'], '/detail/event', [Controllers\DetailController::class, 'event']);
Route::match(['get', 'post'], '/detail/artist', [Controllers\DetailController::class, 'artist']);
