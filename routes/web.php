<?php

use App\Http\Controllers\UrlController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/', [UrlController::class, 'index']);
Route::get('/home', [UrlController::class, 'index'])->name('home');
//Route::get('/create', [App\Http\Controllers\UrlController::class, 'create'])->name('create');

Route::middleware('auth')->group(function () {
    Route::get('/create', [UrlController::class, 'create'])->name('urls.create');
    Route::post('/urls', [UrlController::class, 'store'])->name('urls.store');
    Route::get('/urls', [UrlController::class, 'index'])->name('urls.index');
});

Route::get('/{short}', [UrlController::class, 'show'])->name('urls.show');
