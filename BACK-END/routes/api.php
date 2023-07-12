<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\ExceptionController;
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



// Route pour l'enregistrement d'un utilisateur
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->post('/user', function (Request $request) {
    return $request->user();
});


// CRUD sur admin
Route::prefix('admins')->group(function () {
    //afficher tous les admins
    Route::get('/', [AdminController::class, 'index']);

    //enregistree les informations d'un admin dans la base de donnee
    Route::post('/', [AdminController::class, 'store']);

    //modifier les informations d'un admin dans la base de donnee
    Route::put('/update/{id}', [AdminController::class, 'update']);

    //retourner un admin specifique
    Route::get('/show/{id}', [AdminController::class, 'show']);

    //supprimer un admin de la base de donnee grace a sont identifiant
    Route::delete('/delete/{id}', [AdminController::class, 'destroy']);

});






// CRUD  sur le Calendrier

Route::prefix('calendrier')->group(function (){

    // afficher le calendrier
    Route::get('/',[CalendrierController::class, 'index']);

    //aficher un date specifique du calendrier
    Route::get('/show/{id}',[CalendrierController::class, 'show']);

    //creation d'une date
    Route::post('/',[CalendrierController::class, 'store']);

    //mise a jour d'une date donnee
    Route::put('/update/{id}', [CalendrierController::class, 'update']);

    // supprimer une date du calendrier
    Route::delete('/delete/{id}',[CalendrierController::class, 'destroy']);

});





// CRUD patient
Route::prefix('patients')->group(function () {
    //afficher tous les patients
    Route::get('/', [PatientController::class, 'index']);

    //enregistree les informations d'un patient dans la base de donnee
    Route::post('/', [PatientController::class, 'store']);

    //modifier les informations d'un patient dans la base de donnee
    Route::put('/update/{id}', [PatientController::class, 'update']);

    //
    Route::get('/show/{id}', [PatientController::class, 'show']);

    //supprimer un patient de la base de donnee grace a sont identifiant
    Route::delete('/delete/{id}', [PatientController::class, 'delete']);

    //pretourner le total des medecins en bd
    Route::get('/total-patient', [PatientController::class, 'getTotalPatient']);

    //retourner les donnee patients par page
    Route::get('/patients-page', [PatientController::class, 'getPagePatient']);

});




Route::prefix('medecins')->group(function () {
    //afficher tous les patients
    Route::get('/', [MedecinController::class, 'index']);

    //enregistree les informations d'un patient dans la base de donnee
    Route::post('/', [MedecinController::class, 'store']);

    //modifier les informations d'un patient dans la base de donnee
    Route::put('/update/{id}', [MedecinController::class, 'update']);

    //retourner un medecin specifique
    Route::get('/show/{id}', [MedecinController::class, 'show']);

    //supprimer un patient de la base de donnee grace a sont identifiant
    Route::delete('/delete/{id}', [MedecinController::class, 'destroy']);

    //retourner les donnee medecins par page
    Route::get('/medecins-page', [MedecinController::class, 'getPageMedecin']);


    //recherche d'un medecin: dans le cas ou l'admin recherche un medecin specifique
    Route::get('/medecins-search', [MedecinController::class, 'getMedecinsBySearch']);

    //pretourner le total des medecins en bd
    Route::get('/total-medecin', [MedecinController::class, 'getTotalMedecin']);
});




//CRUD specialite
Route::prefix('specialites')->group(function (){
    //afficher tous les specialtites
    Route::get('/', [SpecialiteController::class, 'index']);

    //recuperer une specialite par son id
    Route::get('/show/{id}', [SpecialiteController::class, 'show']);
});




//CRUD rendez_vous

Route::prefix('rendez-vous')->group( function (){
    //afficher tous les rendez-vous
    Route::get('/',[RendezVousController::class, 'index']);

    //retourner l'ensemble de rendez-vous deja programme
    Route::get('/total-rendez-vous',[RendezVousController::class, 'getTotalRendezVous']);

    //retourer l'augmentation de rendez-vous

    Route::get('/augmentation-rendez-vous',[RendezVousController::class, 'getAugmentationRendezVous']);
});



//CRUD rendez_vous

Route::prefix('exception')->group( function (){

    Route::get('/', [ExceptionController::class, 'index']);

   //creation d'une date d'exception
   Route::post('/',[ExceptionController::class, 'store']);

});
