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
Route::post('/', [TaskController::class, 'createWeb']);
Route::get('/{id}', [TaskController::class, 'showWeb']);
Route::get('/', [TaskController::class, 'showTaskweb']);
Route::put('/{id}', [TaskController::class, 'update']);
Route::delete('/{id}', [TaskController::class, 'destroyWeb']);

