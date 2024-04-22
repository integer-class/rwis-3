<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\dataDigitalization\ResidentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// auth route
Route::group([], function () {
    Route::get('/login', [AuthController::class, 'index']);
    Route::post('/auth', [AuthController::class, 'authenticate']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

// data digitalization resident route
Route::group(['prefix' => 'resident'], function () {
    Route::get('/', [ResidentController::class, 'index']);
    Route::get('/create', [ResidentController::class, 'create']);
    Route::post('/store', [ResidentController::class, 'store']);
    Route::get('/edit/{id}', [ResidentController::class, 'edit']);
    Route::post('/update/{id}', [ResidentController::class, 'update']);
    Route::get('/delete/{id}', [ResidentController::class, 'delete']);
});