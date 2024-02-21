<?php

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


Route::get('users', [App\Http\Controllers\UserController::class, 'index']);
Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
Route::get('logout', [App\Http\Controllers\AuthController::class, 'logout']);
Route::get('user', [App\Http\Controllers\AuthController::class, 'getAuthUser']);

Route::resource('trainings', App\Http\Controllers\TrainingController::class);
Route::resource('physical-evaluations', App\Http\Controllers\PhysicalEvaluationController::class);
Route::resource('training-exercises', App\Http\Controllers\TrainingExerciseController::class);
Route::resource('payments', App\Http\Controllers\PaymentController::class);