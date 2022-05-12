<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\TrainingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DemandController;

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

Route::post('/category/create', [CategoryController::class, 'store']);
Route::get('/category', [CategoryController::class, 'index']);
Route::delete('/category/{category}', [CategoryController::class, 'delete']);
Route::put('/category/{category}', [CategoryController::class, 'update']);
Route::get('/category/{category}', [CategoryController::class, 'show']);

Route::post('/demand/create', [DemandController::class, 'store']);
Route::get('/demand', [DemandController::class, 'index']);
Route::delete('/demand/{demand}', [DemandController::class, 'delete']);
Route::put('/demand/{demand}', [DemandController::class, 'update']);
Route::get('/demand/{demand}', [DemandController::class, 'show']);

