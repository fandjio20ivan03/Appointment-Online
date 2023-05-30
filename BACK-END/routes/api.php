<?php

use App\Http\Controllers\MedecinController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalendrierController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

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

// CRUD  sur le Calendrier

Route::prefix('calendrier')->name('calendrier.')->group(function (){

    // afficher le calendrier
    Route::get('/',[CalendrierController::class, 'index'])->name('index');

    //aficher un date specifique du calendrier
    Route::get('/{id}',[CalendrierController::class, 'show'])->name('show');

    //creation d'une date
    Route::post('/',[CalendrierController::class, 'store'])->name('store');

    //mise a jour d'une date donnee
    Route::post('/{id}', [CalendrierController::class, 'update'])->name('update');

    // supprimer une date du calendrier
    Route::delete('/{id}',[CalendrierController::class, 'destroy'])->name('destroy');
});
