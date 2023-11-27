<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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


//User
Route::post('/user/create', [UserController::class, 'createApi']);
Route::get('/user', [UserController::class, 'indexApi']);



//Task
Route::get('/task', [TaskController::class, 'index']);
Route::post('/task', [TaskController::class, 'create']);
Route::get('/task/search', [TaskController::class, 'showTask']);
Route::get('/task/{id}', [TaskController::class, 'showApi']);
Route::put('/task/{id}', [TaskController::class, 'updateApi']);
Route::delete('/task/{id}', [TaskController::class, 'destroyApi']);

