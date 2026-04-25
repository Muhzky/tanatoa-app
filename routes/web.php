<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\ChoiceController;
use App\Http\Controllers\SceneController;
use App\Http\Controllers\EducationController;

// =================================================================
// 🏠 PUBLIC ROUTES
// =================================================================

// Homepage & Stories
Route::get('/', [StoryController::class, 'index'])->name('home');
Route::get('/cerita', [StoryController::class, 'stories'])->name('stories.index');

// Start story (langsung ke scene pertama)
Route::get('/cerita/{story}', [StoryController::class, 'start'])
    ->name('stories.start');

// Show Scene (URL konsisten: /cerita/{story}/scene/{scene})
Route::get('/cerita/{story}/scene/{scene}', [StoryController::class, 'showScene'])
    ->name('stories.scene');

// =================================================================
// 🎮 GAMEPLAY ACTIONS (POST Only)
// =================================================================

// 1. Handle Choice Selection (Pilih cabang cerita)
// Menggunakan ChoiceController yang sudah ada + throttle protection
Route::post('/choice/{choice}/select', [ChoiceController::class, 'select'])
    ->name('choices.select')
    ->middleware(['throttle:30,1']);

// 2. Handle Linear Next Scene (Lanjut tanpa pilihan)
// Menggunakan SceneController untuk logika perpindahan linear
Route::post('/cerita/{story}/scene/{scene}/next', [SceneController::class, 'nextScene'])
    ->name('scenes.next');

// 3. Restart Story (Mulai ulang cerita)
Route::post('/cerita/{story}/restart', [SceneController::class, 'restart'])
    ->name('story.restart');

// =================================================================
// 🤖 API ROUTES (Optional)
// =================================================================
Route::prefix('api')->group(function () {
    Route::get('/story/{slug}/scene/{order}', [StoryController::class, 'apiScene'])
        ->name('api.stories.scene');
});

// =================================================================
// 🔐 ADMIN ROUTES (Protected)
// =================================================================
Route::prefix('admin')
    ->middleware(['auth', 'can:access-admin'])
    ->group(function () {
        
        // Choices Management
        Route::post('/scenes/{scene}/choices', [ChoiceController::class, 'store'])
            ->name('admin.choices.store');
        Route::put('/choices/{choice}', [ChoiceController::class, 'update'])
            ->name('admin.choices.update');
        Route::delete('/choices/{choice}', [ChoiceController::class, 'destroy'])
            ->name('admin.choices.destroy');
        Route::post('/scenes/{scene}/choices/reorder', [ChoiceController::class, 'reorder'])
            ->name('admin.choices.reorder');
        
        // Preview Tools
        Route::get('/choices/{choice}/preview', [ChoiceController::class, 'preview'])
            ->name('admin.choices.preview');
    });

// ────────────────────────────────────────────────────────────────────────
// 🎓 EDUKASI & NILAI BUDAYA (Reviewer Focus!)
// ────────────────────────────────────────────────────────────────────────

Route::get('/edukasi', [EducationController::class, 'index'])->name('education.index');

// Sub-sections edukasi (untuk anchor navigation / SEO)
Route::get('/edukasi/filosofi', [EducationController::class, 'filosofi'])
    ->name('education.filosofi');
Route::get('/edukasi/nilai-kehidupan', [EducationController::class, 'nilai'])
    ->name('education.nilai');
Route::get('/edukasi/makna-simbolik', [EducationController::class, 'simbolik'])
    ->name('education.simbolik');

// 🔗 Deep link: edukasi → langsung ke scene terkait
Route::get('/edukasi/koneksi/{story:slug}', [EducationController::class, 'koneksi'])
    ->name('education.koneksi');