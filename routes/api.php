<?php

use App\Http\Controllers\API\DocumentController;
use App\Http\Controllers\API\PosterController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\VideoController;
use App\Http\Controllers\API\MitosFaktaController;
use App\Http\Controllers\API\PillsController;
use App\Http\Controllers\API\TokenToFCMController;
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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('sendToken', [TokenToFCMController::class, 'sendToken']);

    Route::get('getAllUser', [UserController::class, 'getAllUser']);
    Route::get('getUserById/{user}', [UserController::class, 'getUserById']);
    Route::get('getUserByName/{name}', [UserController::class, 'getUserByName']);
    
    Route::get('getAllDocument', [DocumentController::class, 'getAllDocument']);
    Route::get('getDocumentById/{document}', [DocumentController::class, 'getDocumentById']);
    
    Route::get('getAllVideo', [VideoController::class, 'getAllVideo']);
    Route::get('getVideoById/{video}', [VideoController::class, 'getVideoById']);
    
    Route::get('getAllPoster', [PosterController::class, 'getAllPoster']);
    Route::get('getPosterById/{poster}', [PosterController::class, 'getPosterById']);
    
    Route::get('getAllMitosFakta', [MitosFaktaController::class, 'getAllMitosFakta']);
    Route::get('getMitosFaktaById/{mitosfaktum}', [MitosFaktaController::class, 'getMitosFaktaById']);
    
    Route::get('getAllPills', [PillsController::class, 'getAllPills']);
    Route::get('getPillsById/{id}', [PillsController::class, 'getPillsById']);
    
    Route::post('createUser', [UserController::class, 'createUser']);
    Route::post('createPills', [PillsController::class, 'createPills']);
    Route::post('logout', [UserController::class, 'logout']);
});




Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

