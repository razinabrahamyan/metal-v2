<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\KeyWordsController;
use App\Http\Controllers\Admin\MarqueeController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::match(['get', 'post'], '/login', LoginController::class)->name('admin.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::group(['middleware' => 'auth:admin', 'prefix' => 'dashboard'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin.dashboard');

    Route::get('/metal-price', [PriceController::class, 'index'])->name('metal.price.index');
    Route::post('/metal-price/update/{id}', [PriceController::class, 'update'])
        ->name('metal.price.update');

    Route::get('/marquee', [MarqueeController::class, 'index'])->name('marquee.price');
    Route::post('/marquee/update/{id}', [MarqueeController::class, 'update'])->name('marquee.price.update');

    Route::group(['prefix' => 'content'], function () {
        Route::get('/', [ContentController::class, 'index'])->name('content.index');
        Route::get('/edit/{id}', [ContentController::class, 'edit'])->name('content.edit');
        Route::post('/update/{id}', [ContentController::class, 'update'])->name('content.update');
    });

    Route::get('/keywords', [KeyWordsController::class, 'index'])->name('meta.keywords');
    Route::post('/keywords/update/{id}', [KeyWordsController::class, 'update'])->name('meta.keywords.update');

});