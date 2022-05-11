<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\TrainingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/training/create', [TrainingController::class, 'store']);
Route::get('/training', [TrainingController::class, 'index']);
Route::delete('/training/{training}', [TrainingController::class, 'delete']);
Route::put('/training/{training}', [TrainingController::class, 'update']);
Route::get('/training/{training}', [TrainingController::class, 'show']);
