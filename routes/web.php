<?php

use App\Http\Controllers\AddBook;
use App\Http\Controllers\BookContainer;
use App\Http\Controllers\DeleteBook;
use App\Http\Controllers\EditReview;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SearchBook;
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


// LOGIN
Route::get('/', [LoginController::class, 'index']);
Route::post('/', [LoginController::class, 'login']);

// HOME
Route::get('/home', [HomeController::class, 'index']);

// ADD BOOK
Route::get('/addbook', [AddBook::class, 'index']);
Route::post('/addbook', [AddBook::class, 'store']);

// DELETE BOOK
Route::post('/delete/book', [DeleteBook::class, 'deleteBook']);

// BOOK ID LIVEWIRE
Route::get('/book', [BookContainer::class, 'index'] );
Route::post('/book', [EditReview::class, 'editReview']);
Route::post('/delete/review', [EditReview::class, 'deleteReview']);

// SEARCH BOOK
Route::get('/search', [SearchBook::class, 'index'] );

