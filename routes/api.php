<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Pembayaran_Controller;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('me', [AuthController::class, 'me']);
Route::middleware('auth:sanctum')->group(function(){
    Route::resource('kamars', KamarController::class);
    Route::resource('reservasis', ReservasiController::class);
    Route::resource('pembayarans', Pembayaran_Controller::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});