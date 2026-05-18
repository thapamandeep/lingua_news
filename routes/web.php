<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SportsController;
use App\Http\Controllers\PoliticsController;
use App\Http\Controllers\EntertainmentsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;

// ---------------------------site----------------------------------//
Route::get('/',[SiteController::class,'home'])->name('home.index');
Route::get('/category/{slug}', [SiteController::class, 'categoryPage'])->name('category.page');
// Route::get('/sports-page',[SportsController::class,'index'])->name('get.sportPage');

// ----------------------------Admin----------------------------------//
Route::get('/admin-dashboard',[AdminController::class,'index'])->name('admin.dashboard');
Route::get('/users-form',[AdminController::class,'usersForm'])->name('get.usersForm');
Route::get('/roles-form',[AdminController::class,'rolesForm'])->name('get.rolesForm');
Route::post('/users-store',[AdminController::class,'usersStore'])->name('post.users');
Route::post('/roles-store',[AdminController::class,'rolesStore'])->name('post.roles');
Route::get('/form-category',[AdminController::class,'categoryForm'])->name('get.categoryForm');
Route::post('/store-category',[AdminController::class,'categoryStore'])->name('post.category');
Route::get('/add-news',[NewsController::class,'newsAdd'])->name('get.addnews');
Route::post('/store-news',[NewsController::class,'store'])->name('post.news');