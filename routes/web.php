<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Inertia\Inertia;
use App\Http\Controllers\GraduateSkillController;
use App\Http\Controllers\Auth\EmailVerificationPromptController; // Importación del controlador de verificación de correo
use App\Http\Controllers\WorkHistoryController; // ✅ Línea agregada
use App\Http\Controllers\AcademicHistoryController; // Agregada la importación del controlador

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard Egresado (ya existente)
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Dashboard Admin
    Route::get('/admin/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('admin.dashboard');

    // Dashboard Coordinador
    Route::get('/coordinador/dashboard', function () {
        return Inertia::render('Coordinador/Dashboard');
    })->name('coordinador.dashboard');

    // Rutas para el perfil del usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para habilidades del egresado
    Route::get('/graduate-skills/create', [GraduateSkillController::class, 'create'])->name('graduate-skills.create');
    Route::post('/graduate-skills', [GraduateSkillController::class, 'store'])->name('graduate-skills.store');

    // Rutas para historial laboral
    Route::get('/work-history/create', [WorkHistoryController::class, 'create'])->name('work-history.create');
    Route::post('/work-history', [WorkHistoryController::class, 'store'])->name('work-history.store');
    Route::get('/work-history', [WorkHistoryController::class, 'index'])->name('work-history.index');

    // Rutas para el historial académico
    Route::get('/academic-history', [AcademicHistoryController::class, 'index'])->name('academic-history.index');
    Route::get('/academic-history/create', [AcademicHistoryController::class, 'create'])->name('academic-history.create');
    Route::post('/academic-history', [AcademicHistoryController::class, 'store'])->name('academic-history.store');
});

// Ruta para la página de verificación de correo
Route::middleware('auth')->get('/verify-email', EmailVerificationPromptController::class)
    ->name('verification.notice');

// Ruta de verificación del enlace
Route::middleware(['auth', 'signed'])->get('/verify-email/{id}/{hash}', [VerifyEmailController::class, 'verify'])
    ->name('verification.verify');

// Rutas de recuperación de contraseña
Route::middleware('guest')->group(function () {
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

require __DIR__.'/auth.php';
