<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\SpecialiteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::get('stevane', [MedecinController::class, 'index']);
Route::post('medecin/create', [MedecinController::class, 'create']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('patient')->name('patient.')->group(function () {
    //afficher tous les patients
    Route::get('/', [PatientController::class, 'index'])->name('index');

    //
    // Route::get('/create', [StudentController::class, 'create'])->name('create');

    //enregistree les informations d'un patient dans la base de donnee
    Route::post('/', [PatientController::class, 'store'])->name('store');

    //modifier les informations d'un patient dans la base de donnee
    Route::put('/update/{id}', [PatientController::class, 'update'])->name('update');

    //
    Route::get('/show/{id}', [PatientController::class, 'show'])->name('show');

    //supprimer un patient de la base de donnee grace a sont identifiant
    Route::delete('/delete/{id}', [PatientController::class, 'delete'])->name('delete');
});



Route::prefix('rendez_vous')->name('rendez_vous.')->group(function () {
    //afficher tous les patients
    Route::get('/', [RendezvousController::class, 'index'])->name('index');

    //
    // Route::get('/create', [StudentController::class, 'create'])->name('create');

    //enregistree les informations d'un rendezvous dans la base de donnee
    Route::post('/', [RendezvousController::class, 'store'])->name('store');

    //modifier les informations d'un patient dans la base de donnee
    Route::put('/update/{id}', [RendezvousController::class, 'update'])->name('update');

    //
    Route::get('/show/{id}', [RendezvousController::class, 'show'])->name('show');

    //supprimer un patient de la base de donnee grace a sont identifiant
    Route::delete('/delete/{id}', [RendezvousController::class, 'destroy'])->name('delete');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::prefix('specialite')->name('specialite.')->group(function () {
    //afficher tous les patients
    Route::get('/', [SpecialiteController::class, 'index'])->name('index');

    //
    // Route::get('/create', [StudentController::class, 'create'])->name('create');

    //enregistree les informations d'un Specialite dans la base de donnee
    Route::post('/', [SpecialiteController::class, 'store'])->name('store');

    //modifier les informations d'un Specialite dans la base de donnee
    Route::put('/update/{id}', [SpecialiteController::class, 'update'])->name('update');

    //
    Route::get('/show/{id}', [SpecialiteController::class, 'show'])->name('show');

    //supprimer un Specialite de la base de donnee grace a sont identifiant
    Route::delete('/delete/{id}', [SpecialiteController::class, 'destroy'])->name('delete');
});
