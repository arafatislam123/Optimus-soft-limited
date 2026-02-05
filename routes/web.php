<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomepageSettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\JobCircularController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/careers', [HomeController::class, 'careers'])->name('careers');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin Routes - Protected by auth and admin middleware
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/contacts', [AdminController::class, 'contacts'])->name('contacts');
    Route::patch('/contacts/{contact}/read', [AdminController::class, 'markContactAsRead'])->name('contacts.read');
    
    Route::get('/homepage-settings', [HomepageSettingController::class, 'index'])->name('homepage-settings.index');
    Route::post('/homepage-settings', [HomepageSettingController::class, 'update'])->name('homepage-settings.update');
    
    Route::resource('services', ServiceController::class);
    Route::resource('job-circulars', JobCircularController::class);
});

// Include Breeze auth routes
require __DIR__.'/auth.php';
