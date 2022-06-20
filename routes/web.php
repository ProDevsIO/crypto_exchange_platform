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
       
    });

   
});