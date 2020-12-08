<?php

use App\Http\Controllers\AdvisorClientController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\StudentClientController;
use App\Http\Controllers\StudentController;
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

Route::middleware(['auth:sanctum','student'])->get('/student', function(Request $request){
    return $request->user();
});

Route::middleware(['auth:sanctum','manager'])->get('/manager', function(Request $request){
    return $request->user();
});

Route::middleware(['auth:sanctum','advisor'])->get('/advisor', function(Request $request){
    return $request->user();
});

Route::middleware('auth:sanctum')->post('/logout', [AuthorizationController::class, 'logout']);

Route::prefix('auth')->group(function (){
    Route::post('/student-register', [AuthorizationController::class, 'studentRegister']);
    Route::post('/student-login', [AuthorizationController::class, 'studentLogin']);
    Route::post('/manager-login', [AuthorizationController::class, 'managerLogin']);
    Route::post('/advisor-login', [AuthorizationController::class, 'advisorLogin']);
});

Route::prefix('manager')->group(function (){
    Route::resources([
        'specialties' => SpecialtyController::class,
        'groups' => GroupController::class,
        'students' => StudentController::class,
        'advisors' => AdvisorController::class,
        'courses' => CourseController::class,
        'disciplines' => DisciplineController::class,
    ]);
});

Route::prefix('advisor')->group(function (){
    Route::get('/groups', [AdvisorClientController::class, 'getAdvisorGroups']);
    Route::get('/groups/{id}', [AdvisorClientController::class, 'getAdvisorGroupStudents']);
    Route::get('/student-disciplines/{id}', [AdvisorClientController::class, 'getStudentDisciplines']);
    Route::get('/student-requests/{id}', [AdvisorClientController::class, 'getStudentRequests']);
    Route::post('/confirm-requests/{id}', [AdvisorClientController::class, 'confirmStudentRequests']);
    Route::post('/reject-requests/{id}', [AdvisorClientController::class, 'rejectStudentRequests']);
});

Route::prefix('student')->group(function (){
    Route::get('/isp/{id}',[StudentClientController::class,'getSemesterDisciplines']);
    Route::get('/retake/{id}',[StudentClientController::class,'getRetakesSum']);
    Route::get('/getminpass/{id}',[StudentClientController::class,'getMinMarksPass']);
    Route::get('/getminscholarship/{id}',[StudentClientController::class,'getMinMarksScholarship']);
    Route::get('/getminhighscholarship/{id}',[StudentClientController::class,'getMinMarksHScholarship']);
});
