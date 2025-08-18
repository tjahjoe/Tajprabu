<?php

use App\Http\Controllers\OauthController;
use App\Http\Controllers\PusherController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\User\ArticleController;
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
    return view('cloud');
});

Route::get('/article', [ArticleController::class, 'getAllArticle']);

Route::post('/upload', [UploadController::class, 'upload']);

Route::get('oauth/{provider}', [OauthController::class, 'redirectToProvider']);
Route::get('oauth/{provider}/callback', [OauthController::class, 'handleProviderCallback']);

Route::get('/sendAll', [PusherController::class, 'publishToInterests']);
Route::get('/sendUser', [PusherController::class, 'sendNotificationToUser']);

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