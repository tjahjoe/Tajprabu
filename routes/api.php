<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/image', [AuthController::class, 'image']);
// Route::group(['middleware' => ['jwt.auth', 'jwt.refresh']], function () {
//     Route::get('/me', [AuthController::class, 'me']);
//     Route::post('/logout', [AuthController::class, 'logout']);
// });

Route::get('/posters/', [PosterController::class, 'getAllPosters']);
Route::get('/posters/{status}', [PosterController::class, 'getPostersByActive']);
Route::get('/posters/{id}/show', [PosterController::class, 'getPosterById']);
Route::post('/posters/create', [PosterController::class, 'createPoster']);
Route::post('/posters/{id}/update', [PosterController::class, 'updatePoster']);
Route::delete('/posters/{id}/delete', [PosterController::class, 'deletePoster']);
Route::get('/posters/show/trashed', [PosterController::class, 'getTrashedPosters']);
Route::post('/posters/{id}/restore', [PosterController::class, 'restorePoster']);
Route::delete('/posters/{id}/destroy', [PosterController::class, 'destroyPoster']);

Route::get('/roles/', [RoleController::class, 'getAllRoles']);
Route::get('/roles/{id}/show', [RoleController::class, 'getRoleById']);
Route::post('/roles/create', [RoleController::class, 'createRole']);
Route::post('/roles/{id}/update', [RoleController::class, 'updateRole']);
Route::delete('/roles/{id}/delete', [RoleController::class, 'deleteRole']);
Route::get('/roles/show/trashed', [RoleController::class, 'getTrashedRoles']);
Route::post('/roles/{id}/restore', [RoleController::class, 'restoreRole']);
Route::delete('/roles/{id}/destroy', [RoleController::class, 'destroyRole']);

Route::get('/topics/', [TopicController::class, 'getAllTopics']);
Route::get('/topics/{kode}/show', [TopicController::class, 'getTopicById']);
Route::post('/topics/create', [TopicController::class, 'createTopic']);
Route::post('/topics/{id}/update', [TopicController::class, 'updateTopic']);
Route::delete('/topics/{id}/delete', [TopicController::class, 'deleteTopic']);
Route::get('/topics/show/trashed', [TopicController::class, 'getTrashedTopics']);
Route::post('/topics/{id}/restore', [TopicController::class, 'restoreTopic']);
Route::delete('/topics/{id}/destroy', [TopicController::class, 'destroyTopic']);

Route::get('/tags/', [TagController::class, 'getAllTags']);
Route::get('/tags/{kode}/show', [TagController::class, 'getTagById']);
Route::post('/tags/create', [TagController::class, 'createTag']);
Route::post('/tags/{id}/update', [TagController::class, 'updateTag']);
Route::delete('/tags/{id}/delete', [TagController::class, 'deleteTag']);
Route::get('/tags/show/trashed', [TagController::class, 'getTrashedTags']);
Route::post('/tags/{id}/restore', [TagController::class, 'restoreTag']);
Route::delete('/tags/{id}/destroy', [TagController::class, 'destroyTag']);

Route::get('/users/', [UserController::class, 'getAllUsers']);
Route::get('/users/{id}/show', [UserController::class, 'getUserById']);
Route::post('/users/create', [UserController::class, 'createUser']);
Route::post('/users/{id}/update', [UserController::class, 'updateUser']);
Route::delete('/users/{id}/delete', [UserController::class, 'deleteUser']);
Route::get('/users/show/trashed', [UserController::class, 'getTrashedUsers']);
Route::post('/users/{id}/restore', [UserController::class, 'restoreUser']);
Route::delete('/users/{id}/destroy', [UserController::class, 'destroyUser']);

Route::get('/articles/', [ArticleController::class, 'getAllArticles']);
Route::get('/articles/{kode}/show', [ArticleController::class, 'getArticleByKode']);
Route::post('/articles/create', [ArticleController::class, 'createArticle']);
Route::post('/articles/{id}/update', [ArticleController::class, 'updateArticle']);
Route::delete('/articles/{id}/delete', [ArticleController::class, 'deleteArticle']);
Route::get('/articles/show/trashed', [ArticleController::class, 'getTrashedArticles']);
Route::post('/articles/{id}/restore', [ArticleController::class, 'restoreArticle']);
Route::delete('/articles/{id}/destroy', [ArticleController::class, 'destroyArticle']);