<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\articleController;
use App\Http\Controllers\categoriesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/articles', [articleController::class, 'getAll']);
Route::get('articles/{id}', [articleController::class, 'getById']);
Route::post('articles', [articleController::class, 'store']);
Route::put('articles/{id}', [articleController::class, 'update']);
Route::delete('articles/{id}', [articleController::class, 'delete']);


Route::get('categories', [categoriesController::class, 'getAll']);
Route::get('categories/{id}', [categoriesController::class, 'getById']);
Route::post('categories', [categoriesController::class, 'store']);
Route::put('categories/{id}', [categoriesController::class, 'update']);
Route::delete('categories/{id}', [categoriesController::class, 'delete']);
