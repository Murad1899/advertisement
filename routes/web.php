<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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


Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::group(['middleware' => 'checkAuth'], function() {


    Route::group(['prefix' => 'product', 'as' => 'product'], function() {
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::post('/index', [ProductController::class, 'index'])->name('index');
    });


    Route::group(['prefix' => 'category'], function() {
        Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');


    });
});