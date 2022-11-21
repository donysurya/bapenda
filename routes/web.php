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

        // Data
        Route::get('/pegawai', [App\Http\Controllers\cms\pegawaiController::class, 'index'])->name('pegawai');
        Route::prefix('pegawai')->name('pegawai.')->group(function (){
            Route::get('/create', [App\Http\Controllers\cms\pegawaiController::class, 'create'])->name('create');
            Route::post('/create', [App\Http\Controllers\cms\pegawaiController::class, 'store'])->name('store');
            Route::get('/{id}', [App\Http\Controllers\cms\pegawaiController::class, 'show'])->name('show');
            Route::get('{id}/edit', [App\Http\Controllers\cms\pegawaiController::class, 'edit'])->name('edit');
            Route::put('{id}/edit', [App\Http\Controllers\cms\pegawaiController::class, 'update'])->name('update');
            Route::delete('/{id}', [App\Http\Controllers\cms\pegawaiController::class, 'destroy'])->name('destroy');
        });

        // Publikasi
        Route::get('/publikasi', [App\Http\Controllers\cms\publicationController::class, 'index'])->name('publikasi');
        Route::prefix('publikasi')->name('publikasi.')->group(function (){
            Route::get('/create', [App\Http\Controllers\cms\publicationController::class, 'create'])->name('create');
            Route::post('/create', [App\Http\Controllers\cms\publicationController::class, 'store'])->name('store');
            Route::get('/{id}', [App\Http\Controllers\cms\publicationController::class, 'show'])->name('show');
            Route::get('{id}/edit', [App\Http\Controllers\cms\publicationController::class, 'edit'])->name('edit');
            Route::put('{id}/edit', [App\Http\Controllers\cms\publicationController::class, 'update'])->name('update');
            Route::delete('/{id}', [App\Http\Controllers\cms\publicationController::class, 'destroy'])->name('destroy');
        });

        // Profil Bapenda
        Route::prefix('profile')->name('profile.')->group(function (){
            // Visi & Misi
            Route::get('/visi_misi', [App\Http\Controllers\cms\profileController::class, 'visi_misi'])->name('visi_misi');
            Route::prefix('visi_misi')->name('visi_misi.')->group(function (){
                Route::get('/create', [App\Http\Controllers\cms\profileController::class, 'visi_misi_create'])->name('create');
                Route::post('/create', [App\Http\Controllers\cms\profileController::class, 'visi_misi_store'])->name('store');
                Route::get('/{id}', [App\Http\Controllers\cms\profileController::class, 'visi_misi_show'])->name('show');
                Route::get('{id}/edit', [App\Http\Controllers\cms\profileController::class, 'visi_misi_edit'])->name('edit');
                Route::put('{id}/edit', [App\Http\Controllers\cms\profileController::class, 'visi_misi_update'])->name('update');
                Route::delete('/{id}', [App\Http\Controllers\cms\profileController::class, 'visi_misi_destroy'])->name('destroy');
            });

            // Visi & Misi
            Route::get('/sejarah', [App\Http\Controllers\cms\profileController::class, 'sejarah'])->name('sejarah');
            Route::prefix('sejarah')->name('sejarah.')->group(function (){
                Route::get('/create', [App\Http\Controllers\cms\profileController::class, 'sejarah_create'])->name('create');
                Route::post('/create', [App\Http\Controllers\cms\profileController::class, 'sejarah_store'])->name('store');
                Route::get('/{id}', [App\Http\Controllers\cms\profileController::class, 'sejarah_show'])->name('show');
                Route::get('{id}/edit', [App\Http\Controllers\cms\profileController::class, 'sejarah_edit'])->name('edit');
                Route::put('{id}/edit', [App\Http\Controllers\cms\profileController::class, 'sejarah_update'])->name('update');
                Route::delete('/{id}', [App\Http\Controllers\cms\profileController::class, 'sejarah_destroy'])->name('destroy');
            });

            // Kepala
            Route::get('/kepala', [App\Http\Controllers\cms\profileController::class, 'kepala'])->name('kepala');
            Route::prefix('kepala')->name('kepala.')->group(function (){
                Route::get('/create', [App\Http\Controllers\cms\profileController::class, 'kepala_create'])->name('create');
                Route::post('/create', [App\Http\Controllers\cms\profileController::class, 'kepala_store'])->name('store');
                Route::get('/{id}', [App\Http\Controllers\cms\profileController::class, 'kepala_show'])->name('show');
                Route::get('{id}/edit', [App\Http\Controllers\cms\profileController::class, 'kepala_edit'])->name('edit');
                Route::put('{id}/edit', [App\Http\Controllers\cms\profileController::class, 'kepala_update'])->name('update');
                Route::delete('/{id}', [App\Http\Controllers\cms\profileController::class, 'kepala_destroy'])->name('destroy');
            });

            // Struktur Organisasi
            Route::get('/struktur', [App\Http\Controllers\cms\profileController::class, 'struktur'])->name('struktur');
            Route::prefix('struktur')->name('struktur.')->group(function (){
                Route::get('/create', [App\Http\Controllers\cms\profileController::class, 'struktur_create'])->name('create');
                Route::post('/create', [App\Http\Controllers\cms\profileController::class, 'struktur_store'])->name('store');
                Route::get('/{id}', [App\Http\Controllers\cms\profileController::class, 'struktur_show'])->name('show');
                Route::get('{id}/edit', [App\Http\Controllers\cms\profileController::class, 'struktur_edit'])->name('edit');
                Route::put('{id}/edit', [App\Http\Controllers\cms\profileController::class, 'struktur_update'])->name('update');
                Route::delete('/{id}', [App\Http\Controllers\cms\profileController::class, 'struktur_destroy'])->name('destroy');
            });
        });

        // Profil UPTB
        Route::get('/uptb', [App\Http\Controllers\cms\informationController::class, 'uptb'])->name('uptb');
        Route::prefix('uptb')->name('uptb.')->group(function (){
            Route::get('/create', [App\Http\Controllers\cms\informationController::class, 'uptb_create'])->name('create');
            Route::post('/create', [App\Http\Controllers\cms\informationController::class, 'uptb_store'])->name('store');
            Route::get('/{id}', [App\Http\Controllers\cms\informationController::class, 'uptb_show'])->name('show');
            Route::get('{id}/edit', [App\Http\Controllers\cms\informationController::class, 'uptb_edit'])->name('edit');
            Route::put('{id}/edit', [App\Http\Controllers\cms\informationController::class, 'uptb_update'])->name('update');
            Route::delete('/{id}', [App\Http\Controllers\cms\informationController::class, 'uptb_destroy'])->name('destroy');
        });

        // Gallery
        Route::get('/gallery', [App\Http\Controllers\cms\galleryController::class, 'index'])->name('gallery');
        Route::prefix('gallery')->name('gallery.')->group(function (){
            Route::get('/create', [App\Http\Controllers\cms\galleryController::class, 'create'])->name('create');
            Route::post('/create', [App\Http\Controllers\cms\galleryController::class, 'store'])->name('store');
            Route::get('/{id}', [App\Http\Controllers\cms\galleryController::class, 'show'])->name('show');
            Route::get('{id}/edit', [App\Http\Controllers\cms\galleryController::class, 'edit'])->name('edit');
            Route::put('{id}/edit', [App\Http\Controllers\cms\galleryController::class, 'update'])->name('update');
            Route::delete('/{id}', [App\Http\Controllers\cms\galleryController::class, 'destroy'])->name('destroy');
        });

        // Profil Bapenda
        Route::prefix('other')->name('other.')->group(function (){
            // Jenis Pelayanan
            Route::get('/services', [App\Http\Controllers\cms\informationController::class, 'services'])->name('services');
            Route::prefix('services')->name('services.')->group(function (){
                Route::get('/create', [App\Http\Controllers\cms\informationController::class, 'services_create'])->name('create');
                Route::post('/create', [App\Http\Controllers\cms\informationController::class, 'services_store'])->name('store');
                Route::get('/{id}', [App\Http\Controllers\cms\informationController::class, 'services_show'])->name('show');
                Route::get('{id}/edit', [App\Http\Controllers\cms\informationController::class, 'services_edit'])->name('edit');
                Route::put('{id}/edit', [App\Http\Controllers\cms\informationController::class, 'services_update'])->name('update');
                Route::delete('/{id}', [App\Http\Controllers\cms\informationController::class, 'services_destroy'])->name('destroy');
            });

            // Pembayaran
            Route::get('/payment', [App\Http\Controllers\cms\paymentController::class, 'index'])->name('payment');
            Route::prefix('payment')->name('payment.')->group(function (){
                Route::get('/create', [App\Http\Controllers\cms\paymentController::class, 'create'])->name('create');
                Route::post('/create', [App\Http\Controllers\cms\paymentController::class, 'store'])->name('store');
                Route::get('/{id}', [App\Http\Controllers\cms\paymentController::class, 'show'])->name('show');
                Route::get('{id}/edit', [App\Http\Controllers\cms\paymentController::class, 'edit'])->name('edit');
                Route::put('{id}/edit', [App\Http\Controllers\cms\paymentController::class, 'update'])->name('update');
                Route::delete('/{id}', [App\Http\Controllers\cms\paymentController::class, 'destroy'])->name('destroy');
            });

            // Portal
            Route::get('/portal', [App\Http\Controllers\cms\portalController::class, 'index'])->name('portal');
            Route::prefix('portal')->name('portal.')->group(function (){
                Route::get('/create', [App\Http\Controllers\cms\portalController::class, 'create'])->name('create');
                Route::post('/create', [App\Http\Controllers\cms\portalController::class, 'store'])->name('store');
                Route::get('/{id}', [App\Http\Controllers\cms\portalController::class, 'show'])->name('show');
                Route::get('{id}/edit', [App\Http\Controllers\cms\portalController::class, 'edit'])->name('edit');
                Route::put('{id}/edit', [App\Http\Controllers\cms\portalController::class, 'update'])->name('update');
                Route::delete('/{id}', [App\Http\Controllers\cms\portalController::class, 'destroy'])->name('destroy');
            });

            // Video
            Route::get('/video', [App\Http\Controllers\cms\videoController::class, 'index'])->name('video');
            Route::prefix('video')->name('video.')->group(function (){
                Route::get('/create', [App\Http\Controllers\cms\videoController::class, 'create'])->name('create');
                Route::post('/create', [App\Http\Controllers\cms\videoController::class, 'store'])->name('store');
                Route::get('/{id}', [App\Http\Controllers\cms\videoController::class, 'show'])->name('show');
                Route::get('{id}/edit', [App\Http\Controllers\cms\videoController::class, 'edit'])->name('edit');
                Route::put('{id}/edit', [App\Http\Controllers\cms\videoController::class, 'update'])->name('update');
                Route::delete('/{id}', [App\Http\Controllers\cms\videoController::class, 'destroy'])->name('destroy');
            });

            // Infografis
            Route::get('/infografis', [App\Http\Controllers\cms\infografisController::class, 'index'])->name('infografis');
            Route::prefix('infografis')->name('infografis.')->group(function (){
                Route::get('/create', [App\Http\Controllers\cms\infografisController::class, 'create'])->name('create');
                Route::post('/create', [App\Http\Controllers\cms\infografisController::class, 'store'])->name('store');
                Route::get('/{id}', [App\Http\Controllers\cms\infografisController::class, 'show'])->name('show');
                Route::get('{id}/edit', [App\Http\Controllers\cms\infografisController::class, 'edit'])->name('edit');
                Route::put('{id}/edit', [App\Http\Controllers\cms\infografisController::class, 'update'])->name('update');
                Route::delete('/{id}', [App\Http\Controllers\cms\infografisController::class, 'destroy'])->name('destroy');
            });

            // FAQ
            Route::get('/faq', [App\Http\Controllers\cms\informationController::class, 'faq'])->name('faq');
            Route::prefix('faq')->name('faq.')->group(function (){
                Route::get('/create', [App\Http\Controllers\cms\informationController::class, 'faq_create'])->name('create');
                Route::post('/create', [App\Http\Controllers\cms\informationController::class, 'faq_store'])->name('store');
                Route::get('/{id}', [App\Http\Controllers\cms\informationController::class, 'faq_show'])->name('show');
                Route::get('{id}/edit', [App\Http\Controllers\cms\informationController::class, 'faq_edit'])->name('edit');
                Route::put('{id}/edit', [App\Http\Controllers\cms\informationController::class, 'faq_update'])->name('update');
                Route::delete('/{id}', [App\Http\Controllers\cms\informationController::class, 'faq_destroy'])->name('destroy');
            });
        });
    });
});