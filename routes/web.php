<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyDetailController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/listing', \App\Livewire\ListingPage::class)->name('listing');

// Route::get('/detail', function () {
//     return view('pages.detail');
// })->name('detail');

Route::get('/property/{slug}', [PropertyDetailController::class, 'show'])
    ->name('property.detail');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

require __DIR__ . '/auth.php';
