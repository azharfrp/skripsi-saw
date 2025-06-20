<?php

use Illuminate\Support\Facades\Route;

// Load controller yang digunakan
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;

// Routing halaman depan
Route::prefix('/')->group(function(){
    // Routing untuk PageController di halaman depan (menggunakan prefix routing name yang dimulai dari 'index.')
    Route::prefix('/')->name('index.')->controller(PageController::class)->group(function(){
        // Index
        Route::get('/', 'index')->name('index'); // Karena menggunakan prefix routing name, maka route name ini adalah 'index.index'

        // About
        Route::get('about', 'index')->name('about');
    });

    // Routing untuk AuthController di halaman depan (tidak menggunakan prefix routing name)
    Route::prefix('/')->controller(AuthController::class)->group(function(){
        // Login
        Route::get('login', 'login')->name('login'); // Karena tidak menggunakan prefix routing name, maka route name ini adalah 'login'
        Route::post('login', 'loginPost');

        // Logout
        Route::get('logout', 'logout')->middleware(['auth'])->name('logout');
    });

    // Routing untuk ProductController di halaman depan
    Route::prefix('product')->name('product.')->controller(ProductController::class)->group(function(){
        // Index
        Route::get('/', 'index')->name('index');

        // Detail
        Route::get('detail/{id}', 'detail')->name('detail');

        // Recommendation
        Route::get('recommendation', 'recommendation')->name('recommendation');
        
        // Proccess recommendation input
        Route::post('proccess', 'proccess')->name('proccess');

        // Ranking
        Route::get('ranking', 'ranking')->name('ranking');
    });
});

// Routing halaman aplikasi admin menggunakan middleware 'auth' agar hanya dapat diakses oleh user yang sudah login (menggunakan prefix routing name yang dimulai dari 'app.')
Route::prefix('app')->name('app.')->controller(AppController::class)->middleware(['auth'])->group(function(){
    // Index
    Route::get('/', 'index')->name('index'); // Karena menggunakan prefix routing name, maka route name ini adalah 'app.index'

    Route::prefix('product')->name('product.')->group(function(){
        // Product
        Route::get('/', 'product')->name('list');

        // Product Add
        Route::get('add', 'productAdd')->name('add');
        Route::post('add', 'productAddPost');

        // Product Edit
        Route::get('edit/{id}', 'productEdit')->name('edit');
        Route::post('edit/{id}', 'productEditPost');

        // Product Delete
        Route::get('delete/{id}', 'productDelete')->name('delete');
    });
});