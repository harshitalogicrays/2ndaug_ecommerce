<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\dashboardcontroller;

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

Auth::routes();


Route::prefix('/admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('dashboard',[dashboardcontroller::class,'index']);
    Route::controller(CategoryController::class)->group(function(){
        Route::prefix('category')->group(function(){
            Route::get('view','index');
            Route::get('add','create');
            Route::post('add','store');
            Route::get('delete/{id}','delete');
            Route::get('edit/{id}','edit');
            Route::put('update/{id}','update');
        });
    });
    Route::controller(ProductController::class)->group(function(){
        Route::prefix('product')->group(function(){
            Route::get('view','index');
            Route::get('add','create');
            Route::post('add','store');
            Route::get('delete/{id}','delete');
            Route::get('edit/{id}','edit');
            Route::put('update/{id}','update');
            Route::get('destroy/{id}','destroy');
        });
    });
});

Route::controller(FrontendController::class)->group(function(){
    Route::get('/','index');
    Route::get('/collection','collection');
    Route::get('/collection/{id}','cproducts');
    Route::get('/collection/{category}/{product}','viewproduct');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
