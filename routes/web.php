<?php

use App\Http\Controllers\Authentication\AuthController;
use App\Http\Controllers\Broadcast\BroadcastScheduledController;
use App\Http\Controllers\Broadcast\BroadcastTemplateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataDigitalization\AssetController;
use App\Http\Controllers\DataDigitalization\BookKeeping\AccountController;
use App\Http\Controllers\DataDigitalization\BookKeeping\CashMutationController;
use App\Http\Controllers\DataDigitalization\HouseholdController;
use App\Http\Controllers\DataDigitalization\ResidentController;
use App\Http\Controllers\Information\FacilityController;
use App\Http\Controllers\Information\UmkmController;
use App\Http\Controllers\IssueTracker\ApprovalController;
use App\Http\Controllers\IssueTracker\ReportController;
use App\Http\Controllers\SocialAid\CalculateController;
use App\Http\Controllers\PersuratanTemplateController;
use App\Http\Controllers\User\MenuController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'landing.'], function () {
    // landing page
    Route::get('/', fn() => view('welcome'))->name('index');

    // landing page sub-pages
    Route::get('/facility', [MenuController::class, 'facility'])->name('facility');
    Route::get('/umkm', [MenuController::class, 'umkm'])->name('umkm');
    Route::get('/issue-report', [MenuController::class, 'issue'])->name('issue');
    Route::get('/financial', [MenuController::class, 'financial'])->name('financial');
});

// auth route
Route::group(['as' => 'auth.'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/auth', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth.guard');

// data digitalization route
Route::group([
    'prefix' => 'data',
    'as' => 'data.',
    'middleware' => 'auth.guard'
], function () {
    // home
    Route::get('/', fn() => view('data-digitalization.index'))->name('index');

    // resident route
    Route::group([
        'prefix' => 'resident',
        'as' => 'resident.'
    ], function () {
        Route::get('/', [ResidentController::class, 'index'])->name('index');
        Route::get('/archived', [ResidentController::class, 'archived'])->name('archived');
        Route::get('/create', [ResidentController::class, 'create'])->name('create');
        Route::post('/', [ResidentController::class, 'store'])->name('store');
        Route::get('/show/{id}', [ResidentController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [ResidentController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ResidentController::class, 'update'])->name('update');
    });

    // household route
    Route::group([
        'prefix' => 'household',
        'as' => 'household.'
    ], function () {
        Route::get('/', [HouseholdController::class, 'index'])->name('index');
        Route::get('/archived', [HouseholdController::class, 'archived'])->name('archived');
        Route::get('/create', [HouseholdController::class, 'create'])->name('create');
        Route::post('/', [HouseholdController::class, 'store'])->name('store');
        Route::get('/show/{id}', [HouseholdController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [HouseholdController::class, 'edit'])->name('edit');
        Route::put('/{id}', [HouseholdController::class, 'update'])->name('update');
    });

    // asset route
    Route::group([
        'prefix' => 'asset',
        'as' => 'asset.'
    ], function () {
        Route::get('/', [AssetController::class, 'index'])->name('index');
        Route::get('/archived', [AssetController::class, 'archived'])->name('archived');
        Route::get('/create', [AssetController::class, 'create'])->name('create');
        Route::post('/', [AssetController::class, 'store'])->name('store');
        Route::get('/show/{id}', [AssetController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [AssetController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AssetController::class, 'update'])->name('update');
    });

    // book-keeping route
    Route::group([
        'prefix' => 'bookkeeping',
        'as' => 'bookkeeping.'
    ], function () {
        // index route
        Route::get('/', fn() => view('data-digitalization.book-keeping.index'))->name('index');

        // account routes
        Route::group([
            'prefix' => 'account',
            'as' => 'account.'
        ], function () {
            Route::get('/', [AccountController::class, 'index'])->name('index');
            Route::get('/archived', [AccountController::class, 'archived'])->name('archived');
            Route::get('/create', [AccountController::class, 'create'])->name('create');
            Route::post('/', [AccountController::class, 'store'])->name('store');
            Route::get('/show/{id}', [AccountController::class, 'show'])->name('show');
            Route::get('/edit/{id}', [AccountController::class, 'edit'])->name('edit');
            Route::put('/{id}', [AccountController::class, 'update'])->name('update');
        });

        // cash mutation routes
        Route::group([
            'prefix' => 'cash',
            'as' => 'cash.'
        ], function () {
            Route::get('/', [CashMutationController::class, 'index'])->name('index');
            Route::get('/archived', [CashMutationController::class, 'archived'])->name('archived');
            Route::get('/create', [CashMutationController::class, 'create'])->name('create');
            Route::post('/', [CashMutationController::class, 'store'])->name('store');
            Route::get('/show/{id}', [CashMutationController::class, 'show'])->name('show');
        });
    });
});

// information centre route
Route::group([
    'prefix' => 'information',
    'as' => 'information.',
], function () {
    // home
    Route::get('/', fn() => view('information.index'))->name('index');

    // facility route
    Route::group([
        'prefix' => 'facility',
        'as' => 'facility.'
    ], function () {
        Route::get('/', [FacilityController::class, 'index'])->name('index');
        Route::get('/archived', [FacilityController::class, 'archived'])->name('archived');
        Route::get('/create', [FacilityController::class, 'create'])->name('create');
        Route::post('/', [FacilityController::class, 'store'])->name('store');
        Route::get('/show/{id}', [FacilityController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [FacilityController::class, 'edit'])->name('edit');
        Route::put('/{id}', [FacilityController::class, 'update'])->name('update');
    });

    // umkm route
    Route::group([
        'prefix' => 'umkm',
        'as' => 'umkm.'
    ], function () {
        Route::get('/', [UmkmController::class, 'index'])->name('index');
        Route::get('/archived', [UmkmController::class, 'archived'])->name('archived');
        Route::get('/create', [UmkmController::class, 'create'])->name('create');
        Route::post('/', [UmkmController::class, 'store'])->name('store');
        Route::get('/show/{id}', [UmkmController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [UmkmController::class, 'edit'])->name('edit');
        Route::put('/{id}', [UmkmController::class, 'update'])->name('update');
    });
});

// issue route
Route::group([
    'prefix' => 'issue',
    'as' => 'issue.',
    'middleware' => 'auth.guard'
], function () {
    // home
    Route::get('/', fn() => view('issue.index'))->name('index');

    // report route
    Route::group([
        'prefix' => 'report',
        'as' => 'report.'
    ], function () {
        Route::get('/', [ReportController::class, 'index'])->name('index');
        Route::get('/archived', [ReportController::class, 'archived'])->name('archived');
        Route::put('/{id}', [ReportController::class, 'update'])->name('update');
        Route::put('/{id}/archive', [ReportController::class, 'archive'])->name('archive');
        Route::put('/{id}/unarchive', [ReportController::class, 'unarchive'])->name('unarchive');
    });

    // approve route
    Route::group([
        'prefix' => 'approval',
        'as' => 'approval.'
    ], function () {
        // home
        Route::get('/', [ApprovalController::class, 'index'])->name('index');
        Route::get('/show/{id}', [ApprovalController::class, 'show'])->name('show');
    });
});

// broadcast route
Route::group([
    'prefix' => 'broadcast',
    'as' => 'broadcast.',
    'middleware' => 'auth.guard'
], function () {
    // home
    Route::get('/', fn() => view('broadcast.index'))->name('index');

    // send route
    Route::group([
        'prefix' => 'send',
        'as' => 'send.'
    ], function () {
        Route::post('/', [BroadcastScheduledController::class, 'sendBroadcast'])->name('broadcast');
        Route::get('/{template:broadcast_template_id}', [BroadcastScheduledController::class, 'send'])->name('index');
    });

    // template route
    Route::group([
        'prefix' => 'template',
        'as' => 'template.'
    ], function () {
        Route::get('/', [BroadcastTemplateController::class, 'index'])->name('index');
        Route::get('/archived', [BroadcastTemplateController::class, 'archived'])->name('archived');
        Route::get('/create', [BroadcastTemplateController::class, 'create'])->name('create');
        Route::post('/', [BroadcastTemplateController::class, 'store'])->name('store');
        Route::get('/show/{id}', [BroadcastTemplateController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [BroadcastTemplateController::class, 'edit'])->name('edit');
        Route::put('/{id}', [BroadcastTemplateController::class, 'update'])->name('update');
    });

    // message route
    Route::group([
        'prefix' => 'scheduled',
        'as' => 'scheduled.'
    ], function () {
        Route::get('/', [BroadcastScheduledController::class, 'index'])->name('index');
        Route::get('/create', [BroadcastScheduledController::class, 'create'])->name('create');
        Route::post('/', [BroadcastScheduledController::class, 'store'])->name('store');
        Route::get('/show/{id}', [BroadcastScheduledController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [BroadcastScheduledController::class, 'edit'])->name('edit');
        Route::put('/{id}', [BroadcastScheduledController::class, 'update'])->name('update');
    });
});

// social-aid aid route
Route::group([
    'prefix' => 'social-aid',
    'as' => 'social-aid.',
    'middleware' => 'auth.guard'
], function () {
    // home
    Route::get('/', fn() => view('social-aid.index'))->name('index');

    // calculate route
    Route::group([
        'prefix' => 'calculate',
        'as' => 'calculate.'
    ], function () {
        Route::get('/', [CalculateController::class, 'index'])->name('index');
        Route::post('/', [CalculateController::class, 'calculate'])->name('rank');
    });
});

// persuratan route
Route::group([
    'prefix' => 'persuratan',
    'as' => 'persuratan.',
    'middleware' => 'auth.guard'
], function () {
    // Home
    Route::get('/', fn() => view('persuratan.index'))->name('index');

    Route::group([
        'prefix' => 'templates',
        'as' => 'templates.'
    ], function () {
        Route::get('/', [PersuratanTemplateController::class, 'index'])->name('index');
        Route::get('/archived', [PersuratanTemplateController::class, 'archived'])->name('archived');
        Route::get('/create', [PersuratanTemplateController::class, 'create'])->name('create');
        Route::post('/', [PersuratanTemplateController::class, 'store'])->name('store');
        Route::get('/show/{id}', [PersuratanTemplateController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [PersuratanTemplateController::class, 'edit'])->name('edit'); // Pastikan rute GET ada di sini
        Route::put('/{id}', [PersuratanTemplateController::class, 'update'])->name('update');
        Route::patch('/{id}/archive', [PersuratanTemplateController::class, 'archive'])->name('archive');
        Route::get('/download/{id}', [PersuratanTemplateController::class, 'download'])->name('download');

    });

    
});




    

