<?php

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

use Illuminate\Support\Facades\Route;
use Modules\Menu\Http\Controllers\MenuController;
use Modules\Menu\Http\Controllers\PageController;

Route::group(['middleware' => 'auth'], function () {
    Route::resource('menu', 'MenuController');
    Route::get('menu/status/{id}',[MenuController::class,'status'])->name('menu.status');
    Route::get('menu/has-submenu/{id}',[MenuController::class,'hasSubmenu'])->name('has.submenu');
    
    Route::resource('page', 'PageController');
    Route::get('page/status/{id}',[PageController::class,'status'])->name('page.status');
});
