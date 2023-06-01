<?php

use App\Http\Controllers\Api\V1\BlogController;
use App\Http\Controllers\Api\V1\CompanyProfileController;
use App\Http\Controllers\Api\V1\FaqController;
use App\Http\Controllers\Api\V1\GalleryController;
use App\Http\Controllers\Api\V1\IndexController;
use App\Http\Controllers\Api\V1\PackageController;
use App\Http\Controllers\Api\V1\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// company Profile
Route::get('/company-profile', [CompanyProfileController::class,'profile']);

// navbar
Route::get('/category', [IndexController::class,'category']);
Route::get('/menus', [IndexController::class,'menu']);

// Index
Route::get('/banner', [IndexController::class,'banner']);
Route::get('/top-inbound-tour', [IndexController::class,'inboundTour']);
Route::get('/top-outbound-tour', [IndexController::class,'outboundTour']);
Route::get('/testimonials', [IndexController::class,'testimonials']);
Route::get('/companies', [IndexController::class,'companies']);

// footer
Route::get('/footer-categories', [IndexController::class,'footerCategories']);

// page
Route::get('/page/{slug}', [PageController::class,'pageShow']);

// package
Route::get('/package/list', [PackageController::class,'package']);
Route::get('/package/{slug}', [PackageController::class,'packageDetail']);

// gallery
Route::get('/gallery/list', [GalleryController::class,'gallery']);
Route::get('/gallery/{slug}/images', [GalleryController::class,'galleryImages']);

// faq
Route::get('/faq/list', [FaqController::class,'faq']);

// blog
Route::get('/blog/list', [BlogController::class,'blog']);
Route::get('/blog/{slug}', [BlogController::class,'blogDetails']);
Route::get('/recent-blogs', [BlogController::class,'recentBlogs']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
