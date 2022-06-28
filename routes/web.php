<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'showlogin'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::group(['prefix' => 'admin'], function () {
        Route::get('dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('admin-dashboard');
       
        Route::group(['prefix' => 'blockchain'], function () {
            Route::get('/', [App\Http\Controllers\Admin\BlockchainController::class, 'index']);
            Route::post('/add', [App\Http\Controllers\Admin\BlockchainController::class, 'addAccount']);
            Route::post('/edit', [App\Http\Controllers\Admin\BlockchainController::class, 'editAccount']);
        });

        Route::group(['prefix' => 'kucoin'], function () {
            Route::get('/', [App\Http\Controllers\Admin\KucoinController::class, 'index']);
            Route::post('/add', [App\Http\Controllers\Admin\KucoinController::class, 'addAccount']);
            Route::post('/edit', [App\Http\Controllers\Admin\KucoinController::class, 'editAccount']);
        });

    });

   
});