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
use Modules\Gallery\Http\Controllers\GalleryController;
use Modules\Gallery\Http\Controllers\GalleryImageController;
use Modules\Gallery\Http\Controllers\GalleryVideoController;

Route::group(['middleware' => 'auth'], function () {
    Route::resource('gallery','GalleryController');
    Route::get('gallery/status/{id}',[GalleryController::class,'status'])->name('gallery.status');

    Route::resource('gallery/{id}/images','GalleryImageController', [
        'names' => [
            'index' => 'gallery.images.index',
            'create' => 'gallery.images.create',
            'store' => 'gallery.images.store',
            'edit' => 'gallery.images.edit',
            'update' => 'gallery.images.update',
            'destroy' => 'gallery.images.destroy',
            'show' => 'gallery.images.show',
        ]
    ]);
    Route::get('gallery/images/status/{id}',[GalleryImageController::class,'status'])->name('gallery.images.status');

    Route::resource('gallery/videos/list','GalleryVideoController', [
        'names' => [
            'index' => 'gallery.video.index',
            'create' => 'gallery.video.create',
            'store' => 'gallery.video.store',
            'edit' => 'gallery.video.edit',
            'update' => 'gallery.video.update',
            'destroy' => 'gallery.video.destroy',
        ]
    ])->except('show');
    Route::get('gallery/video/status/{id}',[GalleryVideoController::class,'status'])->name('gallery.video.status');
    Route::get('gallery/video/main/{id}',[GalleryVideoController::class,'main'])->name('gallery.video.main');
});
