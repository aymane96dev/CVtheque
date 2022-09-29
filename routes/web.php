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

Route::get('/', [App\Http\Controllers\CandidatController::class, 'getAllCandidats'])->name('home');
Route::get('/add', [App\Http\Controllers\CandidatController::class, 'addFormCandidats'])->name('addForm');
Route::post('/download', [App\Http\Controllers\CandidatController::class, 'getCV'])->name('download');
Route::post('/save', [App\Http\Controllers\CandidatController::class, 'saveCandidats'])->name('save');
Route::post('/search', [App\Http\Controllers\CandidatController::class, 'searchCandidats'])->name('search');

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

