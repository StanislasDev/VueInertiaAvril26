<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

// Afficher la liste des formations(Toutes les formations)
Route::get('/courses', [CourseController::class, 'index'])->name('courses');

Route::group(['auth' => 'verified'], function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
    // Courses
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::prefix('courses')->group(function () {

        Route::get('/{course}', [CourseController::class, 'show'])->name('courses.show');
        Route::post('/toggle-progress', [CourseController::class, 'toggleProgress'])->name('courses.toggle');

        // Créer une formation
        // Route::get('/create', [CourseController::class, 'create'])->name('courses.create');
        // Route::post('/', [CourseController::class, 'store'])->name('courses.store');
    });
});

require __DIR__.'/settings.php';
