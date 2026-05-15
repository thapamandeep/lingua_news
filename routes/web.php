<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SportsController;
use App\Http\Controllers\PoliticsController;
use App\Http\Controllers\EntertainmentsController;

Route::get('/',[SiteController::class,'home'])->name('home.index');
Route::get('/sport',[SportsController::class,'index'])->name('sports.index');
Route::get('/politics',[PoliticsController::class,'index'])->name('politics.index');
Route::get('/entertainments',[EntertainmentsController::class,'index'])->name('entertainments.index');
