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