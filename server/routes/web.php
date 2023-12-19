<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckIP;
use App\Http\Middleware\CheckLogin;
use App\Http\Controllers\blog\postsController as blogPostsController;
use App\Http\Controllers\blog\searchsController as blogSearchsController;
use App\Http\Controllers\blog\contactsController as blogContactsController;
use App\Http\Controllers\admin\sessionsController as adminSessionsController;
use App\Http\Controllers\admin\postsController as adminPostsController;
use App\Http\Controllers\admin\contactsController as adminContactsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ブログ関連のルート
Route::group(['prefix' => ''], function () {
    Route::get('/', [blogPostsController::class, 'index'])->name('blogPostIndex');

    Route::get('/search', [blogSearchsController::class, 'index'])->name('blogSearchIndex');
    Route::get('/search/result', [blogSearchsController::class, 'show'])->name('blogSearchShow');

    Route::get('/{slug}', [blogPostsController::class, 'show'])->name('blogPostShow');
});

// お問い合わせ関連のルート
Route::group(['prefix' => 'contact'], function () {
    Route::get('/create', [blogContactsController::class, 'create'])->name('blogContactCreate');
    Route::post('/', [blogContactsController::class, 'store'])->name('blogContactStore');
});

// ログイン関連のルート
Route::prefix('session')->group(function () {
    Route::get('/create', [adminSessionsController::class, 'create'])->middleware(CheckIP::class)->name('adminSessionCreate');
    Route::post('/', [adminSessionsController::class, 'store'])->middleware(CheckIP::class)->name('adminSessionStore');
    Route::delete('/delete', [adminSessionsController::class, 'destroy'])->middleware(CheckIP::class)->name('adminSessionDestroy');
});

// 管理者関連のルート
Route::group(['prefix' => 'admin', 'middleware' => [CheckIP::class, CheckLogin::class]], function () {
    Route::get('/blog', [adminPostsController::class, 'index'])->name('adminBlogIndex');
    Route::get('/blog/create', [adminPostsController::class, 'create'])->name('adminBlogCreate');
    Route::post('/blog', [adminPostsController::class, 'store'])->name('adminBlogStore');
    Route::get('/blog/edit/{blog_id}', [adminPostsController::class, 'edit'])->name('adminBlogEdit');
    Route::patch('/blog/{blog_id}', [adminPostsController::class, 'update'])->name('adminBlogUpdate');
    Route::delete('/blog/{blog_id}', [adminPostsController::class, 'destroy'])->name('adminBlogDestroy');
    Route::get('/contact', [adminContactsController::class, 'index'])->name('adminContactIndex');
    Route::delete('/contact/{contact_id}', [adminContactsController::class, 'destroy'])->name('adminContactDestroy');
});
