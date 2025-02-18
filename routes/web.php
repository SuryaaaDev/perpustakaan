<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\VisitorController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('welcome');
});

Route::middleware('guest')->group(function(){
    Route::get('/login', [AuthController::class, 'indexLogin'])->name('login');
    Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('login.submit');

    Route::get('/register', [AuthController::class, 'indexRegistrasi'])->name('registrasi.index');
    Route::post('/register/submit', [AuthController::class, 'submitRegistrasi'])->name('registrasi.submit');
});

Route::middleware('auth')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/book', [BookController::class, 'index'])->name('book.index');
    Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
    Route::put('/book/{id}', [BookController::class, 'update'])->name('book.update');
    Route::get('/book/{id}/edit', [BookController::class, 'edit'])->name('book.edit');
    Route::delete('/book/{id}', [BookController::class, 'destroy'])->name('book.destroy');

    Route::get('/visitor', [VisitorController::class, 'visitorIndex'])->name('visitor.index');
    Route::post('/visitor/borrow', [VisitorController::class, 'visitorBorrow'])->name('visitor.borrow');
    Route::get('/borrowings', [BorrowingController::class, 'borrowingBook'])->name('borrowing.index');
    Route::delete('/borrowings/{id}', [BorrowingController::class, 'borrowingDestroy'])->name('borrowing.destroy');
});
