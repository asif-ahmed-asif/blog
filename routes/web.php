<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Site\SiteController;
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

Route::controller(SiteController::class)->group(function () {
    Route::get('/', 'home');
});

Route::group(['prefix' => 'admin/dashboard'],function(){
    Route::controller(AdminController::class)->group(function () {
        Route::get('/', 'dashboard');
    });
});

