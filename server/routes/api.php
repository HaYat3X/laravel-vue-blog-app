<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\sessionsController;
use App\Http\Controllers\article\postsController;
use App\Http\Controllers\article\searchsController;
use App\Http\Controllers\contact\postsController as contactPostController;

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

Route::prefix('v1')->group(function () {
    Route::prefix('article/post')->group(function () {
        Route::controller(postsController::class)->group(function () {
            Route::get('', 'index')->middleware('auth:sanctum');
            Route::get('public', 'public');
            Route::delete('/{articleId}', 'destroy')->middleware('auth:sanctum');
            Route::post('/', 'store')->middleware('auth:sanctum');
            Route::get('/{articleId}/edit', 'edit')->middleware('auth:sanctum');
            Route::put('/{articleId}', 'update')->middleware('auth:sanctum');
            Route::get('/{slug}', 'show');
        });
    });

    Route::prefix('article/search')->group(function () {
        Route::controller(searchsController::class)->group(function () {
            Route::get('{keyword}', 'show');
        });
    });

    Route::prefix('session')->group(function () {
        Route::controller(sessionsController::class)->group(function () {
            Route::get('/user', 'user')->middleware('auth:sanctum');
            Route::post('/login', 'login');
            Route::delete('/logout', 'logout')->middleware('auth:sanctum');
        });
    });

    Route::prefix('contact')->group(function () {
        Route::controller(contactPostController::class)->group(function () {
            Route::get('/', 'index')->middleware('auth:sanctum');
            Route::delete('{contactId}', 'destroy')->middleware('auth:sanctum');
            Route::post('', 'store');
        });
    });
});
