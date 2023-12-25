<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\sessionsController;
use App\Http\Controllers\article\posts_controller;

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

Route::prefix('session')->group(function () {
    Route::post('/', [sessionsController::class, 'store']);
    Route::get('/', [sessionsController::class, 'show'])->middleware('auth:sanctum');
    Route::delete('/', [sessionsController::class, 'destroy'])->middleware('auth:sanctum');
});

Route::prefix('article')->group(function () {
    Route::get('/index_all', [posts_controller::class, 'index_all'])->middleware('auth:sanctum');
    Route::delete('/', [posts_controller::class, 'destroy'])->middleware('auth:sanctum');
});
