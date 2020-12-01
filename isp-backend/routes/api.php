<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdvisorController;
use \App\Http\Controllers\ManagerController;
use \App\Http\Controllers\SpecialtyController;
use \App\Http\Controllers\StudentController;

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

Route::middleware('auth:sanctum')->get('/student', [\App\Http\Controllers\AuthorizationController::class,'getAuthStudent']);

Route::resource('advisors', AdvisorController::class);
Route::resource('managers', ManagerController::class);
Route::resource('students', StudentController::class);

Route::post('/auth/manager-login', [\App\Http\Controllers\AuthorizationController::class, 'managerLogin']);
Route::post('/auth/advisor-login', [\App\Http\Controllers\AuthorizationController::class, 'advisorLogin']);
Route::post('/auth/student-register', [\App\Http\Controllers\AuthorizationController::class, 'studentRegister']);
Route::post('/auth/student-login', [\App\Http\Controllers\AuthorizationController::class, 'studentLogin']);
Route::post('/auth/manager-login', [AuthorizationController::class, 'managerLogin']);
Route::post('/auth/advisor-login', [AuthorizationController::class, 'advisorLogin']);
Route::post('/register', [AuthorizationController::class, 'studentRegister']);

Route::prefix('manager')->group(function (){
    Route::resources([
        'specialties' => SpecialtyController::class,
    ]);
});
