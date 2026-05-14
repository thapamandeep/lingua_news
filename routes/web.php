<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SportsController;

Route::get('/',[SiteController::class,'home']);
Route::get('/sport',[SportsController::class,'index'])->name('sports.index');
