<?php

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


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/', [\App\Http\Controllers\IndexController::class, 'index']);
    Route::get('dashboard', [\App\Http\Controllers\IndexController::class, 'index']);
    Route::resource('index', \App\Http\Controllers\IndexController::class);
    Route::get('/type_product', [\App\Http\Controllers\IndexController::class, 'index'])->name('type_product');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\IndexController::class, 'index'])->name('dashboard');
});
