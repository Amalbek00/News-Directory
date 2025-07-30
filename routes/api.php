<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\RubricController;


Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', fn(Request $request) => $request->user());

    Route::prefix('v1')->group(function () {

        Route::get('/authors', [AuthorController::class, 'index']);
        Route::post('/authors', [AuthorController::class, 'store']);

        Route::get('/rubrics', [RubricController::class, 'index']);
        Route::post('/rubrics', [RubricController::class, 'store']);

        Route::get('/news', [NewsController::class, 'index']);
        Route::get('/news/{id}', [NewsController::class, 'show']);
        Route::post('/news', [NewsController::class, 'store']);

        Route::get('/authors/{author}/news', [NewsController::class, 'byAuthor']);

        Route::get('/rubrics/{rubric}/news', [NewsController::class, 'byRubric']);

        Route::get('/news/search/title', [NewsController::class, 'searchByTitle']);
    });
});
