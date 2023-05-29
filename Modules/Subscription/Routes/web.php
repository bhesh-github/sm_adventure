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
use Modules\Subscription\Http\Controllers\SubscriptionController;

Route::group(['middleware' => 'auth'], function () {
    Route::resource('subscriptions', 'SubscriptionController')->except('create','store','edit','update','show');
    Route::get('subscriptions/send-mail',[SubscriptionController::class,'mail'])->name('subscriptions.mail');
    Route::post('subscriptions/send-mail',[SubscriptionController::class,'sendMail'])->name('subscriptions.send.mail');
});
