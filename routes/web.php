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
    Route::get('/archived', [ResidentController::class, 'archived']);
    Route::get('/create', [ResidentController::class, 'create']);
    Route::post('/', [ResidentController::class, 'store']);
    Route::get('/show/{id}', [ResidentController::class, 'show'])->name('resident.show');
    Route::get('/edit/{id}', [ResidentController::class, 'edit'])->name('resident.edit');
    Route::put('/{id}', [ResidentController::class, 'update']);
});

