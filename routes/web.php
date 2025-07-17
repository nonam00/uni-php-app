<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Здесь будут новые маршруты для учебных модулей, преподавателей, студентов и групп
*/

Route::get('/', function() {
    return view('welcome');
})->name('home');

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function() {
    Route::get('/', function() {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('modules', App\Http\Controllers\ModuleController::class);
    Route::resource('teachers', App\Http\Controllers\TeacherController::class);
    Route::resource('students', App\Http\Controllers\StudentController::class);
    Route::resource('groups', App\Http\Controllers\GroupController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
