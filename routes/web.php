<?php

use App\Http\Controllers\RoutingController;
use App\Http\Controllers\SiteMapController;
use Illuminate\Support\Facades\Route;

Route::get('/vivoz', [RoutingController::class, 'pages'])->name('vivoz');
Route::get('/demontazh', [RoutingController::class, 'pages'])->name('demontazh');
Route::get('/prices', [RoutingController::class, 'pages'])->name('prices');
Route::get('/contacts', [RoutingController::class, 'pages'])->name('contacts');

Route::get('/sitemap', SiteMapController::class)->name('sitemap');

Route::get('/{slug?}', [RoutingController::class, 'index'])
    ->middleware('slug.checker')
    ->name('home');
