<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AuthController,
    ProgrammingLanguageController,
    ChapterController,
    LessonController,
    ChapterAssessmentController,
    ExamController
};

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

Route::group([
], function ($route) {
    //Route::post('/login', [AuthController::class, 'login'])->name('login');
    //$route->post('/login', [AuthController::class, 'login'])->name('login');

    $route->post('/login', [AuthController::class, 'login']);
    $route->post('/register', [AuthController::class, 'register']);
    $route->post('/verify-email', [AuthController::class, 'verifyEmail']);
    $route->post('/send-otp', [AuthController::class, 'sendOtp']);
});


Route::group([
    'middleware' => 'auth:sanctum',
], function ($route) {
    $route->get('/logout', [AuthController::class, 'logout']);
});

//programminglanguage
Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'programming-language'
], function ($route) {
    $route->get('/', [ProgrammingLanguageController::class, 'index']);
    $route->post('/create', [ProgrammingLanguageController::class, 'create']);
    $route->get('/view/{referenceNumber}', [ProgrammingLanguageController::class, 'show']);
    $route->put('/update/{referenceNumber}', [ProgrammingLanguageController::class, 'update']);
    $route->delete('/delete/{referenceNumber}', [ProgrammingLanguageController::class, 'delete']);
});

//chapter
Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'chapter'
], function ($route) {
    $route->get('/', [ChapterController::class, 'index']);
    $route->post('/create', [ChapterController::class, 'create']);
    $route->get('/view/{referenceNumber}', [ChapterController::class, 'show']);
    $route->put('/update/{referenceNumber}', [ChapterController::class, 'update']);
    $route->delete('/delete/{referenceNumber}', [ChapterController::class, 'delete']);
});

//lesson
Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'lesson'
], function ($route) {
    $route->get('/', [LessonController::class, 'index']);
    $route->post('/create', [LessonController::class, 'create']);
    $route->get('/view/{referenceNumber}', [LessonController::class, 'show']);
    $route->put('/update/{referenceNumber}', [LessonController::class, 'update']);
    $route->delete('/delete/{referenceNumber}', [LessonController::class, 'delete']);
    $route->post('/upload-video', [LessonController::class, 'uploadVideo']);
});

//chapter assessment
Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'chapter_assessment'
], function ($route) {
    $route->get('/', [ChapterAssessmentController::class, 'index']);
    $route->post('/create', [ChapterAssessmentController::class, 'create']);
    $route->get('/view/{referenceNumber}', [ChapterAssessmentController::class, 'show']);
    $route->put('/update/{referenceNumber}', [ChapterAssessmentController::class, 'update']);
    $route->delete('/delete/{referenceNumber}', [ChapterAssessmentController::class, 'delete']);
});

//exam
Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'exam'
], function ($route) {
    $route->get('/', [ExamController::class, 'index']);
    $route->post('/create', [ExamController::class, 'create']);
    $route->get('/{referenceNumber}', [ExamController::class, 'show']);
    $route->put('/update/{referenceNumber}', [ExamController::class, 'update']);
    $route->delete('/delete/{referenceNumber}', [ExamController::class, 'delete']);
});