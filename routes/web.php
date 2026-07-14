<?php

use App\Http\Controllers\SettingController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagingBodyController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])
    ->middleware(['auth', 'role:admin'])->name('dashboard');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [ServiceController::class, 'services'])->name('services');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/all-branches', [BranchController::class, 'userBranches'])->name('branches.user');
Route::get('/projects', [ProductController::class, 'userProductsByCategory'])->name('products.user');
Route::get('/project/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/managing-body', [ManagingBodyController::class, 'frontendIndex'])->name('managing-body');
Route::get('/kk-gallery', [GalleryController::class, 'showUserGallery'])->name('gallery.user');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('profile')->name('profile.')->controller(ProfileController::class)->group(function () {
        Route::get('/', 'edit')->name('edit');
        Route::patch('/', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');
    });

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::post('/messages/{id}/mark-read', [ContactController::class, 'markAsRead'])->name('messages.markRead');


    Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('settings/update', [SettingController::class, 'update'])->name('settings.update');
        Route::delete('skills/{id}/delete', [SettingController::class, 'skillDestroy'])->name('admin.skills.destroy');


        Route::prefix('branches')->name('branches.')->controller(BranchController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{branch}/edit', 'edit')->name('edit');
            Route::put('/{branch}', 'update')->name('update');
            Route::delete('/{branch}', 'destroy')->name('destroy');

            Route::get('/{branch}/autologin', 'autologin')->name('autologin');
        });

        Route::prefix('brands')->name('brands.')->controller(BrandController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{brand}/edit', 'edit')->name('edit');
            Route::put('/{brand}', 'update')->name('update');
            Route::delete('/{brand}', 'destroy')->name('destroy');
        });

        Route::prefix('sliders')->name('sliders.')->controller(SliderController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::put('/{slider}', 'update')->name('update');
            Route::delete('/{slider}', 'destroy')->name('destroy');
        });

        Route::get('messages', [MessageController::class, 'messages'])->name('messages');
        Route::delete('messages/{id}', [ContactController::class, 'destroy'])->name('messages.destroy');

        Route::prefix('services')->name('services.')->controller(ServiceController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::post('/{service}', 'update')->name('update');
            Route::delete('/{service}', 'destroy')->name('destroy');
        });

        Route::prefix('categories')->name('categories.')->controller(CategoryController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{category}/edit', 'edit')->name('edit');
            Route::put('/{category}', 'update')->name('update');
            Route::delete('/{category}', 'destroy')->name('destroy');
        });

        Route::prefix('products')->name('products.')->controller(ProductController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{product}/edit', 'edit')->name('edit');
            Route::put('/{product}', 'update')->name('update');
            Route::delete('/{product}', 'destroy')->name('destroy');

            Route::delete('images/{id}', [ProductController::class, 'destroyImage'])->name('images.destroy');
        });

        Route::prefix('managing-body')->name('managing-body.')->controller(ManagingBodyController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{managingBody}/edit', 'edit')->name('edit');
            Route::put('/{managingBody}', 'update')->name('update');
            Route::delete('/{managingBody}', 'destroy')->name('destroy');
        });

        Route::prefix('gallery')->name('gallery.')->group(function () {
            Route::get('/', [GalleryController::class, 'index'])->name('index');
            Route::get('/create', [GalleryController::class, 'create'])->name('create');
            Route::post('/store', [GalleryController::class, 'store'])->name('store');
            Route::get('/{gallery}/edit', [GalleryController::class, 'edit'])->name('edit');      // Edit route
            Route::put('/{gallery}/update', [GalleryController::class, 'update'])->name('update'); // Update route
            Route::delete('/{gallery}/delete', [GalleryController::class, 'destroy'])->name('destroy');
        });

    });
});


require __DIR__ . '/auth.php';
