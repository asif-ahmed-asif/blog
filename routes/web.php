<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
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
        Route::get('/', 'dashboard')->name('admin.dashboard');
    });
    Route::controller(CategoryController::class)->group(function () {
        route::prefix('categories')->group(function (){
            Route::get('/', 'index')->name('category.index');
            Route::post('/store', 'store')->name('category.store');
            Route::any('/update', 'update')->name('category.update');
            Route::get('/delete/{id}', 'delete')->name('category.delete');
        });

    });
    Route::controller(PostController::class)->group(function () {
        route::prefix('post')->group(function (){
            Route::get('/', 'index')->name('post.index');
            Route::get('/create', 'create')->name('post.create');
            Route::post('/store', 'store')->name('post.store');
            Route::get('/edit/{id}', 'edit')->name('post.edit');
            Route::post('/update/{id}', 'update')->name('post.update');
            Route::get('/delete/{id}', 'delete')->name('post.delete');
        });

    });
});

