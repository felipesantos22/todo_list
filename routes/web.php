<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [TaskController::class, 'indexWeb']);
Route::get('/{id}', [TaskController::class, 'showWeb']);
Route::put('//{id}', [TaskController::class, 'update']);
Route::post('/', [TaskController::class, 'createWeb']);
Route::delete('/{id}', [TaskController::class, 'destroyWeb']);
