<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdvisorController;
use \App\Http\Controllers\ManagerController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('advisors', AdvisorController::class);
Route::resource('managers', ManagerController::class);

Route::post('/auth/manager-login', [\App\Http\Controllers\AuthorizationController::class, 'managerLogin']);
Route::post('/auth/advisor-login', [\App\Http\Controllers\AuthorizationController::class, 'advisorLogin']);
Route::post('/register', [\App\Http\Controllers\AuthorizationController::class, 'studentRegister']);
