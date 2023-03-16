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

Route::get('/phpmyinfo', function () {
    phpinfo(); 
})->name('phpmyinfo');

Route::get('/', [\App\Http\Controllers\homeController::class, 'index'])->name('home');

// News
Route::prefix('news')->name('news.')->group(function (){
    Route::get('', [\App\Http\Controllers\ArticleController::class, 'index'])->name('index');
    Route::get('/{slug}', [\App\Http\Controllers\ArticleController::class, 'show'])->name('show');
});

// Profil UPTB
Route::prefix('uptb')->name('uptb.')->group(function (){
    Route::get('', [\App\Http\Controllers\uptbController::class, 'index'])->name('index');
    Route::get('/{id}', [\App\Http\Controllers\uptbController::class, 'show'])->name('show');
});

// Realisasi Pendapatan Daerah
Route::prefix('realisasi')->name('realisasi.')->group(function (){
    Route::get('', [\App\Http\Controllers\realizationController::class, 'index'])->name('index');
    Route::get('/{id}', [\App\Http\Controllers\realizationController::class, 'show'])->name('show');
});

// Gallery
Route::get('/gallery', [\App\Http\Controllers\galleryController::class, 'index'])->name('gallery');

// Profil UPTB
Route::prefix('about')->name('about.')->group(function (){
    Route::get('/visi-misi', [\App\Http\Controllers\aboutController::class, 'visi_misi'])->name('visi_misi');
    Route::get('/sejarah', [\App\Http\Controllers\aboutController::class, 'sejarah'])->name('sejarah');
    Route::get('/kepala-bapenda', [\App\Http\Controllers\aboutController::class, 'kepala_bapenda'])->name('kepala');
    Route::get('/struktur-organisasi', [\App\Http\Controllers\aboutController::class, 'struktur_organisasi'])->name('struktur');
});

// Download
Route::get('/download', [\App\Http\Controllers\publicationController::class, 'index'])->name('download');

// Infografis
Route::get('/infografis', [\App\Http\Controllers\informationController::class, 'infografis'])->name('infografis');

// Video
Route::get('/video', [\App\Http\Controllers\informationController::class, 'video'])->name('video');

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
            Route::get('{id}/image', [App\Http\Controllers\cms\pegawaiController::class, 'image'])->name('image');
            Route::put('{id}/image', [App\Http\Controllers\cms\pegawaiController::class, 'update_image'])->name('update.image');
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

        // Background
        Route::get('/background', [App\Http\Controllers\cms\backgroundController::class, 'index'])->name('background');
        Route::prefix('background')->name('background.')->group(function (){
            Route::get('{id}/edit', [App\Http\Controllers\cms\backgroundController::class, 'edit'])->name('edit');
            Route::put('{id}/edit', [App\Http\Controllers\cms\backgroundController::class, 'update'])->name('update');
            Route::delete('/{id}', [App\Http\Controllers\cms\backgroundController::class, 'destroy'])->name('destroy');
        });

        // Realisasi
        Route::get('/realisasi', [App\Http\Controllers\cms\realizationController::class, 'index'])->name('realisasi');
        Route::prefix('realisasi')->name('realisasi.')->group(function (){
            Route::get('/create', [App\Http\Controllers\cms\realizationController::class, 'create'])->name('create');
            Route::post('/create', [App\Http\Controllers\cms\realizationController::class, 'store'])->name('store');
            Route::get('/{id}', [App\Http\Controllers\cms\realizationController::class, 'show'])->name('show');
            Route::get('{id}/edit', [App\Http\Controllers\cms\realizationController::class, 'edit'])->name('edit');
            Route::put('{id}/edit', [App\Http\Controllers\cms\realizationController::class, 'update'])->name('update');
            Route::delete('/{id}', [App\Http\Controllers\cms\realizationController::class, 'destroy'])->name('destroy');
        });

        // Profil Bapenda
        Route::prefix('profile')->name('profile.')->group(function (){
            // Visi
            Route::get('/vision', [App\Http\Controllers\cms\profileController::class, 'vision'])->name('vision');
            Route::prefix('vision')->name('vision.')->group(function (){
                Route::get('/create', [App\Http\Controllers\cms\profileController::class, 'vision_create'])->name('create');
                Route::post('/create', [App\Http\Controllers\cms\profileController::class, 'vision_store'])->name('store');
                Route::get('{id}/edit', [App\Http\Controllers\cms\profileController::class, 'vision_edit'])->name('edit');
                Route::put('{id}/edit', [App\Http\Controllers\cms\profileController::class, 'vision_update'])->name('update');
                Route::delete('/{id}', [App\Http\Controllers\cms\profileController::class, 'vision_destroy'])->name('destroy');
            });

            // Misi
            Route::get('/mission', [App\Http\Controllers\cms\profileController::class, 'mission'])->name('mission');
            Route::prefix('mission')->name('mission.')->group(function (){
                Route::get('/create', [App\Http\Controllers\cms\profileController::class, 'mission_create'])->name('create');
                Route::post('/create', [App\Http\Controllers\cms\profileController::class, 'mission_store'])->name('store');
                Route::get('{id}/edit', [App\Http\Controllers\cms\profileController::class, 'mission_edit'])->name('edit');
                Route::put('{id}/edit', [App\Http\Controllers\cms\profileController::class, 'mission_update'])->name('update');
                Route::delete('/{id}', [App\Http\Controllers\cms\profileController::class, 'mission_destroy'])->name('destroy');
            });

            // Sejarah
            Route::get('/sejarah', [App\Http\Controllers\cms\profileController::class, 'sejarah'])->name('sejarah');
            Route::prefix('sejarah')->name('sejarah.')->group(function (){
                Route::get('/create', [App\Http\Controllers\cms\profileController::class, 'sejarah_create'])->name('create');
                Route::post('/create', [App\Http\Controllers\cms\profileController::class, 'sejarah_store'])->name('store');
                Route::get('{id}/edit', [App\Http\Controllers\cms\profileController::class, 'sejarah_edit'])->name('edit');
                Route::put('{id}/edit', [App\Http\Controllers\cms\profileController::class, 'sejarah_update'])->name('update');
                Route::get('{id}/image', [App\Http\Controllers\cms\profileController::class, 'sejarah_image'])->name('image');
                Route::put('{id}/image', [App\Http\Controllers\cms\profileController::class, 'sejarah_update_image'])->name('update.image');
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
                Route::get('{id}/image', [App\Http\Controllers\cms\profileController::class, 'kepala_image'])->name('image');
                Route::put('{id}/image', [App\Http\Controllers\cms\profileController::class, 'kepala_update_image'])->name('update.image');
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
        Route::get('/uptb', [App\Http\Controllers\cms\uptbController::class, 'index'])->name('uptb');
        Route::prefix('uptb')->name('uptb.')->group(function (){
            Route::get('/create', [App\Http\Controllers\cms\uptbController::class, 'create'])->name('create');
            Route::post('/create', [App\Http\Controllers\cms\uptbController::class, 'store'])->name('store');
            Route::get('/{id}', [App\Http\Controllers\cms\uptbController::class, 'show'])->name('show');
            Route::get('{id}/edit', [App\Http\Controllers\cms\uptbController::class, 'edit'])->name('edit');
            Route::put('{id}/edit', [App\Http\Controllers\cms\uptbController::class, 'update'])->name('update');
            Route::get('{id}/image', [App\Http\Controllers\cms\uptbController::class, 'image'])->name('image');
            Route::put('{id}/image', [App\Http\Controllers\cms\uptbController::class, 'update_image'])->name('update.image');
            Route::get('{id}/maps', [App\Http\Controllers\cms\uptbController::class, 'maps_image'])->name('maps');
            Route::put('{id}/maps', [App\Http\Controllers\cms\uptbController::class, 'maps_update_image'])->name('update.maps');
            Route::delete('/{id}', [App\Http\Controllers\cms\uptbController::class, 'destroy'])->name('destroy');
        });

        // Gallery
        Route::get('/gallery', [App\Http\Controllers\cms\galleryController::class, 'index'])->name('gallery');
        Route::prefix('gallery')->name('gallery.')->group(function (){
            Route::get('/create', [App\Http\Controllers\cms\galleryController::class, 'create'])->name('create');
            Route::post('/create', [App\Http\Controllers\cms\galleryController::class, 'store'])->name('store');
            Route::get('/{id}', [App\Http\Controllers\cms\galleryController::class, 'show'])->name('show');
            Route::get('{id}/edit', [App\Http\Controllers\cms\galleryController::class, 'edit'])->name('edit');
            Route::put('{id}/edit', [App\Http\Controllers\cms\galleryController::class, 'update'])->name('update');
            Route::get('{id}/image', [App\Http\Controllers\cms\galleryController::class, 'image'])->name('image');
            Route::put('{id}/image', [App\Http\Controllers\cms\galleryController::class, 'update_image'])->name('update.image');
            Route::get('{id}/thumbnail', [App\Http\Controllers\cms\galleryController::class, 'thumbnail'])->name('thumbnail');
            Route::put('{id}/thumbnail', [App\Http\Controllers\cms\galleryController::class, 'update_thumbnail'])->name('update.thumbnail');
            Route::delete('/{id}', [App\Http\Controllers\cms\galleryController::class, 'destroy'])->name('destroy');
        });

        // Profil Bapenda
        Route::prefix('other')->name('other.')->group(function (){
            // Jenis Pelayanan
            Route::get('/service', [App\Http\Controllers\cms\informationController::class, 'service'])->name('service');
            Route::prefix('service')->name('service.')->group(function (){
                Route::get('/create', [App\Http\Controllers\cms\informationController::class, 'service_create'])->name('create');
                Route::post('/create', [App\Http\Controllers\cms\informationController::class, 'service_store'])->name('store');
                Route::get('/{id}', [App\Http\Controllers\cms\informationController::class, 'service_show'])->name('show');
                Route::get('{id}/edit', [App\Http\Controllers\cms\informationController::class, 'service_edit'])->name('edit');
                Route::put('{id}/edit', [App\Http\Controllers\cms\informationController::class, 'service_update'])->name('update');
                Route::get('{id}/image', [App\Http\Controllers\cms\informationController::class, 'service_image'])->name('image');
                Route::put('{id}/image', [App\Http\Controllers\cms\informationController::class, 'service_update_image'])->name('update.image');
                Route::delete('/{id}', [App\Http\Controllers\cms\informationController::class, 'service_destroy'])->name('destroy');
            });

            Route::get('/flow', [App\Http\Controllers\cms\informationController::class, 'flow'])->name('flow');
            Route::prefix('flow')->name('flow.')->group(function (){
                Route::get('/create', [App\Http\Controllers\cms\informationController::class, 'flow_create'])->name('create');
                Route::post('/create', [App\Http\Controllers\cms\informationController::class, 'flow_store'])->name('store');
                Route::get('/{id}', [App\Http\Controllers\cms\informationController::class, 'flow_show'])->name('show');
                Route::get('{id}/edit', [App\Http\Controllers\cms\informationController::class, 'flow_edit'])->name('edit');
                Route::put('{id}/edit', [App\Http\Controllers\cms\informationController::class, 'flow_update'])->name('update');
                Route::get('{id}/image', [App\Http\Controllers\cms\informationController::class, 'flow_image'])->name('image');
                Route::put('{id}/image', [App\Http\Controllers\cms\informationController::class, 'flow_update_image'])->name('update.image');
                Route::delete('/{id}', [App\Http\Controllers\cms\informationController::class, 'flow_destroy'])->name('destroy');
            });

            // Pembayaran
            Route::get('/payment', [App\Http\Controllers\cms\paymentController::class, 'index'])->name('payment');
            Route::prefix('payment')->name('payment.')->group(function (){
                Route::get('/create', [App\Http\Controllers\cms\paymentController::class, 'create'])->name('create');
                Route::post('/create', [App\Http\Controllers\cms\paymentController::class, 'store'])->name('store');
                Route::get('/{id}', [App\Http\Controllers\cms\paymentController::class, 'show'])->name('show');
                Route::get('{id}/edit', [App\Http\Controllers\cms\paymentController::class, 'edit'])->name('edit');
                Route::put('{id}/edit', [App\Http\Controllers\cms\paymentController::class, 'update'])->name('update');
                Route::get('{id}/image', [App\Http\Controllers\cms\paymentController::class, 'image'])->name('image');
                Route::put('{id}/image', [App\Http\Controllers\cms\paymentController::class, 'update_image'])->name('update.image');
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
                Route::get('{id}/image', [App\Http\Controllers\cms\portalController::class, 'image'])->name('image');
                Route::put('{id}/image', [App\Http\Controllers\cms\portalController::class, 'update_image'])->name('update.image');
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
                Route::get('{id}/image', [App\Http\Controllers\cms\infografisController::class, 'image'])->name('image');
                Route::put('{id}/image', [App\Http\Controllers\cms\infografisController::class, 'update_image'])->name('update.image');
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

        // Berita Bapenda
        Route::name('news.')->prefix('news')->group(function (){
            Route::prefix('category')->name('category.')->group(function (){
                Route::get('', [\App\Http\Controllers\cms\categoryController::class, 'index'])->name('index');
                Route::get('/create', [\App\Http\Controllers\cms\categoryController::class, 'create'])->name('create');
                Route::post('/store', [\App\Http\Controllers\cms\categoryController::class, 'store'])->name('store');
                Route::get('/{id}', [\App\Http\Controllers\cms\categoryController::class, 'edit'])->name('edit');
                Route::put('/{id}', [\App\Http\Controllers\cms\categoryController::class, 'update'])->name('update');
                Route::delete('/{id}', [\App\Http\Controllers\cms\categoryController::class, 'destroy'])->name('destroy');
            });
            Route::prefix('tags')->name('tags.')->group(function (){
                Route::get('', [\App\Http\Controllers\cms\tagController::class, 'index'])->name('index');
                Route::get('/create', [\App\Http\Controllers\cms\tagController::class, 'create'])->name('create');
                Route::post('/store', [\App\Http\Controllers\cms\tagController::class, 'store'])->name('store');
                Route::get('/{id}', [\App\Http\Controllers\cms\tagController::class, 'edit'])->name('edit');
                Route::put('/{id}', [\App\Http\Controllers\cms\tagController::class, 'update'])->name('update');
                Route::delete('/{id}', [\App\Http\Controllers\cms\tagController::class, 'destroy'])->name('destroy');
            });
            Route::prefix('post')->name('post.')->group(function (){
                Route::get('', [\App\Http\Controllers\cms\postController::class, 'index'])->name('index');
                Route::get('/create', [\App\Http\Controllers\cms\postController::class, 'create'])->name('create');
                Route::post('/store', [\App\Http\Controllers\cms\postController::class, 'store'])->name('store');
                Route::get('/{id}', [\App\Http\Controllers\cms\postController::class, 'edit'])->name('edit');
                Route::put('/{id}', [\App\Http\Controllers\cms\postController::class, 'update'])->name('update');
                Route::delete('/{id}', [\App\Http\Controllers\cms\postController::class, 'destroy'])->name('destroy');
            });
        });
    });
});