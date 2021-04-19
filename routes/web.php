<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/video_page/{id}', [\App\Http\Controllers\HomeController::class, 'video']);
Route::get('/delete_page/film/{id}', [\App\Http\Controllers\FilmController::class, 'deletePage']);
Route::delete('/delete/film/', [\App\Http\Controllers\FilmController::class, 'delete']);
Route::get('/search/film', [\App\Http\Controllers\FilmController::class, 'search']);
