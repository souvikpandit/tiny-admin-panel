<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\GeneralController;
use App\Http\Controllers\admin\content_management\PageController;
use App\Http\Controllers\admin\content_management\MediaController;
use App\Http\Controllers\admin\content_management\BannerController;
use App\Http\Controllers\admin\content_management\SiteSettingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
    return view('admin.index');
})->name('home');

Route::get('/demo', function () {
    return view('admin.demo');
})->name('demo');

/* Admin Routing */

    /* CMS */
        /* Page*/
        Route::get('/page',[PageController::class, 'index'])->name('page');
        Route::get('/page/add',[PageController::class, 'create'])->name('page.add');
        Route::get('/page/edit/{id}',[PageController::class, 'edit'])->name('page.edit');
        Route::post('/page/update',[PageController::class, 'update'])->name('page.update');
        Route::post('/page/delete/{id}', [PageController::class, 'destroy'])->name('page.destroy');
        Route::delete('/pageDeleteAll',[PageController::class, 'alldelete'])->name('pageDeleteAll');
        /* Media*/
        Route::get('/media',[MediaController::class, 'index'])->name('media');
        Route::get('/media/add',[MediaController::class, 'create'])->name('media.add');
        Route::post('/media/store',[MediaController::class, 'store'])->name('media.store');
        Route::get('/media/edit/{id}',[MediaController::class, 'edit'])->name('media.edit');
        Route::post('/media/update',[MediaController::class, 'update'])->name('media.update');
        Route::post('/media/delete/{id}', [MediaController::class, 'destroy'])->name('media.destroy');
        Route::delete('/mediaDeleteAll',[MediaController::class, 'alldelete'])->name('mediaDeleteAll');
        Route::get('/media/view',[MediaController::class, 'view'])->name('media.view');
        Route::get('/media/view/{type}/{media_type}',[MediaController::class, 'view'])->name('media.multiple.view');
        /*Site Settings */
        Route::get('/site-settings',[SiteSettingController::class, 'index'])->name('site-settings');
        Route::post('/site-settings-update',[SiteSettingController::class, 'store'])->name('site-settings-update');
        /*Banner */
        Route::get('/banner',[BannerController::class, 'index'])->name('banner');
        Route::get('/banner/add',[BannerController::class, 'create'])->name('banner.add');
        Route::get('/banner/edit/{id}',[BannerController::class, 'edit'])->name('banner.edit');
        Route::post('/banner/update',[BannerController::class, 'update'])->name('banner.update');
        Route::post('/banner/delete/{id}', [BannerController::class, 'destroy'])->name('banner.destroy');
        Route::delete('/bannerDeleteAll',[BannerController::class, 'alldelete'])->name('bannerDeleteAll');
        Route::post('/sort/banner', [BannerController::class, 'sortBanner'])->name('sortBanner');
    
        /* CMS */

/* Admin Routing */


/* Post and Post Meta Routing */
    Route::post('/post/store',[GeneralController::class, 'store'])->name('post.store');
    Route::post('/post/update/{id}', [GeneralController::class,'update'])->name('post.update');
});
require __DIR__.'/auth.php';
