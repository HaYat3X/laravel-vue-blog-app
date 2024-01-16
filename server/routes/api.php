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

Route::prefix('session')->group(function () {
    Route::post('/', [sessionsController::class, 'store']);
    Route::get('/', [sessionsController::class, 'show'])->middleware('auth:sanctum');
    Route::delete('/', [sessionsController::class, 'destroy'])->middleware('auth:sanctum');
});

Route::prefix('article')->group(function () {
    Route::get('/index_all', [postsController::class, 'index_all'])->middleware('auth:sanctum');

    Route::get('/get_published_article', [postsController::class, 'getPublishedArticle']);
    Route::get('/get_article/{slug}', [postsController::class, 'getArticle']);
    Route::post('/get_article_search_result', [searchsController::class, 'getArticleSearchResult']);



    Route::delete('/', [postsController::class, 'destroy'])->middleware('auth:sanctum');
    Route::post('/', [postsController::class, 'store'])->middleware('auth:sanctum');
    Route::get('/{article_id}/edit', [postsController::class, 'edit'])->middleware('auth:sanctum');
    Route::put('/', [postsController::class, 'update'])->middleware('auth:sanctum');
});

Route::prefix('contact')->group(function () {
    Route::post('/submit_contact', [contactPostController::class, 'submitContact']);
});
