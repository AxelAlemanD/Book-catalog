<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;

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

Route::controller(AuthorController::class)->group(function () {
    Route::get('/authors', 'getAll');
    Route::get('/authors/{id}', 'find');
    Route::post('/authors/', 'create');
    Route::put('/authors/{id}/', 'update');
    Route::delete('/authors/{id}', 'delete');
    Route::put('/authors/{id}/assignBook/', 'assignBook');
    Route::put('/authors/{id}/removeBook/', 'removeBook');
});

Route::controller(GenreController::class)->group(function () {
    Route::get('/genres', 'getAll');
    Route::get('/genres/{id}', 'find');
    Route::post('/genres/', 'create');
    Route::put('/genres/{id}/', 'update');
    Route::delete('/genres/{id}', 'delete');
});


Route::controller(BookController::class)->group(function () {
    Route::get('/books', 'getAll');
    Route::get('/books/{id}', 'find');
    Route::post('/books/', 'create');
    Route::put('/books/{id}/', 'update');
    Route::delete('/books/{id}', 'delete');
    Route::put('/books/{id}/assignAuthor/', 'assignAuthor');
    Route::put('/books/{id}/removeAuthor/', 'removeAuthor');
});