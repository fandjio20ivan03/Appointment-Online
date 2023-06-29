<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SpecialiteController;
use App\Models\Medecin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//supp
use App\Models\Specialite;
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


// Route::post('register', [UserController::class, 'register']);
// Route::post('login', [UserController::class, 'login']);

// Route pour l'enregistrement d'un utilisateur
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->post('/user', function (Request $request) {
    return $request->user();
});


// CRUD  sur le Calendrier

Route::prefix('calendrier')->name('calendrier.')->group(function (){

    // afficher le calendrier
    Route::get('/',[CalendrierController::class, 'index'])->name('index');

    //aficher un date specifique du calendrier
    Route::get('/show/{id}',[CalendrierController::class, 'show'])->name('show');

    //creation d'une date
    Route::post('/',[CalendrierController::class, 'store'])->name('store');

    //mise a jour d'une date donnee
    Route::put('/update/{id}', [CalendrierController::class, 'update'])->name('update');

    // supprimer une date du calendrier
    Route::delete('/delete/{id}',[CalendrierController::class, 'destroy'])->name('destroy');

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




Route::prefix('medecins')->name('medecin.')->group(function () {
    //afficher tous les patients
    Route::get('/', [MedecinController::class, 'index'])->name('index');

    //enregistree les informations d'un patient dans la base de donnee
    Route::post('/', [MedecinController::class, 'store'])->name('store');

    //modifier les informations d'un patient dans la base de donnee
    Route::put('/update/{id}', [MedecinController::class, 'update'])->name('update');

    //
    Route::get('/show/{id}', [MedecinController::class, 'show'])->name('show');

    //supprimer un patient de la base de donnee grace a sont identifiant
    Route::delete('/delete/{id}', [MedecinController::class, 'destroy'])->name('delete');
});


Route::prefix('specialites')->group(function (){
    //afficher tous les specialtites
    Route::get('/', [SpecialiteController::class, 'index'])->name('index');

    //recuperer une specialite par son id
    Route::get('/show/{id}', [SpecialiteController::class, 'show'])->name('show');
});


// Route::get('/test',function (){
//     dd( ((Specialite::all()->pluck('id')->toArray()))[array_rand(Specialite::all()->pluck('id')->toArray())]);
//     return response()->json([array_rand(Specialite::all()->pluck('id')->toArray())],200);
// });


Route::get('/medecins-page', [MedecinController::class, 'getPageMedecin']);

Route::get('/medecins-search', [MedecinController::class, 'getMedecinsBySearch']);
