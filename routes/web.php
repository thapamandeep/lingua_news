<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SportsController;
use App\Http\Controllers\PoliticsController;
use App\Http\Controllers\EntertainmentsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AdminMiddlware;
use App\Http\Middleware\AuthorMiddlware;

use App\Http\Controllers\LanguageController;
use Http\Middleware\SetLanguageMiddleware;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\EditorController;


// ---------------------------site----------------------------------//
Route::get('/',[SiteController::class,'home'])->name('home.index');
Route::get('/category/{slug}', [SiteController::class, 'categoryPage'])->name('category.page');
Route::get('/subcategory/{slug}', [SiteController::class, 'subcategoryPage'])->name('subcategory.page');
Route::get('/detail-news/{id}',[SiteController::class,'detail'])->name('detail.news');
// Route::get('/sports-page',[SportsController::class,'index'])->name('get.sportPage');

// ----------------------------Admin----------------------------------//
Route::get('/admin-dashboard',[AdminController::class,'index'])->name('admin.dashboard')
;

Route::get('/users-form',[AdminController::class,'usersForm'])->name('users.form');
Route::post('/users-store',[AdminController::class,'usersStore'])->name('post.users');
Route::get('/users-index' ,[AdminController::class, 'usersIndex'])->name('users.index');
Route::get('/users/edit/{id}', [AdminController::class, 'usersEdit'])->name('users.edit');
Route::put('/users/update/{id}', [AdminController::class, 'usersUpdate'])->name('users.update');
Route::get('/users/delete/{id}', [AdminController::class, 'usersDelete'])->name('users.delete');


Route::post('/roles-store',[AdminController::class,'rolesStore'])->name('post.roles');
Route::get('/roles/edit/{id}', [AdminController::class, 'rolesEdit'])->name('roles.edit');
Route::put('/roles/update/{id}', [AdminController::class, 'rolesUpdate'])->name('roles.update');
Route::get('/roles/delete/{id}', [AdminController::class, 'rolesDelete'])->name('roles.delete');
Route::get('/roles-form',[AdminController::class,'rolesForm'])->name('get.rolesForm');
Route::get('/roles-index',[AdminController::class,'rolesIndex'])->name('get.rolesIndex');

Route::get('/form-category',[AdminController::class,'categoryForm'])->name('get.categoryForm');
Route::post('/store-category',[AdminController::class,'categoryStore'])->name('post.category');
Route::get('/get-category-index',[AdminController::class,'categoryIndex'])->name('get.categoryIndex');



Route::get('/form-subcategory',[AdminController::class,'subcategory'])->name('get.subcategory');
Route::post('/add-subcategory',[AdminController::class,'subcategoryStore'])->name('subcategories.store');
Route::get('/subcategory-index',[AdminController::class,'subcategoryIndex'])->name('get.subcategory.index');
Route::get('/add-news',[NewsController::class,'news'])->name('get.addnews');
Route::post('/store-news',[NewsController::class,'store'])->name('post.news');
Route::get('/news-index',[NewsController::class,'index'])->name('get.news.index')->middleware('admin');
Route::get('/edit-news/{news}',[NewsController::class,'edit'])->name('get.edit.news')->middleware('admin');
Route::post('/update-news/{news}',[NewsController::class,'update'])->name('update.news')->middleware('admin');
Route::delete('/delete-news/{news}',[NewsController::class,'delete'])->name('delete.news')->middleware('admin');

Route::get('/news-translate',[NewsController::class,'newsTranslate'])->name('news.translate')->middleware('auth');
Route::post('/translate-store',[NewsController::class,'storeTranslation'])->name('post.storeTranslation')->middleware('auth');
Route::get('/translate-index',[NewsController::class,'translateIndex'])->name('translate.index')->middleware('admin');


Route::get('/language-form',[LanguageController::class,'form'])->name('get.language.form');
Route::post('/store-language',[LanguageController::class,'store'])->name('languages.store');

Route::get('/index-language',[LanguageController::class, 'index'])->name('language.index'); 


Route::get('/lang-index',[LanguageController::class,'langIndex'])->name('lang.index')->middleware('admin');
Route::get('/edit-lang/{language}',[LanguageController::class,'edit'])->name('edit.lang')->middleware('admin');
Route::post('update/{language}',[LanguageController::class,'update'])->name('update.language')->middleware('admin');

Route::post('/set-language', [LanguageController::class, 'setLanguage'])->name('set.language');
Route::post('/change-language', [SiteController::class, 'changeLanguage']);
Route::get('/change-language/{lang}', function($lang) {
    session(['lang' => $lang]);
    return back();
});



// =========================Author===========================//
Route::get('/author-dashboard', [AuthorController::class, 'dashboard'])
->name('author.dashboard')
  ->middleware('author');

// -------------login-----------------------------//

Route::get('/login' ,[AuthController::class, 'showLogin'])->name('login');
Route::post('login-user',[AuthController::class,'login'])->name('post.login');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/register' ,[AuthController::class, 'showRegister'])->name('register');



//---------EditorController-----------//



Route::middleware(['auth'])->group(function () {

    Route::get('/editor-dashboard',
        [EditorController::class,'dashboard']
    )->name('editor.dashboard');

    Route::get('/editor/pending-news',
        [EditorController::class,'pendingNews']
    )->name('editor.pending.news');

    Route::get('/editor/approved-news',
        [EditorController::class,'approvedNews']
    )->name('editor.approved.news');

    Route::get('/editor/rejected-news',
        [EditorController::class,'rejectedNews']
    )->name('editor.rejected.news');

});