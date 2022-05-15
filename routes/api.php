<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\TrainingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\SessionController;

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

Route::get('/training', [TrainingController::class, 'index']);
Route::get('/training/{training}', [TrainingController::class, 'show']);
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{category}', [CategoryController::class, 'show']);
// L'utilisateur quand il arrive au début il est forcément pas authentifié,
// c'est pour ça qu'on met cette route en dehors du middleware auth:sanctum


// Route::middleware('auth:sanctum')->group(function () {
    // Trainings
    Route::post('/training/create', [TrainingController::class, 'store']);
    Route::delete('/training/{training}', [TrainingController::class, 'delete']);
    Route::put('/training/{training}', [TrainingController::class, 'update']);
    // Categories
    Route::post('/category/create', [CategoryController::class, 'store']);
    Route::delete('/category/{category}', [CategoryController::class, 'delete']);
    Route::put('/category/{category}', [CategoryController::class, 'update']);

    // Demands
    Route::post('/demand/create', [DemandController::class, 'store']);
    Route::get('/demand', [DemandController::class, 'index']);
    Route::delete('/demand/{demand}', [DemandController::class, 'delete']);
    Route::put('/demand/{demand}', [DemandController::class, 'update']);
    Route::get('/demand/{demand}', [DemandController::class, 'show']);

    // Sessions
    Route::post('/session/create', [SessionController::class, 'store']);
    Route::get('/session', [SessionController::class, 'index']);
    Route::delete('/session/{session}', [SessionController::class, 'delete']);
    Route::put('/session/{session}', [SessionController::class, 'update']);
    Route::get('/session/{session}', [SessionController::class, 'show']);

    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/user/create', [AuthController::class, 'create']);
    Route::post('/login', [AuthController::class, 'login']);
// });



