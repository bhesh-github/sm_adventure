<?php

use App\Http\Controllers\Api\V1\IndexController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Index
Route::get('/category', [IndexController::class,'category']);
Route::get('/menus', [IndexController::class,'menu']);
Route::get('/banner', [IndexController::class,'banner']);
Route::get('/top-inbound-tour', [IndexController::class,'inboundTour']);
Route::get('/top-outbound-tour', [IndexController::class,'outboundTour']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
