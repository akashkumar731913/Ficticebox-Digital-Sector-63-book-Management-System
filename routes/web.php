<?php

use Illuminate\Support\Facades\Route;

use App\Models\Book;

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

Route::get('/', function () { 
    $books = Book::paginate(10);
    return view('index',compact('books'));
})->name('index');


// Auth Routes
Route::get('/register-form', function () { 
    return view('auth.registerForm');
})->name('registerForm');
Route::post('/register', [App\Http\Controllers\AdminController::class, 'register'])->name('register');

Route::get('/login', [App\Http\Controllers\AdminController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\AdminController::class, 'adminlogin'])->name('adminlogin');
Route::get('/logout', [App\Http\Controllers\AdminController::class, 'adminLogout'])->name('adminLogout');


// Authrization Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.dashboard');
    })->name('dashboard');


    Route::resource('books', App\Http\Controllers\BookController::class);
    Route::get('/book-add', function () { 
        return view('backend.bookAdd');
    })->name('bookAdd');
    Route::post('/books/{id}', [App\Http\Controllers\BookController::class, 'update'])->name('update');

    Route::resource('rating-comment', App\Http\Controllers\RatingCommentController::class);
});

// Public Routes
Route::get('/books-filter', [App\Http\Controllers\BookController::class, 'booksFilter'])->name('booksFilter');




