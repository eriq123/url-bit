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

Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/{url}', [SiteController::class, 'redirect'])->name('redirect');
Route::post('/shorten', [SiteController::class, 'shorten'])->name('shorten');
Route::get('/shorten/{url}', [SiteController::class, 'view'])->name('view');
