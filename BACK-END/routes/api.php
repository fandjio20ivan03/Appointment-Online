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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('patient')->name('patient.')->group(function () {
    Route::get('/', [PatientController::class, 'index'])->name('index');
    // Route::get('/create', [StudentController::class, 'create'])->name('create');
    // Route::post('/', [StudentController::class, 'store'])->name('store');
    // Route::get('delete/{id}', [StudentController::class, 'delete'])->name('delete');
    // Route::get('/update/{id}', [StudentController::class, 'getUpdate'])->name('get_update');
    // Route::put('/update/{id}', [StudentController::class, 'update'])->name('update');
    // Route::get('note/{id}', [NoteController::class, 'getNote'])->name('note');
});
