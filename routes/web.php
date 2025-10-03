<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\TranslationManageController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\SocialshareController;
use App\Http\Controllers\Admin\SocialfooterController;
use App\Http\Controllers\Front\FrontController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Frontend Routes
Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/haqqimizda', [FrontController::class, 'about'])->name('front.about');
Route::get('/xidmetler', [FrontController::class, 'services'])->name('front.services');
Route::get('/investorlar', [FrontController::class, 'investors'])->name('front.investors');
Route::get('/faq', [FrontController::class, 'faq'])->name('front.faq');
Route::get('/elaqe', [FrontController::class, 'contact'])->name('front.contact');
Route::post('/elaqe', [FrontController::class, 'contactStore'])->name('front.contact.store');

// AJAX Routes
Route::post('/newsletter-subscribe', [FrontController::class, 'newsletterSubscribe'])->name('front.newsletter.subscribe');
Route::post('/track-package', [FrontController::class, 'trackPackage'])->name('front.track.package');

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        if (auth()->guard('admin')->check()) {
            return redirect()->route('back.pages.index');
        }
        return redirect()->route('admin.login');
    });

    Route::get('login', [AdminController::class, 'showLoginForm'])->name('admin.login')->middleware('guest:admin');
    Route::post('login', [AdminController::class, 'login'])->name('handle-login');

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        Route::get('profile', function () {
            return view('back.admin.profile');
        })->name('admin.profile');

        Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

        Route::prefix('pages')->name('back.pages.')->group(function () {
            Route::get('index', [PageController::class, 'index'])->name('index');

            // Translation Management Routes
            Route::get('translation-manage', [TranslationManageController::class, 'index'])->name('translation-manage.index');
            Route::get('translation-manage/create', [TranslationManageController::class, 'create'])->name('translation-manage.create');
            Route::post('translation-manage', [TranslationManageController::class, 'store'])->name('translation-manage.store');
            Route::get('translation-manage/{translation}/edit', [TranslationManageController::class, 'edit'])->name('translation-manage.edit');
            Route::put('translation-manage/{translation}', [TranslationManageController::class, 'update'])->name('translation-manage.update');
            Route::delete('translation-manage/{translation}', [TranslationManageController::class, 'destroy'])->name('translation-manage.destroy');

             // SEO routes
             Route::get('seo', [SeoController::class, 'index'])->name('seo.index');
             Route::get('seo/create', [SeoController::class, 'create'])->name('seo.create');
             Route::post('seo', [SeoController::class, 'store'])->name('seo.store');
             Route::get('seo/{id}/edit', [SeoController::class, 'edit'])->name('seo.edit');
             Route::put('seo/{id}', [SeoController::class, 'update'])->name('seo.update');
             Route::delete('seo/{id}', [SeoController::class, 'destroy'])->name('seo.destroy');
             Route::get('seo/toggle-status/{id}', [SeoController::class, 'toggleStatus'])->name('seo.toggle-status');
             Route::post('seo/toggle-status/{id}', [SeoController::class, 'toggleStatus'])->name('seo.toggle-status.post');

             // Logo routes
             Route::get('logos', [LogoController::class, 'index'])->name('logos.index');
             Route::get('logos/create', [LogoController::class, 'create'])->name('logos.create');
             Route::post('logos', [LogoController::class, 'store'])->name('logos.store');
             Route::get('logos/{id}', [LogoController::class, 'show'])->name('logos.show');
             Route::get('logos/{id}/edit', [LogoController::class, 'edit'])->name('logos.edit');
             Route::put('logos/{id}', [LogoController::class, 'update'])->name('logos.update');
             Route::delete('logos/{id}', [LogoController::class, 'destroy'])->name('logos.destroy');

            
             // Social Media routes
             Route::get('social', [SocialMediaController::class, 'index'])->name('social.index');
             Route::get('social/create', [SocialMediaController::class, 'create'])->name('social.create');
             Route::post('social', [SocialMediaController::class, 'store'])->name('social.store');
             Route::get('social/{id}/edit', [SocialMediaController::class, 'edit'])->name('social.edit');
             Route::put('social/{id}', [SocialMediaController::class, 'update'])->name('social.update');
             Route::delete('social/{id}', [SocialMediaController::class, 'destroy'])->name('social.destroy');
             Route::post('social/order', [SocialMediaController::class, 'order'])->name('social.order');
             Route::post('social/toggle-status/{id}', [SocialMediaController::class, 'toggleStatus'])->name('social.toggle-status');

              // Social Share routes
            Route::get('socialshare', [SocialshareController::class, 'index'])->name('socialshare.index');
            Route::get('socialshare/create', [SocialshareController::class, 'create'])->name('socialshare.create');
            Route::post('socialshare', [SocialshareController::class, 'store'])->name('socialshare.store');
            Route::get('socialshare/{id}/edit', [SocialshareController::class, 'edit'])->name('socialshare.edit');
            Route::put('socialshare/{id}', [SocialshareController::class, 'update'])->name('socialshare.update');
            Route::delete('socialshare/{id}', [SocialshareController::class, 'destroy'])->name('socialshare.destroy');
            Route::post('socialshare/order', [SocialshareController::class, 'order'])->name('socialshare.order');
            Route::post('socialshare/{id}/toggle-status', [SocialshareController::class, 'toggleStatus'])->name('socialshare.toggleStatus');

              // Social Footer routes
              Route::get('socialfooter', [SocialfooterController::class, 'index'])->name('socialfooter.index');
              Route::get('socialfooter/create', [SocialfooterController::class, 'create'])->name('socialfooter.create');
              Route::post('socialfooter', [SocialfooterController::class, 'store'])->name('socialfooter.store');
              Route::get('socialfooter/{id}/edit', [SocialfooterController::class, 'edit'])->name('socialfooter.edit');
              Route::put('socialfooter/{id}', [SocialfooterController::class, 'update'])->name('socialfooter.update');
              Route::delete('socialfooter/{id}', [SocialfooterController::class, 'destroy'])->name('socialfooter.destroy');
              Route::post('socialfooter/order', [SocialfooterController::class, 'order'])->name('socialfooter.order');
              Route::post('socialfooter/toggle-status/{id}', [SocialfooterController::class, 'toggleStatus'])->name('socialfooter.toggle-status');
        });

        // Hero Section routes
        Route::prefix('hero')->name('admin.hero.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\HeroSectionController::class, 'index'])->name('index');
            Route::get('create', [App\Http\Controllers\Admin\HeroSectionController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\HeroSectionController::class, 'store'])->name('store');
            Route::get('{hero}', [App\Http\Controllers\Admin\HeroSectionController::class, 'show'])->name('show');
            Route::get('{hero}/edit', [App\Http\Controllers\Admin\HeroSectionController::class, 'edit'])->name('edit');
            Route::put('{hero}', [App\Http\Controllers\Admin\HeroSectionController::class, 'update'])->name('update');
        });

        // Hero Features routes
        Route::prefix('hero-features')->name('admin.hero-features.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\HeroFeatureController::class, 'index'])->name('index');
            Route::get('create', [App\Http\Controllers\Admin\HeroFeatureController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\HeroFeatureController::class, 'store'])->name('store');
            Route::get('{heroFeature}', [App\Http\Controllers\Admin\HeroFeatureController::class, 'show'])->name('show');
            Route::get('{heroFeature}/edit', [App\Http\Controllers\Admin\HeroFeatureController::class, 'edit'])->name('edit');
            Route::put('{heroFeature}', [App\Http\Controllers\Admin\HeroFeatureController::class, 'update'])->name('update');
            Route::delete('{heroFeature}', [App\Http\Controllers\Admin\HeroFeatureController::class, 'destroy'])->name('destroy');
        });

        // Navbar routes
        Route::prefix('navbar')->name('admin.navbar.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\NavbarItemController::class, 'index'])->name('index');
            Route::get('create', [App\Http\Controllers\Admin\NavbarItemController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\NavbarItemController::class, 'store'])->name('store');
            Route::get('{navbar}', [App\Http\Controllers\Admin\NavbarItemController::class, 'show'])->name('show');
            Route::get('{navbar}/edit', [App\Http\Controllers\Admin\NavbarItemController::class, 'edit'])->name('edit');
            Route::put('{navbar}', [App\Http\Controllers\Admin\NavbarItemController::class, 'update'])->name('update');
            Route::post('{navbar}/toggle-status', [App\Http\Controllers\Admin\NavbarItemController::class, 'toggleStatus'])->name('toggle-status');
        });

        // Site Logo routes
        Route::prefix('site-logo')->name('admin.site-logo.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\SiteLogoController::class, 'index'])->name('index');
            Route::get('create', [App\Http\Controllers\Admin\SiteLogoController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\SiteLogoController::class, 'store'])->name('store');
            Route::get('{siteLogo}', [App\Http\Controllers\Admin\SiteLogoController::class, 'show'])->name('show');
            Route::get('{siteLogo}/edit', [App\Http\Controllers\Admin\SiteLogoController::class, 'edit'])->name('edit');
            Route::put('{siteLogo}', [App\Http\Controllers\Admin\SiteLogoController::class, 'update'])->name('update');
            Route::delete('{siteLogo}', [App\Http\Controllers\Admin\SiteLogoController::class, 'destroy'])->name('destroy');
            Route::post('{siteLogo}/toggle-status', [App\Http\Controllers\Admin\SiteLogoController::class, 'toggleStatus'])->name('toggle-status');
        });

        // Services routes
        Route::prefix('services')->name('admin.services.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\ServiceController::class, 'index'])->name('index');
            Route::get('create', [App\Http\Controllers\Admin\ServiceController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\ServiceController::class, 'store'])->name('store');
            Route::get('{service}', [App\Http\Controllers\Admin\ServiceController::class, 'show'])->name('show');
            Route::get('{service}/edit', [App\Http\Controllers\Admin\ServiceController::class, 'edit'])->name('edit');
            Route::put('{service}', [App\Http\Controllers\Admin\ServiceController::class, 'update'])->name('update');
            Route::delete('{service}', [App\Http\Controllers\Admin\ServiceController::class, 'destroy'])->name('destroy');
            Route::post('{service}/toggle-status', [App\Http\Controllers\Admin\ServiceController::class, 'toggleStatus'])->name('toggle-status');
        });
    });
});
