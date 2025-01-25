<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RevisorController;
use App\Models\Tag;
use App\Http\Controllers\WriterController;


// Rotte pubbliche
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

// Rotte per login e registrazione
Route::view('/login', 'auth.login')->name('login');

// Rotta per il register
Route::view('/register', 'auth.register')->name('register');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Rotte per gli articoli
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');

Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');

Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');

Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/article/category/{category}', [ArticleController::class, 'byCategory'])->name('article.category');
Route::get('/article/user/{user}', [ArticleController::class, 'byUser'])->name('article.byUser');
Route::get('/article/search', [ArticleController::class, 'articleSearch'])->name('article.search');

// Rotte per la sezione carriere
Route::view('/careers', [PublicController::class, 'careers'])->name('careers');
Route::post('/careers/submit', [PublicController::class, 'careersSubmit'])->name('careers.submit');

// Rotte per l'amministratore
Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware('admin')->group(function () {
    Route::patch('/admin/user/set-admin', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
    Route::patch('/admin/user/set-revisor', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    Route::patch('/admin/user/set-writer', [AdminController::class, 'setWriter'])->name('admin.setWriter');
    Route::put('/admin/edit/tag/{tag}', [AdminController::class, 'editTag'])->name('admin.editTag');
    Route::delete('/admin/delete/tag/{tag}', [AdminController::class, 'deleteTag'])->name('admin.deleteTag');
    Route::put('/admin/edit/category/{category}', [AdminController::class, 'editCategory'])->name('admin.editCategory');
    Route::delete('/admin/delete/category/{category}', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');
    Route::post('/admin/category/store', [AdminController::class, 'storeCategory'])->name('admin.storeCategory');
});


    Route::middleware('revisor')->group(function () {
        Route::get('/revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
    });


Route::middleware('revisor')->group(function () {
    Route::get('/revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
    Route::post('/revisor/article/accept', [RevisorController::class, 'acceptArticle'])->name('revisor.acceptArticle');
    Route::post('/revisor/article/reject', [RevisorController::class, 'rejectArticle'])->name('revisor.rejectArticle');
    Route::post('/revisor/article/undo', [RevisorController::class, 'undoArticle'])->name('revisor.undoArticle');
});

// Rotte per lo scrittore
Route::middleware('writer')->group(function () {
    Route::get('/writer/dashboard', [WriterController::class, 'index'])->name('writer.dashboard');
    Route::get('/writer/article/{article}/edit', [WriterController::class, 'edit'])->name('writer.edit');
    Route::put('/writer/article/{article}', [WriterController::class, 'update'])->name('writer.update');
    Route::delete('/writer/article/{article}', [WriterController::class, 'destroy'])->name('writer.destroy');
    Route::get('/writer/article/create', [WriterController::class, 'create'])->name('writer.article.create');
    
});




