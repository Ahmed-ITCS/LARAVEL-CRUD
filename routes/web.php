<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers;

use App\Http\Controllers\MoviesController;
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

Route::post('action', [MoviesController::class , 'store']);
Route::get('movie', [MoviesController::class , 'show']);
Route::get('delete/{id}', [MoviesController::class , 'delete']);
Route::get('watch/{id}', [MoviesController::class , 'watch']);
Route::get('watch/{id}', [MoviesController::class , 'watch']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/upload', function () {
    return view('upload');
})->middleware(['auth', 'verified'])->name('upload');

Route::get('/mymovies', [MoviesController::class , 'showspecific'])->middleware(['auth', 'verified'])->name('mymovies');



Route::get('/movie', [MoviesController::class , 'show'])->middleware(['auth', 'verified'])->name('movie');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
