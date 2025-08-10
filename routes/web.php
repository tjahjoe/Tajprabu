<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('app');
});

Route::get('oauth/{provider}', [\App\Http\Controllers\OauthController::class, 'redirectToProvider']);
Route::get('oauth/{provider}/callback', [\App\Http\Controllers\OauthController::class, 'handleProviderCallback']);

Route::get('/sendAll', [\App\Http\Controllers\PusherController::class, 'publishToInterests']);
Route::get('/sendUser', [\App\Http\Controllers\PusherController::class, 'sendNotificationToUser']);

Route::middleware(['authorize:SPR'])->group(function () {
    Route::get('/super', function () {
        return view('super');
    });
});

Route::middleware(['authorize:ADM'])->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    });
});

Route::middleware(['authorize:USR'])->group(function () {
    Route::get('/user', function () {
        return view('user');
    });
});