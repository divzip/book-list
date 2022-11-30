<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookItemController;
use App\Http\Controllers\BookTakenController;
use App\Http\Controllers\DefaultController;

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

Route::get('/', [DefaultController::class, 'bookList'])->name('index');
Route::get('add-book',[DefaultController::class, 'addBook'])->name('addBook');

Route::post('/addBook', [BookItemController::class, 'saveBookItem'])->name('addBook');
Route::post('/deleteBook/{id}', [BookItemController::class, 'deleteBookItem'])->name('deleteBook');
Route::any('/editBook/{id}', [BookItemController::class, 'editBookItem'])->name('editBook');
Route::post('/addHistoryItems/{id}', [BookTakenController::class, 'saveBookHistoryItems'])->name('addHistoryItems');
Route::post('/deleteHistoryItem/{id}', [BookTakenController::class, 'deleteBookHistoryItem'])->name('deleteHistoryItem');