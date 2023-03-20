<?php

use App\Http\Controllers\GenerateCampervanController;
use App\Http\Controllers\GenerateShareImageController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\RequestQuoteController;
use App\Http\Controllers\ShareController;
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
//Route::get('', fn() => response()->json('here'));

Route::get('', HomepageController::class);
Route::post('quote', RequestQuoteController::class);
Route::get('share/{share}', [ShareController::class, 'show']);
Route::post('share', [ShareController::class, 'store']);
Route::get('image/{uuid}', GenerateShareImageController::class);
Route::get('campervan', GenerateCampervanController::class);
