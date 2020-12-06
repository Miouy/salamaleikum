<?php

use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdvisorController;
use \App\Http\Controllers\ManagerController;
use \App\Http\Controllers\SpecialtyController;
use \App\Http\Controllers\DisciplineController;

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

Route::middleware(['auth:sanctum','student'])->get('/student', function(Request $request){
    return $request->user();
});

Route::middleware(['auth:sanctum','manager'])->get('/manager', function(Request $request){
    return $request->user();
});

Route::middleware(['auth:sanctum','advisor'])->get('/advisor', function(Request $request){
    return $request->user();
});

Route::post('/auth/student-register', [AuthorizationController::class, 'studentRegister']);
Route::post('/auth/student-login', [AuthorizationController::class, 'studentLogin']);
Route::post('/auth/manager-login', [AuthorizationController::class, 'managerLogin']);
Route::post('/auth/advisor-login', [AuthorizationController::class, 'advisorLogin']);

Route::prefix('manager')->group(function (){
    Route::resources([
        'specialties' => SpecialtyController::class,
        'groups' => GroupController::class,
        'students' => StudentController::class,
        'advisors' => AdvisorController::class,
    ]);
});

Route::prefix('student')->group(function (){
    Route::resources([
        'disciplines' => DisciplineController::class,
    ]);
});
