<?php

use App\Http\Controllers\Admin\ColorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TrademarkController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PublicController;

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


Route::group(['middleware' => 'checkLogin'], function() {
    Route::get('dang-nhap',      [AuthController::class, 'login'])       ->name('login');
    Route::post('dang-nhap',     [AuthController::class, 'auth'])        ->name('auth');
    Route::get('quen-mat-khau',  [AuthController::class, 'forget'])      ->name('forget');
    Route::post('quen-mat-khau', [AuthController::class, 'postForget'])  ->name('postForget');
    Route::get('dang-ky',        [AuthController::class, 'register'])    ->name('register');
    Route::post('dang-ky',       [AuthController::class, 'postRegister'])->name('postRegister');
});

Route::get('dang-xuat', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'checkAdminLogin', 'prefix' => 'admin'], function() {
    Route::get('/', [DashBoardController::class, 'index'])->name('admin.dashboard');
    Route::resource('user', UserController::class);
    Route::resource('trademark', TrademarkController::class);
    Route::resource('color', ColorController::class);
    Route::resource('type', TypeController::class);
    Route::resource('product', ProductController::class);
    Route::post('media', [DashBoardController::class, 'storeMedia'])->name('admin.storeMedia');
    Route::post('remove-media', [DashBoardController::class, 'destroy'])->name('admin.destroyMedia');
    Route::get('thay-doi-mat-khau', [UserController::class, 'changePass'])->name('user.changepass');
    Route::post('thay-doi-mat-khau', [UserController::class, 'postChangePass'])->name('user.postchangepass');
});

Route::get('/', [PublicController::class, 'index'])->name('public.index');
Route::get('loai-san-pham/{slug}', [PublicController::class, 'type'])->name('public.type');
Route::get('san-pham/{code}', [PublicController::class, 'productDetail'])->name('public.productDetail');
Route::get('thanh-toan', [PublicController::class, 'payment'])->name('public.payment');
Route::post('thanh-toan', [PublicController::class, 'postPayment'])->name('public.postPayment');

Route::group(['prefix' => 'cart'], function() {
    Route::get('/', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('/', [CartController::class, 'addToCart'])->name('cart.store');
    Route::put('/', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/', [CartController::class, 'delete'])->name('cart.delete');    
    Route::get('clear', [CartController::class, 'clear'])->name('cart.clear');    
});
