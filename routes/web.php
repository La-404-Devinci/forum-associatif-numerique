<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\CategoryController;
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

// Home page
Route::get('/', [AppController::class, 'index'])->name('home');

Route::get('login', [AppController::class, 'login'])->name('login');
Route::post('login/post', [AppController::class, 'loginPost'])->name('login.post');
Route::post('logout', [AppController::class, 'logout'])->name('logout');

// Associations
Route::resource('association', AssociationController::class)->except(['create', 'store', 'destroy']);

// Categories
Route::resource('category', CategoryController::class)->only(['index', 'show']);

// Load 404 page for all wrong url
Route::fallback(function() {
    return view('app.404');
});
