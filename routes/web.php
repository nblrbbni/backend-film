<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
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

// Dashboard
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // Genre
    // Create & Read
    Route::get('genre', [GenreController::class, 'index']);
    Route::post('genre', [GenreController::class, 'store']);
    //Update
    Route::get('/genre/{genre_id}/edit', [GenreController::class, 'edit']);
    Route::put('/genre/{genre_id}', [GenreController::class, 'update']);
    // Delete
    Route::get('/genre/{genre_id}/delete', [GenreController::class, 'delete']);

    // Film
    // Create & Read
    Route::get('film', [FilmController::class, 'index']);
    Route::post('film', [FilmController::class, 'store']);
    //Update
    Route::get('/film/{film_id}/edit', [FilmController::class, 'edit']);
    Route::put('/film/{film_id}', [FilmController::class, 'update']);
    // Delete
    Route::get('/film/{film_id}/delete', [FilmController::class, 'delete']);
});

// Auth
Auth::routes();
