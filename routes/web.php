<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\dataDigitalization\AssetController;
use App\Http\Controllers\dataDigitalization\HouseholdController;
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

// data digitalization household route
Route::group(['prefix' => 'household'], function () {
    Route::get('/', [HouseholdController::class, 'index']);
    Route::get('/archived', [HouseholdController::class, 'archived']);
    Route::get('/create', [HouseholdController::class, 'create']);
    Route::post('/', [HouseholdController::class, 'store']);
    Route::get('/show/{id}', [HouseholdController::class, 'show'])->name('household.show');
    Route::get('/edit/{id}', [HouseholdController::class, 'edit'])->name('household.edit');
    Route::put('/{id}', [HouseholdController::class, 'update']);
});

// data digitalization asset route
Route::group(['prefix' => 'asset'], function () {
    Route::get('/', [AssetController::class, 'index']);
    Route::get('/archived', [AssetController::class, 'archived']);
    Route::get('/create', [AssetController::class, 'create']);
    Route::post('/', [AssetController::class, 'store']);
    Route::get('/show/{id}', [AssetController::class, 'show'])->name('asset.show');
    Route::get('/edit/{id}', [AssetController::class, 'edit'])->name('asset.edit');
    Route::put('/{id}', [AssetController::class, 'update']);
});