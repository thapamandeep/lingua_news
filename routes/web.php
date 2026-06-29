<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
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
use App\Http\Controllers\SettingController;
use App\Http\Controllers\MembersController;

use App\Http\Controllers\NotificationController;

use App\Http\Controllers\SubscribeController;

use App\Http\Controllers\AboutController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\MediaController;




// ---------------------------site----------------------------------//
Route::get('/',[SiteController::class,'home'])->name('home.index');
Route::get('/category/{slug}', [SiteController::class, 'categoryPage'])->name('category.page');
Route::get('/subcategory/{slug}', [SiteController::class, 'subcategoryPage'])->name('subcategory.page');
Route::get('/detail-news/{id}',[SiteController::class,'detail'])->name('detail.news');
// Route::get('/sports-page',[SportsController::class,'index'])->name('get.sportPage');

// ----------------------------Admin----------------------------------//
Route::get('/admin-dashboard',[AdminController::class,'index'])->name('admin.dashboard')
;


Route::get('/users-form',[AdminController::class,'usersForm'])->name('users.create');
Route::post('/users-store',[AdminController::class,'usersStore'])->name('users.store');
Route::get('/users-index' ,[AdminController::class, 'usersIndex'])->name('users.index');
Route::get('/users/edit/{id}', [AdminController::class, 'usersEdit'])->name('users.edit');
Route::put('/users/update/{id}', [AdminController::class, 'usersUpdate'])->name('users.update');
Route::get('/users/delete/{id}', [AdminController::class, 'usersDelete'])->name('users.delete');


Route::post('/roles-store',[AdminController::class,'rolesStore'])->name('roles.store');
Route::get('/roles/edit/{id}', [AdminController::class, 'rolesEdit'])->name('roles.edit');
Route::put('/roles/update/{id}', [AdminController::class, 'rolesUpdate'])->name('roles.update');
Route::get('/roles/delete/{id}', [AdminController::class, 'rolesDelete'])->name('roles.delete');
Route::get('/roles-form',[AdminController::class,'rolesForm'])->name('roles.create');
Route::get('/roles-index',[AdminController::class,'rolesIndex'])->name('roles.index');

Route::get('/form-category',[AdminController::class,'categoryForm'])->name('category.create');
Route::post('/store-category',[AdminController::class,'categoryStore'])->name('category.store');
Route::get('/get-category-index',[AdminController::class,'categoryIndex'])->name('category.index');
Route::get('/category-translation',[AdminController::class,'categoryTranslation'])->name('category.translate');
Route::post('/category-translation/store', [AdminController::class, 'categoryTranslationStore'])
->name('category.translation.store');


Route::get( '/subcategory-create', [AdminController::class, 'subcategory'])->name('subcategories.create');
Route::get('/subcategory-translation-form', [AdminController::class, 'subcategoryTranslationCreate'])->name('subcategories.translate.create');
Route::post('/subcategory-translation-store', [AdminController::class, 'subcategoryTranslationStore'])->name('subcategories.translate.store');
Route::post('/add-subcategory',[AdminController::class,'subcategoryStore'])->name('subcategories.store');
Route::get('/subcategory-index',[AdminController::class,'subcategoryIndex'])->name('subcategories.index');
Route::get('/add-news',[NewsController::class,'news'])->name('news.create');
Route::post('/store-news',[NewsController::class,'store'])->name('news.store');
Route::get('/news-index',[NewsController::class,'index'])->name('news.index')->middleware('admin');
Route::post('/news/{news}/approve', [EditorController::class, 'approve'])
    ->name('news.approve');

Route::post('/news/{news}/reject', [EditorController::class, 'reject'])
    ->name('news.reject');
Route::get('/news-edit/{news}',[NewsController::class,'editNews'])->name('news.edit')->middleware('admin');
Route::get('/edit-news/{translation}',[NewsController::class,'edit'])->name('translation.edit')->middleware('admin');
Route::post('/update-news/{news}',[NewsController::class,'updateNews'])->name('news.update')->middleware('admin');
Route::post('/update-news/{translation}',[NewsController::class,'updateTranslation'])->name('translation.update')->middleware('admin');
Route::delete('/delete-news/{news}',[NewsController::class,'delete'])->name('news.delete')->middleware('admin');

Route::get('/news-translate',[NewsController::class,'newsTranslate'])->name('translation.create')->middleware('auth');
Route::post('/translate-store',[NewsController::class,'storeTranslation'])->name('translation.store')->middleware('auth');
Route::get('/translate-index',[NewsController::class,'translateIndex'])->name('translation.index')->middleware('admin');


Route::get('/language-form',[LanguageController::class,'form'])->name('languages.create');
Route::post('/store-language',[LanguageController::class,'store'])->name('languages.store');

Route::get('/index-language',[LanguageController::class, 'index'])->name('languages.index'); 


Route::get('/lang-index',[LanguageController::class,'langIndex'])->name('lang.index')->middleware('admin');
Route::get('/edit-lang/{language}',[LanguageController::class,'edit'])->name('edit.lang')->middleware('admin');
Route::post('update/{language}',[LanguageController::class,'update'])->name('languages.update')->middleware('admin');

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
  Route::get('/author/articles', [AuthorController::class, 'articles'])
    ->name('author.articles');
  Route::get('/category-index',[AuthorController::class,'category'])->name('author.category.index')->middleware('author');  
Route::get('/subcategory-index/{locale}', [AuthorController::class, 'subcategory'])
    ->name('author.subcategories.index')
    ->middleware('author');

Route::get('/author-notifications', [AuthorController::class, 'notifications'])
    ->name('author.notifications')
    ->middleware('author');    

    Route::get('author-language-index',[AuthorController::class,'languages'])->name('author.languages.index');

Route::get('/author-profile', [AuthorController::class, 'profile'])
    ->name('author.profile')
    ->middleware('author');

Route::post('/author-profile/update', [AuthorController::class, 'updateProfile'])
    ->name('author.profile.update')
    ->middleware('author');
// -------------login-----------------------------//

Route::get('/login' ,[AuthController::class, 'showLogin'])->name('login');
Route::post('login-user',[AuthController::class,'login'])->name('login.store');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/register' ,[AuthController::class, 'showRegister'])->name('register');



Route::middleware(['auth'])->group(function () {

    // DASHBOARD
    Route::get('/editor-dashboard', [EditorController::class, 'dashboard'])
        ->name('editor.dashboard');

    // LISTING PAGES
    Route::get('/editor/pending-news', [EditorController::class, 'pendingNews'])
        ->name('editor.pending.news');

    Route::get('/editor/approved-news', [EditorController::class, 'approvedNews'])
        ->name('editor.approved.news');

    Route::get('/editor/rejected-news', [EditorController::class, 'rejectedNews'])
        ->name('editor.rejected.news');

    // ACTION ROUTES (IMPORTANT FIX ✔)
    Route::post('/editor/news/{news}/approve', [EditorController::class, 'approve'])
        ->name('editor.news.approve');
    Route::post('/editor/news/{news}/reject', [EditorController::class, 'reject'])
        ->name('editor.news.reject');

    // AUTHOR SIDE
    Route::get('/pending-review', [AuthorController::class, 'pendingReview'])
        ->name('pending.review');
});

// search news -------------------------------//


Route::get('/search-news', [NewsController::class, 'search'])
    ->name('news.search');

    
// ----------------------------------------------setting-----------------------------------//

Route::middleware(['admin'])->group(function(){



Route::get('seeting',[SettingController::class,'view'])->name('view.setting');


Route::get('setting',[SettingController::class,'view'])->name('view.setting');


Route::post(
    '/translation/{translation}/approve',
    [NewsController::class, 'approveTranslation']
)->name('translation.approve');

Route::post(
    '/translation/{translation}/reject',
    [NewsController::class, 'rejectTranslation']
)->name('translation.reject');

Route::get('/setting',[SettingController::class,'view'])->name('admin.settings');

Route::post('/admin/settings/general', [SettingController::class, 'storeGeneral'])
    ->name('general.store');

// Route::get('/', [SettingController::class, 'index'])
//         ->name('general');

Route::get('/admin/settings/header-footer', [SettingController::class, 'headerFooter'])
    ->name('settings.header-footer');

    Route::post('/admin/settings/header-footer', [SettingController::class, 'storeHeaderFooter'])
    ->name('header-footer.store');

    Route::get('/admin/settings/social-links', [SettingController::class, 'socialLinks'])
    ->name('settings.social-links');

    Route::post('/admin/settings/social', [SettingController::class, 'storeSocialLinks'])
    ->name('social.store');

    Route::get('/admin/settings/seo', [SettingController::class, 'seo'])
    ->name('settings.seo');
    
    Route::post('/admin/settings/seo', [SettingController::class, 'storeSeo'])
    ->name('seo.store');


    Route::get('/admin/settings/email', [SettingController::class, 'email'])
    ->name('settings.email');

    Route::post('/admin/settings/email', [SettingController::class, 'storeEmail'])
    ->name('emails.store');

    Route::post('/admin/settings/email/test', [SettingController::class, 'sendTestEmail'])
    ->name('emails.test');

});

Route::middleware(['author'])->group(function(){
    Route::get('/author/settings', [SettingController::class, 'index'])
->name('author.settings');
});

// forgot password ==========================//

Route::get('/forgot-password',[AuthController::class,'forgotPassword'])->name('forgot.password');
Route::post('/otp',[AuthController::class,'otp'])->name('send.otp');
Route::get('/update-password',[AuthController::class,'newPassword'])->name('new.password');

Route::post('/change-password', [AuthController::class, 'changePassword'])
    ->name('change.password');

    Route::post('/update-password',[AuthController::class,'updatePassword'])->name('update.password');
   
    Route::get(
    '/author/search-articles',
    [AuthorController::class, 'searchArticles']
)->name('author.search.articles');



    // members ===============================//
    Route::post('/create-members',[MembersController::class,'store'])->name('members.store');
    Route::get('member-profile/{member}',[MembersController::class,'profile'])->name('member.profile');
    Route::get('member-edit/{member}',[MembersController::class,'edit'])->name('edit.member');
    Route::post('/update-member/{member}',[MembersController::class,'update'])->name('update.member');


    //<<-- Notifications-->>

Route::get('/author/notifications', [AuthorController::class, 'notifications'])
    ->name('author.notifications');


    // abouts===================//
    
    Route::get('/abouts',[AboutController::class,'abouts'])->name('abouts');
    Route::get('/about-create',[AboutController::class,'create'])->name('about.create')->middleware('admin');
    Route::post('/about-store',[AboutController::class,'store'])->name('about.store')->middleware('admin');


    // subscribe===================//

    Route::post('/subscribe/{member}', [SubscribeController::class, 'subscribe'])
    ->middleware('auth')
    ->name('subscribe');



    // CONTACTS \\

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::get('/notifications', [NotificationController::class, 'index'])
        ->name('notifications.index');

    Route::post('/notifications/read/{notification}', [NotificationController::class, 'read'])
        ->name('notifications.read');

    Route::post('/notifications/read-all', [NotificationController::class, 'readAll'])
        ->name('notifications.readAll');

        Route::get('/search', [AdminController::class, 'search'])
        ->name('admin.search');

        Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile.index');

    Route::post('/profile/update', [ProfileController::class, 'update'])
        ->name('profile.update');

<<<<<<< HEAD
        
=======
        Route::get('/media', [MediaController::class, 'index'])
        ->name('media.index');
        Route::get('/media/create', [MediaController::class, 'create'])
        ->name('media.create');
        Route::post('/media', [MediaController::class, 'store'])
        ->name('media.store');
        Route::get('/media/{medium}', [MediaController::class, 'show'])
        ->name('media.show');
        Route::get('/media/{medium}/edit', [MediaController::class, 'edit'])
        ->name('media.edit');
        Route::put('/media/{medium}', [MediaController::class, 'update'])
        ->name('media.update');
        Route::delete('/media/{medium}', [MediaController::class, 'destroy'])
        ->name('media.destroy');


>>>>>>> 37a8f1c539bf2b9cfd34f25e3105b090d3dc632b

});




// statics Language change------------------========================

Route::get('/test-lang/{lang}', function ($lang) {

    App::setLocale($lang);

    return __('site.Latest');

});

Route::get('/language/{lang}', function ($lang) {

    if (in_array($lang, ['en', 'ms', 'zh', 'ta'])) {

        session([
            'lang' => $lang
        ]);

        app()->setLocale($lang);
    }

    return redirect()->back();
})->name('language.switch');

