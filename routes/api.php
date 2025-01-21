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

Route::resource('users', App\Http\Controllers\UserController::class);
Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
Route::get('logout', [App\Http\Controllers\AuthController::class, 'logout']);
Route::get('user', [App\Http\Controllers\AuthController::class, 'getAuthUser']);

Route::get('/gyms/email/{email}', [App\Http\Controllers\GymController::class, 'getGymByEmail']);
Route::get('/users/email/{email}', [App\Http\Controllers\UserController::class, 'getUserByEmail']);
Route::put('/gyms/{id}', [App\Http\Controllers\GymController::class, 'updateGymRegister']);
Route::get('/users/{id}/gym-is-complete', [App\Http\Controllers\UserController::class, 'getGymIsComplete']);
Route::get('/users/{id}/gym', [App\Http\Controllers\UserController::class, 'getGymByUserId']);


Route::resource('trainings', App\Http\Controllers\TrainingController::class);
Route::resource('physical-evaluations', App\Http\Controllers\PhysicalEvaluationController::class);
Route::resource('training-exercises', App\Http\Controllers\TrainingExerciseController::class);
Route::resource('payments', App\Http\Controllers\PaymentController::class);
Route::resource('frequences', App\Http\Controllers\FrequenceController::class);
Route::middleware('auth:api')->resource('nutrition', App\Http\Controllers\NutritionController::class);



