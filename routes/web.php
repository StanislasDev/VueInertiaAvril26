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
    Route::prefix('courses')->group(function () {

        Route::get('/{course}', [CourseController::class, 'show'])->name('courses.show');
    });
});

require __DIR__.'/settings.php';
