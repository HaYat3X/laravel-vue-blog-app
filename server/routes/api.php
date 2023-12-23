<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\sessionsController as adminSessionsController;
use App\Http\Controllers\auth\sessionsController;

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
});

// Route::get('session', [adminSessionsController::class, 'create'])->name('login');




// Route::middleware('auth:sanctum')->get('/user', function () {
//     return response()->json([
//         'status' => "OK"
//     ]);
// });
