<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('admin/{any?}', function () {
    return view('admin');
})->where('any', '^(?!api\/)[\/\w\.\,-]*');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/{any?}', [HomeController::class, 'index'])
    ->where('any', '^(?!api\/)[\/\w\.\,-]*');