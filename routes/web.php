<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', fn() => view('home'));
Route::get('/services', [ServiceController::class, 'index']);
Route::post('/services/check', [ServiceController::class, 'checkAvailability']);
Route::get('/services/grid', [ServiceController::class, 'checkAvailability'])
    ->name('services.grid');

Route::get('/about', fn() => view('pages.about'));
Route::get('/account', fn() => view('pages.account'));
Route::get('/contact', fn() => view('pages.contact'));
