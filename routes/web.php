<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\LegacyController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Homepage
Route::get('/', [HomepageController::class, 'index'])->name('homepage');

// News routes
Route::get('/newsroom', [NewsController::class, 'index'])->name('newsroom');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

// Other pages
Route::get('/careers', [CareersController::class, 'index'])->name('careers');
Route::get('/legacy', [LegacyController::class, 'index'])->name('legacy');

// Temporary debug route
Route::get('/debug-afpnet', function(Request $request) {
    $hasParam = $request->has('afpnet');
    $paramValue = $request->get('afpnet');
    $isTrue = $paramValue === 'true';
    
    return response()->json([
        'url' => $request->fullUrl(),
        'has_afpnet_param' => $hasParam,
        'afpnet_value' => $paramValue,
        'is_true_string' => $isTrue,
        'all_params' => $request->query(),
    ]);
});

// Authentication routes (from Breeze)
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';