<?php

use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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

// Route::get('/', function () {
//     return view('frontend.layouts.master');
// });

// Route::get('/admin/dashboard', function () {
//     return view('index');
// });

//Route::get('admin/dashboard', AdminController::class, 'dashboard');

Route::controller(SiteController::class)->group(function () {
    Route::get('/', 'home');
});

Route::group(['prefix' => 'admin/dashboard'],function(){
    Route::controller(AdminController::class)->group(function () {
        Route::get('/', 'dashboard');
    });
});

