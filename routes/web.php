<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\dataDigitalization\AssetController;
use App\Http\Controllers\dataDigitalization\HouseholdController;
use App\Http\Controllers\dataDigitalization\IndexController;
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

// dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
});

// data digitalization route
Route::group(['prefix' => 'data'], function () {
    // home
    Route::get('/', function () {
        return view('data-digitalization.index');
    });
    // resident route
    Route::group(['prefix' => 'resident'], function () {
        Route::get('/', [ResidentController::class, 'index']);
        Route::get('/archived', [ResidentController::class, 'archived']);
        Route::get('/create', [ResidentController::class, 'create']);
        Route::post('/', [ResidentController::class, 'store']);
        Route::get('/show/{id}', [ResidentController::class, 'show'])->name('resident.show');
        Route::get('/edit/{id}', [ResidentController::class, 'edit'])->name('resident.edit');
        Route::put('/{id}', [ResidentController::class, 'update']);
    });

    // household route
    Route::group(['prefix' => 'household'], function () {
        Route::get('/', [HouseholdController::class, 'index']);
        Route::get('/archived', [HouseholdController::class, 'archived']);
        Route::get('/create', [HouseholdController::class, 'create']);
        Route::post('/', [HouseholdController::class, 'store']);
        Route::get('/show/{id}', [HouseholdController::class, 'show'])->name('household.show');
        Route::get('/edit/{id}', [HouseholdController::class, 'edit'])->name('household.edit');
        Route::put('/{id}', [HouseholdController::class, 'update']);
    });

    // asset route
    Route::group(['prefix' => 'asset'], function () {
        Route::get('/', [AssetController::class, 'index']);
        Route::get('/archived', [AssetController::class, 'archived']);
        Route::get('/create', [AssetController::class, 'create']);
        Route::post('/', [AssetController::class, 'store']);
        Route::get('/show/{id}', [AssetController::class, 'show'])->name('asset.show');
        Route::get('/edit/{id}', [AssetController::class, 'edit'])->name('asset.edit');
        Route::put('/{id}', [AssetController::class, 'update']);
    });

    // book keeping route
    Route::group(['prefix' => 'bookkeeping'], function () {
        Route::get('/', function () {
            return view('data-digitalization.book-keeping.index');
        });
    });
});

// information centre route
Route::group(['prefix' => 'information'], function () {
    // home
    Route::get('/', function () {
        return view('information-centre.index');
    });
});