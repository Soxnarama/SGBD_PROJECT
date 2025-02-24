<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Electeurs\CompteController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/DashboardElecteur', function () {
    return view('Dashbord.electeur');
})->name('electeurs.dashboard');

Route::get('/DashboardCandidat', function () {
    return view('Dashbord.candidat');
})->name('candidats.dashboard');

// routes pour electeurs
Route::prefix('electeurs')->group(function () {
    Route::prefix('comptes')->group(function () {
        Route::get('/', [CompteController::class, 'index'])->name('electeurs.comptes.index');
        Route::post('/create', [CompteController::class, 'create'])->name('electeurs.comptes.create');
        Route::get('/completer', [CompteController::class, 'completer'])->name('electeurs.comptes.completer');
        Route::post('/completer', [CompteController::class, 'completerCompte'])->name('electeurs.comptes.completerCompte');
    });
    // Route::get('/create', [ElecteurController::class, 'create'])->name('electeurs.create');
    // Route::post('/', [ElecteurController::class, 'store'])->name('electeurs.store');
    // Route::get('/{id}', [ElecteurController::class, 'show'])->name('electeurs.show');
    // Route::get('/{id}/edit', [ElecteurController::class, 'edit'])->name('electeurs.edit');
    // Route::put('/{id}', [ElecteurController::class, 'update'])->name('electeurs.update');
    // Route::delete('/{id}', [ElecteurController::class, 'destroy'])->name('electeurs.destroy');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
