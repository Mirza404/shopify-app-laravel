<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {  // Inject Request
    \Log::info('Shopify Request Params: ' . json_encode($request->query()));
    \Log::info('Full Request: ' . json_encode($request->all()));
    return Inertia::render('welcome');
})->middleware('verify.shopify')->name('home');
// ->middleware('verify.shopify')

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
