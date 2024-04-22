<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AuthController,
    ProgrammingLanguageController,
    ChapterController,
    LessonController,
    ChapterAssessmentController,
    ExamController,
    BadgeController,
    UserBadgeController,
    UserController,
    GettingStartedController,
    GettingStartedStepsController,
    UserProgressController,
    ProgressController,
    ExamScoreController
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
//user
Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'user'
], function ($route) {
    $route->get('/', [UserController::class, 'index']);
    $route->get('/view/{id}', [UserController::class, 'view']);
    /* $route->put('/update-password/{id}', [UserController::class, 'updatePassword']);
    $route->delete('/delete/{id}', [UserController::class, 'delete']); */
    $route->post('/add-badge', [UserBadgeController::class, 'addUserBadge']);
    $route->get('/badge/{id}', [UserBadgeController::class, 'getUserBadge']);
    // profile-picture
    $route->post('/upload/{username}', [UserController::class, 'uploadProfilePicture']);
    $route->get('/profile/{username}', [UserController::class, 'getProfilePicture']);

    $route->post('/progress/update', [UserProgressController::class, 'update']);
    $route->post('/progress/create', [UserProgressController::class, 'create']);
    $route->get('/progress/unlocked', [UserProgressController::class, 'unlocked']);
    $route->get('/progress/view/{id}', [UserProgressController::class, 'view']);
    $route->post('/progress/getLessonID', [UserProgressController::class, 'getNextLessonId']);
    $route->post('/progress/getChapterID', [UserProgressController::class, 'getNextChapterId']);
    $route->post('/progress/getLastLessonID', [UserProgressController::class, 'getLastLessonID']);
    $route->post('/progress/getFirstLessonID', [UserProgressController::class, 'getFirstLessonID']);
    $route->post('/fetch/inprogress', [UserProgressController::class, 'index']);
    $route->post('/fetch/completed', [UserProgressController::class, 'completed']);
    $route->post('/fetch/unlocked', [UserProgressController::class, 'unlocked']);
    $route->get('/progress/{username}', [ProgressController::class, 'index']);
    $route->post('/checkStatus', [ProgressController::class, 'checkIfChapterLessonIsCompleted']);
    $route->get('/{username}/chapass', [UserController::class, 'getChapAss']);
    $route->post('/exam/create', [ExamScoreController::class, 'create']);

});

Route::group([
], function ($route) {
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
    $route->get('fetch', [ProgrammingLanguageController::class, 'fetchChaptersLessonsAssessmentsExams']);
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
    $route->get('/view/question/{referenceNumber}', [ChapterAssessmentController::class, 'viewQuestion']);
    $route->put('/update/{referenceNumber}', [ChapterAssessmentController::class, 'update']);
    $route->delete('/delete/{referenceNumber}', [ChapterAssessmentController::class, 'delete']);
    $route->delete('/delete/question/{referenceNumber}', [ChapterAssessmentController::class, 'deleteQuestion']);
});

//exam
Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'exam'
], function ($route) {
    $route->get('/', [ExamController::class, 'index']);
    $route->post('/create', [ExamController::class, 'create']);
    $route->get('/view/{referenceNumber}', [ExamController::class, 'show']);
    $route->get('/view/question/{referenceNumber}', [ExamController::class, 'viewQuestion']);
    $route->delete('/delete/{referenceNumber}', [ExamController::class, 'delete']);
    $route->delete('/delete/question/{referenceNumber}', [ExamController::class, 'deleteQuestion']);
    $route->put('/update/{referenceNumber}', [ExamController::class, 'update']);
});

//badge
Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'badge'
], function ($route) {
    $route->get('/', [BadgeController::class, 'index']);
    $route->post('/create', [BadgeController::class, 'create']);
    $route->get('/view/{referenceNumber}', [BadgeController::class, 'show']);
    $route->put('/update/{referenceNumber}', [BadgeController::class, 'update']);
    $route->delete('/delete/{referenceNumber}', [BadgeController::class, 'delete']);
    $route->post('/upload-image', [BadgeController::class, 'uploadBadgeImage']);
});

//getting-started
Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'getting-started'
], function ($route) {
    $route->get('/', [GettingStartedController::class, 'index']);
    $route->post('/create', [GettingStartedController::class, 'create']);
    $route->get('/view/{referenceNumber}', [GettingStartedController::class, 'view']);
    $route->post('/upload-image', [GettingStartedController::class, 'uploadGettingStartedImage']);
    $route->get('/steps', [GettingStartedStepsController::class, 'index']);
    $route->post('/steps/create', [GettingStartedStepsController::class, 'create']);
    $route->get('/steps/view/{referenceNumber}', [GettingStartedStepsController::class, 'show']);
});