<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
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

Route::view('/','homepage');
Route::get('/Pages/{id}',[PageController::class,'show'])->name('pages.show');
Route::get('/dashboard/content/pages',[PageController::class,'index'])->middleware(['auth', 'verified'])->name('pages.index');
Route::get('/dashboard/content/pages/create',[PageController::class,'create'])->middleware(['auth', 'verified'])->name('pages.create');
Route::post('/dashboard/content/pages',[PageController::class,'store'])->middleware(['auth', 'verified'])->name('pages.store');
Route::get('/dashboard/content/pages/{id}/edit',[PageController::class,'edit'])->middleware(['auth', 'verified'])->name('pages.edit');
Route::put('/dashboard/content/pages/{id}',[PageController::class,'update'])->middleware(['auth', 'verified'])->name('pages.update');
Route::delete('/dashboard/content/pages/{id}',[PageController::class,'destroy'])->middleware(['auth', 'verified'])->name('pages.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/content/article',[ArticleController::class,'index'])->middleware(['auth', 'verified'])->name('content');
Route::get('/dashboard/content/article/create',[ArticleController::class,'create'])->middleware(['auth', 'verified'])->name('articles.create');
Route::post('/dashboard/content/article',[ArticleController::class,'store'])->middleware(['auth', 'verified'])->name('articles.store');
Route::get('/dashboard/content/article/{id}',[ArticleController::class,'edit'])->middleware(['auth', 'verified'])->name('articles.edit');
Route::put('/dashboard/content/article/{id}',[ArticleController::class,'update'])->middleware(['auth', 'verified'])->name('articles.update');
Route::delete('/dashboard/content/article/{id}',[ArticleController::class,'destroy'])->middleware(['auth', 'verified'])->name('articles.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
