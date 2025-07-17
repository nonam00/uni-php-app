<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

Route::any('/', [GroupController::class, "home"])->name("home");

Route::prefix('dashboard')->middleware(['auth', 'verified', 'role:admin'])->group(function() {
    Route::get('/', function() {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('modules', ModuleController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('students', StudentController::class);
    Route::resource('groups', GroupController::class);
    Route::resource('users', UserController::class)->only(['index','edit','update']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
