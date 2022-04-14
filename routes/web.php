<?php

use App\Http\Controllers\Admin\ColorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TrademarkController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TypeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [DashBoardController::class, 'index'])->name('admin.dashboard');
    Route::resource('user', UserController::class);
    Route::resource('trademark', TrademarkController::class);
    Route::resource('color', ColorController::class);
    Route::resource('type', TypeController::class);
    Route::resource('product', ProductController::class);
    Route::post('media', [DashBoardController::class, 'storeMedia'])->name('admin.storeMedia');
    Route::post('remove-media', [DashBoardController::class, 'storeMedia'])->name('admin.destroyMedia');
});

