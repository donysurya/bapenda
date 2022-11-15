<?php

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

Route::get('/', function () {
    return view('landingpage.index');
})->name('home');

// About Bapenda
Route::get('/about', function () {
    return view('landingpage.about.index');
})->name('about'); //Visi & Misi

Route::get('/history', function () {
    return view('landingpage.about.history');
})->name('history'); //Sejarah Bapenda

Route::get('/director', function () {
    return view('landingpage.about.director');
})->name('director'); //Kepala Bapenda

Route::get('/organization', function () {
    return view('landingpage.about.organization');
})->name('organization'); //Struktur Organisasi

// Download
Route::get('/download', function () {
    return view('landingpage.download.index');
})->name('download'); 

// Infografis
Route::get('/infografis', function () {
    return view('landingpage.infografis.index');
})->name('infografis'); 

// Video
Route::get('/video', function () {
    return view('landingpage.video.index');
})->name('video'); 

// News
Route::get('/article', function () {
    return view('landingpage.article.index');
})->name('article'); 

Route::get('/cms', function () {
    return redirect()->route('cms.login');
});

Route::prefix('cms')->name('cms.')->group(function () {
    Route::get('login', [\App\Http\Controllers\cms\loginController::class, 'index'])->name('login');
    Route::post('login', [\App\Http\Controllers\cms\loginController::class, 'login'])->name('login.check');

    Route::middleware('auth:cms')->group(function () {
        Route::get('/', [\App\Http\Controllers\cms\homeController::class, 'index'])->name('home');
        Route::get('logout', [\App\Http\Controllers\cms\loginController::class, 'logout'])->name('logout');
    });
});