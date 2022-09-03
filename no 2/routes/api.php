<?php

use App\Http\Controllers\MedicalController;
use Illuminate\Support\Facades\Route;

Route::get('/medical', [MedicalController::class, 'index']);
Route::post('/medical', [MedicalController::class, 'store']);
Route::get('/medical/{id}', [MedicalController::class, 'show']);
