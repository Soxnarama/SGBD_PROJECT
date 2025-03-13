<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Routes pour l'activation du compte parrain
Route::prefix('parrain')->name('parrain.')->group(function () {
    Route::get('/activation', [ParrainController::class, 'showActivationForm'])->name('activation');
    Route::post('/verify', [ParrainController::class, 'verifyElecteur'])->name('verify');
    Route::get('/contact', [ParrainController::class, 'showContactForm'])->name('contact');
    Route::post('/save-contact', [ParrainController::class, 'saveContactInfo'])->name('save-contact');
    Route::get('/success', [ParrainController::class, 'showSuccess'])->name('activation.success');
});


/*
|--------------------------------------------------------------------------
| Routes Espace Candidat
|--------------------------------------------------------------------------
*/

// Routes pour l'accès des candidats à leur tableau de bord
Route::prefix('espace-candidat')->group(function () {
    // Connexion
    Route::get('/connexion', [App\Http\Controllers\CandidatController::class, 'showLoginForm'])->name('candidat.login');
    Route::post('/connexion', [App\Http\Controllers\CandidatController::class, 'authenticate'])->name('candidat.authenticate');
    Route::get('/deconnexion', [App\Http\Controllers\CandidatController::class, 'logout'])->name('candidat.logout');

    // Tableau de bord (accessible uniquement après connexion)
    Route::get('/tableau-de-bord', [App\Http\Controllers\CandidatController::class, 'dashboard'])->name('candidat.dashboard');
});
