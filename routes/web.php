<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialController;
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
Route::get('/dashboard/pages',[PageController::class,'index'])->middleware(['auth', 'verified'])->name('pages.index');
Route::get('/dashboard/pages/create',[PageController::class,'create'])->middleware(['auth', 'verified'])->name('pages.create');
Route::post('/dashboard/pages',[PageController::class,'store'])->middleware(['auth', 'verified'])->name('pages.store');
Route::get('/dashboard/pages/{id}/edit',[PageController::class,'edit'])->middleware(['auth', 'verified'])->name('pages.edit');
Route::put('/dashboard/pages/{id}',[PageController::class,'update'])->middleware(['auth', 'verified'])->name('pages.update');
Route::delete('/dashboard/pages/{id}',[PageController::class,'destroy'])->middleware(['auth', 'verified'])->name('pages.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/article',[ArticleController::class,'index'])->middleware(['auth', 'verified'])->name('articles.index');
Route::get('/dashboard/article/create',[ArticleController::class,'create'])->middleware(['auth', 'verified'])->name('articles.create');
Route::post('/dashboard/article',[ArticleController::class,'store'])->middleware(['auth', 'verified'])->name('articles.store');
Route::get('/dashboard/article/{id}',[ArticleController::class,'edit'])->middleware(['auth', 'verified'])->name('articles.edit');
Route::put('/dashboard/article/{id}',[ArticleController::class,'update'])->middleware(['auth', 'verified'])->name('articles.update');
Route::delete('/dashboard/article/{id}',[ArticleController::class,'destroy'])->middleware(['auth', 'verified'])->name('articles.destroy');


Route::get('/dashboard/social',[SocialController::class,'index'])->middleware(['auth', 'verified'])->name('socials.index');
Route::get('/dashboard/social/create',[SocialController::class,'create'])->middleware(['auth', 'verified'])->name('socials.create');
Route::post('/dashboard/social',[SocialController::class,'store'])->middleware(['auth', 'verified'])->name('socials.store');
Route::get('/dashboard/social/{id}',[SocialController::class,'edit'])->middleware(['auth', 'verified'])->name('socials.edit');
Route::put('/dashboard/social/{id}',[SocialController::class,'update'])->middleware(['auth', 'verified'])->name('socials.update');
Route::delete('/dashboard/social/{id}',[SocialController::class,'destroy'])->middleware(['auth', 'verified'])->name('socials.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
