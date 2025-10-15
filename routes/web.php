<?php

use App\Models\SiteContent;
use App\Models\Property;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    // Featured properties for sale
    $featuredForSale = Property::where(function ($q) {
        if (Schema::hasColumn('properties', 'is_published')) {
            $q->where('is_published', true);
        }
    })->where('transaction_type', 'sale')
        ->latest()
        ->take(4)
        ->get();

    // Featured properties for rent
    $featuredForRent = Property::where(function ($q) {
        if (Schema::hasColumn('properties', 'is_published')) {
            $q->where('is_published', true);
        }
    })->where('transaction_type', 'rent')
        ->latest()
        ->take(4)
        ->get();

    // Latest properties
    $latestProperties = Property::where(function ($q) {
        if (Schema::hasColumn('properties', 'is_published')) {
            $q->where('is_published', true);
        }
    })->latest()
        ->take(12)
        ->get();

    return view('pages.home', compact('featuredForSale', 'featuredForRent', 'latestProperties'));
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/listing', function () {
    return view('pages.listing');
})->name('listing');

Route::get('/detail', function () {
    return view('pages.detail');
})->name('detail');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

require __DIR__ . '/auth.php';
