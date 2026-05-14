<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SportsController;

<<<<<<< HEAD

=======
Route::get('/',[SiteController::class,'front']);

Route::get('/sports', [SportsController::class, 'index'])->name('sports.index');
>>>>>>> 0856d36c6545bb08104a9669af23deeb235a2e13
