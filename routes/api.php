<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AuthController,
    ProgrammingLanguageController,
    ChapterController,
    LessonController,
    QuizController,
    ExamController,
    GoogleDriveController
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
    $route->get('/{referenceNumber}', [ProgrammingLanguageController::class, 'show']);
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
    $route->get('/{referenceNumber}', [ChapterController::class, 'show']);
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
    $route->get('/{referenceNumber}', [LessonController::class, 'show']);
    $route->put('/update/{referenceNumber}', [LessonController::class, 'update']);
    $route->delete('/delete/{referenceNumber}', [LessonController::class, 'delete']);
});

//quiz
Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'quiz'
], function ($route) {
    $route->get('/', [QuizController::class, 'index']);
    $route->post('/create', [QuizController::class, 'create']);
    $route->get('/{referenceNumber}', [QuizController::class, 'show']);
    $route->put('/update/{referenceNumber}', [QuizController::class, 'update']);
    $route->delete('/delete/{referenceNumber}', [QuizController::class, 'delete']);
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

Route::get('/google-drive', [GoogleDriveController::class, 'index']);
Route::get('/google-drive/folder/{folderId}', [GoogleDriveController::class, 'listFiles']);

