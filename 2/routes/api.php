<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MedicalRecordController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/medical', [MedicalRecordController::class, 'get']);
Route::get('/medical/{id}', [MedicalRecordController::class, 'detail']);
Route::post('/medical', [MedicalRecordController::class, 'store'])->name('medical.store');