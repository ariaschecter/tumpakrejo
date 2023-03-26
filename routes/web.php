<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::controller(HomeController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->middleware(['auth'])->name('admin.dashboard');
    Route::get('/', 'index')->name('home.index');
    Route::get('/detail/{blog:slug_blog}', 'detail')->name('home.detail');
    Route::get('/informasi', 'informasi')->name('home.informasi');
    Route::get('/asset', 'asset')->name('home.asset');
    Route::get('/pengajar', 'pengajar')->name('home.pengajar');
});

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::controller(BlogController::class)->group(function () {
        Route::get('/kegiatan', 'kegiatan')->name('admin.blog.kegiatan');
        Route::get('/prestasi', 'prestasi')->name('admin.blog.prestasi');
        Route::get('/ekstrakurikuler', 'ekstra')->name('admin.blog.ekstra');
        Route::get('/blog/add', 'create')->name('admin.blog.add');
        Route::post('/blog/add', 'store')->name('admin.blog.store');
        Route::get('/blog/edit/{blog}', 'edit')->name('admin.blog.edit');
        Route::post('/blog/edit/{blog}', 'update')->name('admin.blog.update');
        Route::get('/blog/delete/{blog}', 'destroy')->name('admin.blog.delete');
    });

    Route::controller(InformasiController::class)->group(function () {
        Route::get('/informasi', 'index')->name('admin.informasi.index');
        Route::get('/informasi/add', 'create')->name('admin.informasi.add');
        Route::post('/informasi/add', 'store')->name('admin.informasi.store');
        Route::get('/informasi/show/{informasi}', 'show')->name('admin.informasi.show');
        Route::get('/informasi/edit/{informasi}', 'edit')->name('admin.informasi.edit');
        Route::post('/informasi/edit/{informasi}', 'update')->name('admin.informasi.update');
        Route::get('/informasi/delete/{informasi}', 'destroy')->name('admin.informasi.delete');
    });

    Route::controller(AssetController::class)->group(function () {
        Route::get('/asset', 'index')->name('admin.asset.index');
        Route::get('/asset/add', 'create')->name('admin.asset.add');
        Route::post('/asset/add', 'store')->name('admin.asset.store');
        Route::get('/asset/show/{asset}', 'show')->name('admin.asset.show');
        Route::get('/asset/edit/{asset}', 'edit')->name('admin.asset.edit');
        Route::post('/asset/edit/{asset}', 'update')->name('admin.asset.update');
        Route::get('/asset/delete/{asset}', 'destroy')->name('admin.asset.delete');
    });

    Route::controller(PengajarController::class)->group(function () {
        Route::get('/pengajar', 'index')->name('admin.pengajar.index');
        Route::get('/pengajar/add', 'create')->name('admin.pengajar.add');
        Route::post('/pengajar/add', 'store')->name('admin.pengajar.store');
        Route::get('/pengajar/show/{pengajar}', 'show')->name('admin.pengajar.show');
        Route::get('/pengajar/edit/{pengajar}', 'edit')->name('admin.pengajar.edit');
        Route::post('/pengajar/edit/{pengajar}', 'update')->name('admin.pengajar.update');
        Route::get('/pengajar/delete/{pengajar}', 'destroy')->name('admin.pengajar.delete');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index')->name('admin.user.index');
        Route::get('/user/add', 'create')->name('admin.user.add');
        Route::post('/user/add', 'store')->name('admin.user.store');
        Route::get('/user/edit/{user}', 'edit')->name('admin.user.edit');
        Route::post('/user/edit/{user}', 'update')->name('admin.user.update');
        Route::get('/user/delete/{user}', 'destroy')->name('admin.user.delete');
        Route::get('profile', 'profile')->name('profile');
        Route::post('profile/{user}', 'profile_update')->name('profile.update');
        Route::get('admin/logout', 'logout')->name('logout');
    });

});

Route::middleware('guest')->controller(UserController::class)->group(function () {
    Route::get('/admin/login', 'login_view')->name('login');
    Route::post('/admin/login', 'login_store')->name('admin.login.store');
});
