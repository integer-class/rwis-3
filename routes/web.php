<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\dataDigitalization\ResidentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// auth route
Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [AuthController::class, 'index']);
    Route::post('/', [AuthController::class, 'authenticate']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

// data digitalization resident route
Route::group(['prefix' => 'data-digitalization'], function () {
    Route::get('/resident', [ResidentController::class, 'index']);
    Route::get('/resident/create', [ResidentController::class, 'create']);
    Route::post('/resident', [ResidentController::class, 'store']);
    Route::get('/resident/{id}', [ResidentController::class, 'show']);
    Route::get('/resident/{id}/edit', [ResidentController::class, 'edit']);
    Route::put('/resident/{id}', [ResidentController::class, 'update']);
    Route::delete('/resident/{id}', [ResidentController::class, 'destroy']);
});