<?php

use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentTypeController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('knowledge', [KnowledgeController::class, 'getData']);

Route::get('studenttype', [StudentTypeController::class, 'getData']);

Route::get('user', [UserController::class, 'getData']);
Route::delete('user/edit/{id}', [UserController::class, 'delete']);
Route::post('user', [UserController::class, 'upload']);
Route::put('user/edit/{id}', [UserController::class, 'editInfo']);

Route::get('posts', [PostController::class, 'getData']);
Route::delete('posts/edit/{id}', [PostController::class, 'delete']);

Route::get('course', [CourseController::class, 'getData']);
Route::delete('course/edit/{id}', [CourseController::class, 'delete']);
Route::post('course', [UserController::class, 'upload']);
Route::put('course/edit/{id}', [UserController::class, 'editInfo']);
