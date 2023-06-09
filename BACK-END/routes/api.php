<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\RegisterController;
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

// Route::post('register', [UserController::class, 'register']);
// Route::post('login', [UserController::class, 'login']);

// Route pour l'enregistrement d'un utilisateur
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->post('/user', function (Request $request) {
    return $request->user();
});
