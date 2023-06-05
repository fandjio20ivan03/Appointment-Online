<?php

use App\Http\Controllers\PatientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

