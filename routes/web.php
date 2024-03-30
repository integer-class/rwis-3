<?php

use App\Http\Controllers\auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// auth route
Route::get('/login', [LoginController::class, 'index']);