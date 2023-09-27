<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

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


Route::controller(SiteController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{url}', 'redirect')->name('redirect');

    Route::prefix('shorten')->group(function () {
        Route::post('', 'shorten')->name('shorten');
        Route::get('/{url}', 'view')->name('view');
    });
});
