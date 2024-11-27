<?php
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

// routes/web.php


// Rotta per il login
Route::view('/login', 'auth.login')->name('login');

// Rotta per il register
Route::view('/register', 'auth.register')->name('register');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');

Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');