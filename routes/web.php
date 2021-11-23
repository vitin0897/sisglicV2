<?php

use App\Http\Controllers\ComputadoresController;
use App\Http\Controllers\LicencasController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\SoftwaresController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TiposController;
use Illuminate\Support\Facades\Route;

// Licencas
Route::get('/', [LicencasController::class, 'listLicencas'])->middleware('auth');
Route::get('/licencas/create', [LicencasController::class, 'create']);
Route::get('/licencas/edit/{id}', [LicencasController::class, 'edit']);
Route::post('/licencas', [LicencasController::class, 'store']);
Route::put('/licencas/update/{id}', [LicencasController::class, 'update']);
Route::delete('/licencas/{id}', [LicencasController::class, 'destroy']);
Route::get('/pdf', [PdfController::class, 'gerarPdf']);

// Computadores
Route::get('/computadores', [ComputadoresController::class, 'listComputadores']);
Route::get('/atualizaComputador', [ComputadoresController::class, 'atualizaComputador']);

// Tipo
Route::get('/tipos', [TiposController::class, 'listTipos']);
Route::get('/tipos/create', [TiposController::class, 'create']);
Route::get('/tipos/edit/{id}', [TiposController::class, 'edit']);
Route::post('/tipos', [TiposController::class, 'store']);
Route::put('/tipos/update/{id}', [TiposController::class, 'update']);
Route::delete('/tipos/{id}', [TiposController::class, 'destroy']);
Route::get('/tipos/pdf', [PdfController::class, 'pdfTipo']);

// Status
Route::get('/status', [StatusController::class, 'listStatus']);
Route::get('/status/create', [StatusController::class, 'create']);
Route::get('/status/edit/{id}', [StatusController::class, 'edit']);
Route::post('/status', [StatusController::class, 'store']);
Route::put('/status/update/{id}', [StatusController::class, 'update']);
Route::delete('/status/{id}', [StatusController::class, 'destroy']);
Route::get('/status/pdf', [PdfController::class, 'pdfStatus']);

// Softwares
Route::get('/softwares', [SoftwaresController::class, 'listSoftwares']);
Route::get('/softwares/create', [SoftwaresController::class, 'create']);
Route::get('/softwares/edit/{id}', [SoftwaresController::class, 'edit']);
Route::post('/softwares', [SoftwaresController::class, 'store']);
Route::put('/softwares/update/{id}', [SoftwaresController::class, 'update']);
Route::delete('/softwares/{id}', [SoftwaresController::class, 'destroy']);
Route::get('/softwares/pdf', [PdfController::class, 'pdfSoftwares']);

// Login
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Log
Route::get('/log', [PdfController::class, 'log']);
