<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\broadcast\BroadcastScheduledController;
use App\Http\Controllers\broadcast\BroadcastTemplateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\dataDigitalization\AssetController;
use App\Http\Controllers\dataDigitalization\bookKeeping\AccountController;
use App\Http\Controllers\dataDigitalization\bookKeeping\CashMutationController;
use App\Http\Controllers\dataDigitalization\HouseholdController;
use App\Http\Controllers\dataDigitalization\ResidentController;
use App\Http\Controllers\information\FacilityController;
use App\Http\Controllers\information\UmkmController;
use App\Http\Controllers\issueTracker\ApprovalController;
use App\Http\Controllers\issueTracker\ReportController;
use App\Http\Controllers\signature\DocumentFormatController;
use App\Http\Controllers\signature\LogController;
use App\Http\Controllers\social\CalculateController;
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
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth.guard');

// data digitalization route
Route::group(['prefix' => 'data'], function () {
    // home
    Route::get('/', function () {
        return view('data-digitalization.index');
    })->middleware('auth.guard');;
    // resident route
    Route::group(['prefix' => 'resident'], function () {
        Route::get('/', [ResidentController::class, 'index'])->middleware('auth.guard');
        Route::get('/archived', [ResidentController::class, 'archived'])->middleware('auth.guard');
        Route::get('/create', [ResidentController::class, 'create'])->middleware('auth.guard');
        Route::post('/', [ResidentController::class, 'store'])->middleware('auth.guard');
        Route::get('/show/{id}', [ResidentController::class, 'show'])->name('resident.show')->middleware('auth.guard');
        Route::get('/edit/{id}', [ResidentController::class, 'edit'])->name('resident.edit')->middleware('auth.guard');
        Route::put('/{id}', [ResidentController::class, 'update'])->middleware('auth.guard');
    });

    // household route
    Route::group(['prefix' => 'household'], function () {
        Route::get('/', [HouseholdController::class, 'index'])->middleware('auth.guard');
        Route::get('/archived', [HouseholdController::class, 'archived'])->middleware('auth.guard');
        Route::get('/create', [HouseholdController::class, 'create'])->middleware('auth.guard');
        Route::post('/', [HouseholdController::class, 'store'])->middleware('auth.guard');
        Route::get('/show/{id}', [HouseholdController::class, 'show'])->name('household.show')->middleware('auth.guard');
        Route::get('/edit/{id}', [HouseholdController::class, 'edit'])->name('household.edit')->middleware('auth.guard');
        Route::put('/{id}', [HouseholdController::class, 'update'])->middleware('auth.guard');
    });

    // asset route
    Route::group(['prefix' => 'asset'], function () {
        Route::get('/', [AssetController::class, 'index'])->middleware('auth.guard');
        Route::get('/archived', [AssetController::class, 'archived'])->middleware('auth.guard');
        Route::get('/create', [AssetController::class, 'create'])->middleware('auth.guard');
        Route::post('/', [AssetController::class, 'store'])->middleware('auth.guard');
        Route::get('/show/{id}', [AssetController::class, 'show'])->name('asset.show')->middleware('auth.guard');
        Route::get('/edit/{id}', [AssetController::class, 'edit'])->name('asset.edit')->middleware('auth.guard');
        Route::put('/{id}', [AssetController::class, 'update'])->middleware('auth.guard');
    });

    // book keeping route
    Route::group(['prefix' => 'bookkeeping'], function () {
        Route::get('/', function () {
            return view('data-digitalization.book-keeping.index');
        })->middleware('auth.guard');
        Route::group(['prefix' => 'account'], function () {
            Route::get('/', [AccountController::class, 'index'])->middleware('auth.guard');
            Route::get('/archived', [AccountController::class, 'archived'])->middleware('auth.guard');
            Route::get('/create', [AccountController::class, 'create'])->middleware('auth.guard');
            Route::post('/', [AccountController::class, 'store'])->middleware('auth.guard');
            Route::get('/show/{id}', [AccountController::class, 'show'])->name('bookkeeping.account.show')->middleware('auth.guard');
            Route::get('/edit/{id}', [AccountController::class, 'edit'])->name('bookkeeping.account.edit')->middleware('auth.guard');
            Route::put('/{id}', [AccountController::class, 'update'])->middleware('auth.guard');
        });
        Route::group(['prefix' => 'cash'], function () {
            Route::get('/', [CashMutationController::class, 'index'])->middleware('auth.guard');
            Route::get('/archived', [CashMutationController::class, 'archived'])->middleware('auth.guard');
            Route::get('/create', [CashMutationController::class, 'create'])->middleware('auth.guard');
            Route::post('/', [CashMutationController::class, 'store'])->middleware('auth.guard');
            Route::get('/show/{id}', [CashMutationController::class, 'show'])->name('bookkeeping.cashmutation.show')->middleware('auth.guard');
        });
    });
});

// information centre route
Route::group(['prefix' => 'information'], function () {
    // home
    Route::get('/', function () {
        return view('information.index');
    })->middleware('auth.guard');

    // facility route
    Route::group(['prefix' => 'facility'], function () {
        Route::get('/', [FacilityController::class, 'index']);
        Route::get('/archived', [FacilityController::class, 'archived']);
        Route::get('/create', [FacilityController::class, 'create']);
        Route::post('/', [FacilityController::class, 'store']);
        Route::get('/show/{id}', [FacilityController::class, 'show'])->name('infromation.facility.show');
        Route::get('/edit/{id}', [FacilityController::class, 'edit'])->name('infromation.facility.edit');
        Route::put('/{id}', [FacilityController::class, 'update']);
        Route::get('facility/{id}/edit', [FacilityController::class, 'edit'])->name('facility.edit');
        Route::get('facility/{id}', [FacilityController::class, 'show'])->name('facility.show');

    });

    // umkm route
    Route::group(['prefix' => 'umkm'], function () {
        Route::get('/', [UmkmController::class, 'index']);
        Route::get('/archived', [UmkmController::class, 'archived']);
        Route::get('/create', [UmkmController::class, 'create']);
        Route::post('/', [UmkmController::class, 'store']);
        Route::get('/show/{id}', [UmkmController::class, 'show'])->name('infromation.umkm.show');
        Route::get('/edit/{id}', [UmkmController::class, 'edit'])->name('infromation.umkm.edit');
        Route::put('/{id}', [UmkmController::class, 'update']);
        Route::get('/archived', [UmkmController::class, 'archived'])->name('umkm.archived');
        Route::get('umkm/{id}/edit', [UmkmController::class, 'edit'])->name('umkm.edit');
        Route::get('umkm/{id}', [UmkmController::class, 'show'])->name('umkm.show');
    });
});

// issue route
Route::group(['prefix' => 'issue'], function () {
    // home
    Route::get('/', function () {
        return view('issue.index');
    })->middleware('auth.guard');
    // report route
    Route::group(['prefix' => 'report'], function () {
        Route::get('/', [ReportController::class, 'index'])->middleware('auth.guard');
        Route::get('/archived', [ReportController::class, 'archived'])->middleware('auth.guard');
        Route::put('/{id}', [ReportController::class, 'update'])->middleware('auth.guard');
        Route::put('/{id}/archive', [ReportController::class, 'archive'])->middleware('auth.guard');
        Route::put('/{id}/unarchive', [ReportController::class, 'unarchive'])->middleware('auth.guard');
    });
    // approve route
    Route::group(['prefix' => 'approval'], function () {
        // home
        Route::get('/', [ApprovalController::class, 'index'])->middleware('auth.guard');
        Route::get('/show/{id}', [ApprovalController::class, 'show'])->name('approval.show')->middleware('auth.guard');
    });
});

// broadcast route
Route::group(['prefix' => 'broadcast'], function () {
    // home
    Route::get('/', function () {
        return view('broadcast.index');
    })->middleware('auth.guard');

    // template route
    Route::group(['prefix' => 'template'], function () {
        Route::get('/', [BroadcastTemplateController::class, 'index'])->middleware('auth.guard');
        Route::get('/archived', [BroadcastTemplateController::class, 'archived'])->middleware('auth.guard');
        Route::get('/create', [BroadcastTemplateController::class, 'create'])->middleware('auth.guard');
        Route::post('/', [BroadcastTemplateController::class, 'store'])->middleware('auth.guard');
        Route::get('/show/{id}', [BroadcastTemplateController::class, 'show'])->name('template.show')->middleware('auth.guard');
        Route::get('/edit/{id}', [BroadcastTemplateController::class, 'edit'])->name('template.edit')->middleware('auth.guard');
        Route::put('/{id}', [BroadcastTemplateController::class, 'update'])->middleware('auth.guard');
    });

    // message route
    Route::group(['prefix' => 'scheduled'], function () {
        Route::get('/', [BroadcastScheduledController::class, 'index'])->middleware('auth.guard');
        Route::get('/create', [BroadcastScheduledController::class, 'create'])->middleware('auth.guard');
        Route::post('/', [BroadcastScheduledController::class, 'store'])->middleware('auth.guard');
        Route::get('/show/{id}', [BroadcastScheduledController::class, 'show'])->name('broadcast.template.show')->middleware('auth.guard');
        Route::get('/edit/{id}', [BroadcastScheduledController::class, 'edit'])->name('broadcast.template.edit')->middleware('auth.guard');
        Route::put('/{id}', [BroadcastScheduledController::class, 'update'])->middleware('auth.guard');
    });
});

// social aid route
Route::group(['prefix' => 'social'], function () {
    // home
    Route::get('/', function () {
        return view('social.index');
    })->middleware('auth.guard');

    // calculate route
    Route::group(['prefix' => 'calculate'], function () {
        Route::get('/', [CalculateController::class, 'index'])->middleware('auth.guard');
    });
});