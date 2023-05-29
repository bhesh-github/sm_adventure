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
use Modules\Package\Http\Controllers\CategoryController;
use Modules\Package\Http\Controllers\PackageController;
use Modules\Package\Http\Controllers\PackageExpectationController;
use Modules\Package\Http\Controllers\PackageItineraryController;
use Modules\Package\Http\Controllers\PackageReviewController;

Route::group(['middleware' => 'auth'], function () {
    Route::resource('category', 'CategoryController');
    Route::get('category/status/{id}',[CategoryController::class,'status'])->name('category.status');

    Route::resource('packages', 'PackageController');
    Route::get('package/status/{id}',[PackageController::class,'status'])->name('packages.status');
    Route::get('package/images/delete/{id}',[PackageController::class,'imageDelete'])->name('packages.image.delete');

    // itinerary
    Route::get('package/{id}/itinerary',[PackageItineraryController::class,'index'])->name('itinerary.index');
    Route::get('package/{id}/itinerary/create',[PackageItineraryController::class,'create'])->name('itinerary.create');
    Route::post('package/itinerary/store',[PackageItineraryController::class,'store'])->name('itinerary.store');
    Route::post('package/itinerary/{id}/update',[PackageItineraryController::class,'update'])->name('itinerary.update');
    Route::get('package/itinerary/delete/{id}',[PackageItineraryController::class,'destroy'])->name('itinerary.destroy');

    // reviews
    Route::get('package/{id}/review',[PackageReviewController::class,'index'])->name('review.index');
    Route::get('package/{id}/review/create',[PackageReviewController::class,'create'])->name('review.create');
    Route::post('package/review/store',[PackageReviewController::class,'store'])->name('review.store');
    Route::post('package/review/{id}/update',[PackageReviewController::class,'update'])->name('review.update');
    Route::get('package/review/delete/{id}',[PackageReviewController::class,'destroy'])->name('review.destroy');

    // expectations
    Route::get('package/{id}/expectations',[PackageExpectationController::class,'index'])->name('expectations.index');
    Route::get('package/{id}/expectations/create',[PackageExpectationController::class,'create'])->name('expectations.create');
    Route::post('package/expectations/store',[PackageExpectationController::class,'store'])->name('expectations.store');
    Route::post('package/expectations/{id}/update',[PackageExpectationController::class,'update'])->name('expectations.update');
    Route::get('package/expectations/delete/{id}',[PackageExpectationController::class,'destroy'])->name('expectations.destroy');
});
