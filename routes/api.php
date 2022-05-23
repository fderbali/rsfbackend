<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AnnounceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EstimateController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\blackListUserController;

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

Route::get('/training/user/{user}', [TrainingController::class, 'index']);
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
    Route::get('/demand/user/{user}', [DemandController::class, 'getDemandsByUser']);
    Route::get('/demand/recu/{user}', [DemandController::class, 'getDemandsByProf']);

    //Estimates :
    Route::get('/estimate/user/{user}', [EstimateController::class, 'getEstimatesByUser']);
    Route::get('/estimate/sent/{user}', [EstimateController::class, 'getEstimatesByProf']);

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

    // Announce
    Route::get('/announce', [AnnounceController::class, 'index']);
    Route::post('/announce/create', [AnnounceController::class, 'store']);
    Route::get('/announce/{announce}', [AnnounceController::class, 'show']);
    Route::put('/announce/{announce}', [AnnounceController::class, 'update']);
    Route::delete('/announce/{announce}', [AnnounceController::class, 'delete']);

     // BlackListUser
    Route::get('/BlackListUser', [blackListUserController::class, 'index']);
    Route::post('/BlackListUser/create', [blackListUserController::class, 'store']);
    Route::get('/BlackListUser/{blacklistuser}', [blackListUserController::class, 'show']);
    Route::put('/BlackListUser/{blacklistuser}', [blackListUserController::class, 'update']);
    Route::delete('/BlackListUser/{blacklistuser}', [blackListUserController::class, 'delete']);


// });



