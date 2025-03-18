<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommerciauxApiController;
use App\Http\Controllers\ClientApiController;
use App\Http\Controllers\ProspectApiController;
use App\Http\Controllers\RendezVousApiController;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::apiResource('commerciaux', CommerciauxApiController::class);
//Route::apiResource('clients', ClientApiController::class);
Route::apiResource('prospects', ProspectApiController::class);
Route::apiResource('rendezvous', RendezVousApiController::class);

//Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('commerciaux', CommerciauxApiController::class);
//});

//login
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('clients', ClientApiController::class);
});

Route::post("login",[UserController::class,'index']);