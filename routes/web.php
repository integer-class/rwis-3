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
Route::get('/dashboard', [DashboardController::class, 'index']);

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
        Route::group(['prefix' => 'account'], function () {
            Route::get('/', [AccountController::class, 'index']);
            Route::get('/archived', [AccountController::class, 'archived']);
            Route::get('/create', [AccountController::class, 'create']);
            Route::post('/', [AccountController::class, 'store']);
            Route::get('/show/{id}', [AccountController::class, 'show'])->name('bookkeeping.account.show');
            Route::get('/edit/{id}', [AccountController::class, 'edit'])->name('bookkeeping.account.edit');
            Route::put('/{id}', [AccountController::class, 'update']);
        });
        Route::group(['prefix' => 'cash'], function () {
            Route::get('/', [CashMutationController::class, 'index']);
            Route::get('/archived', [CashMutationController::class, 'archived']);
            Route::get('/create', [CashMutationController::class, 'create']);
            Route::post('/', [CashMutationController::class, 'store']);
            Route::get('/show/{id}', [CashMutationController::class, 'show'])->name('bookkeeping.cashmutation.show');
        });
    });
});

// information centre route
Route::group(['prefix' => 'information'], function () {
    // home
    Route::get('/', function () {
        return view('information.index');
    });

    // facility route
    Route::group(['prefix' => 'facility'], function () {
        Route::get('/', [FacilityController::class, 'index']);
        Route::get('/archived', [FacilityController::class, 'archived']);
        Route::get('/create', [FacilityController::class, 'create']);
        Route::post('/', [FacilityController::class, 'store']);
        Route::get('/show/{id}', [FacilityController::class, 'show'])->name('facility.show');
        Route::get('/edit/{id}', [FacilityController::class, 'edit'])->name('facility.edit');
        Route::put('/{id}', [FacilityController::class, 'update']);
    });

    // umkm route
    Route::group(['prefix' => 'umkm'], function () {
        Route::get('/', [UmkmController::class, 'index']);
        Route::get('/archived', [UmkmController::class, 'archived']);
        Route::get('/create', [UmkmController::class, 'create']);
        Route::post('/', [UmkmController::class, 'store']);
        Route::get('/show/{id}', [UmkmController::class, 'show'])->name('umkm.show');
        Route::get('/edit/{id}', [UmkmController::class, 'edit'])->name('umkm.edit');
        Route::put('/{id}', [UmkmController::class, 'update']);
        Route::get('/archived', [UmkmController::class, 'archived'])->name('umkm.archived');
    });
});

// issue route
Route::group(['prefix' => 'issue'], function () {
    // home
    Route::get('/', function () {
        return view('issue.index');
    });
    // report route
    Route::group(['prefix' => 'report'], function () {
        Route::get('/', [ReportController::class, 'index']);
        Route::get('/archived', [ReportController::class, 'archived']);
        Route::put('/{id}', [ReportController::class, 'update']);
        Route::put('/{id}/archive', [ReportController::class, 'archive']);
        Route::put('/{id}/unarchive', [ReportController::class, 'unarchive']);
    });
    // approve route
    Route::group(['prefix' => 'approval'], function () {
        // home
        Route::get('/', [ApprovalController::class, 'index']);
        Route::get('/show/{id}', [ApprovalController::class, 'show'])->name('approval.show');
    });
});

// broadcast route
Route::group(['prefix' => 'broadcast'], function () {
    // home
    Route::get('/', function () {
        return view('broadcast.index');
    });

    // template route
    Route::group(['prefix' => 'template'], function () {
        Route::get('/', [BroadcastTemplateController::class, 'index']);
        Route::get('/archived', [BroadcastTemplateController::class, 'archived']);
        Route::get('/create', [BroadcastTemplateController::class, 'create']);
        Route::post('/', [BroadcastTemplateController::class, 'store']);
        Route::get('/show/{id}', [BroadcastTemplateController::class, 'show'])->name('template.show');
        Route::get('/edit/{id}', [BroadcastTemplateController::class, 'edit'])->name('template.edit');
        Route::put('/{id}', [BroadcastTemplateController::class, 'update']);
    });

    // message route
    Route::group(['prefix' => 'scheduled'], function () {
        Route::get('/', [BroadcastScheduledController::class, 'index']);
        Route::get('/create', [BroadcastScheduledController::class, 'create']);
        Route::post('/', [BroadcastScheduledController::class, 'store']);
        Route::get('/show/{id}', [BroadcastScheduledController::class, 'show'])->name('broadcast.template.show');
        Route::get('/edit/{id}', [BroadcastScheduledController::class, 'edit'])->name('broadcast.template.edit');
        Route::put('/{id}', [BroadcastScheduledController::class, 'update']);
    });
});

// social aid route
Route::group(['prefix' => 'social'], function () {
    // home
    Route::get('/', function () {
        return view('social.index');
    });

    // calculate route
    Route::group(['prefix' => 'calculate'], function () {
        Route::get('/', [CalculateController::class, 'index']);
        Route::get('/create', [CalculateController::class, 'create']);
        Route::post('/', [CalculateController::class, 'store']);
        Route::get('/show/{id}', [CalculateController::class, 'show'])->name('broadcast.template.show');
        Route::get('/edit/{id}', [CalculateController::class, 'edit'])->name('broadcast.template.edit');
        Route::put('/{id}', [CalculateController::class, 'update']);
    });
});