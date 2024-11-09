<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PathwayController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified']);

Route::get('/courses', [CoursesController::class, 'index'])->name('courses.index');

Route::get('/detail_course/{course}', [CoursesController::class, 'detailCourse']);

// Pathway
Route::get('/pathway', [PathwayController::class, 'index'])->name('pathway');

//Challenge
Route::get('/challenge', [ChallengeController::class, 'index']);
Route::get('/challenge/detail/{challenge:id}', [ChallengeController::class, 'detail']);
Route::get('/challenge/detail/{challenge:id}/{challengeTaken}', [ChallengeController::class, 'detailTaken'])->middleware(['auth', 'verified']);
Route::post('/challenge-taken', [ChallengeController::class, 'join']);
Route::post('/challenge-answer', [ChallengeController::class, 'challengeSubmit']);

Route::get('/profile', [ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('profile.index');
Route::get('/edit/profile', [ProfileController::class, 'edit'])->middleware(['auth', 'verified'])->name('profile.edit');
Route::put('/update/profile', [ProfileController::class, 'update'])->middleware(['auth', 'verified'])->name('profile.update');
Route::get('/edit/password', [ProfileController::class, 'editPassword'])->middleware(['auth', 'verified'])->name('profile.editPassword');
Route::put('/update/password', [ProfileController::class, 'updatePassword'])->middleware(['auth', 'verified'])->name('profile.updatePassword');

//Learning
Route::post('/join', [LearningController::class, 'join']);
Route::post('/continue', [LearningController::class, 'continue']);
Route::get('/summary/{learning:id}', [LearningController::class, 'summary'])->middleware(['auth', 'verified']);
Route::get('/content/{detailLearning:id}', [LearningController::class, 'content'])->middleware(['auth', 'verified']);

//Materi
Route::post('/prev', [LearningController::class, 'prev']);
Route::post('/next', [LearningController::class, 'next']);
Route::post('/finish', [LearningController::class, 'finish']);

//quiz
Route::post('/start-quiz', [QuizController::class, 'taken']);
Route::post('/prev-quest', [QuizController::class, 'prev']);
Route::post('/next-quest', [QuizController::class, 'next']);
Route::get('/content/quiz/{quizTaken:id}', [QuizController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/content/quiz/{quizTaken:id}/{detailQuizTaken}', [QuizController::class, 'quiz'])->middleware(['auth', 'verified']);
Route::post('/answer-quiz', [QuizController::class, 'answer']);
Route::get('/content/quiz-result/{detailLearning:id}/{quizTaken}', [QuizController::class, 'result']);

//eval
Route::get('/content/{detailLearning:id}/evaluation', [EvaluationController::class, 'index'])->middleware(['auth', 'verified']);
Route::post('/eval-submit', [EvaluationController::class, 'evalSubmit']);

//certificate
Route::get('/content/{detailLearning:id}/certificate', [LearningController::class, 'certificate'])->middleware(['auth', 'verified']);

//Auth
Route::get('/daftar', [RegistrationController::class, 'index'])->middleware('guest');
Route::post('/daftar', [RegistrationController::class, 'store']);
Route::get('/masuk', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/masuk', [LoginController::class, 'authenticate']);
Route::post('/keluar', [LoginController::class, 'signout']);
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth' ])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth',])->name('verification.send');

Route::post('/email/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth'])->name('verification.resend');

// Password Reset
Route::get('/forgot-password', [LoginController::class, 'showLinkRequestForm'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [LoginController::class, 'sendResetLinkEmail'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [LoginController::class, 'showResetForm'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [LoginController::class, 'reset'])->middleware('guest')->name('password.update');

//Admin
Route::middleware(['admin', 'verified'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.route');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/edit/profile', [AdminController::class, 'editProfile'])->name('admin.editProfile');
    Route::put('/admin/update/profile', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');
    Route::get('/admin/edit/password', [AdminController::class, 'editPassword'])->name('admin.editPassword');
    Route::put('/admin/update/password', [AdminController::class, 'updatePassword'])->name('admin.updatePassword');
    Route::get('/admin/course', [AdminController::class, 'course'])->name('admin.course');
    Route::get('/admin_detail_course/{course:id}', [AdminController::class, 'detailCourse'])->name('admin.detailCourse');
    Route::get('/admin_edit_course/{course:id}', [AdminController::class, 'editCourse']);
    Route::delete('/admin_delete_course/{course:id}', [AdminController::class, 'deleteCourse']);
    Route::get('/admin/course/{sub_course:id}/detail', [AdminController::class, 'subCourseDetail'])->name('admin.sub_course');
    Route::get('/admin/course/add', [AdminController::class, 'addCourse']);
    Route::post('/admin/course/store', [AdminController::class, 'storeCourse'])->name('admin.storeCourse');
    Route::delete('/admin/course/delete/{id}', [AdminController::class, 'deleteCourse'])->name('admin.deleteCourse');
    Route::get('/admin_edit_course/{course:id}', [AdminController::class, 'editCourseView'])->name('admin.editCourseView');
    Route::put('/admin/course/update/{course:id}', [AdminController::class, 'updateCourse'])->name('admin.updateCourse');
    Route::get('/admin/course/{course:id}/add', [AdminController::class, 'addSubCourse'])->name('admin.addSubCourse');
    Route::post('/admin/course/{course:id}/store-subcourse', [AdminController::class, 'storeSubCourse'])->name('admin.storeSubCourse');
    Route::get('/admin/course/{sub_course:id}/edit', [AdminController::class, 'editSubCourse'])->name('admin.editSubCourse');
    Route::put('/admin/course/{sub_course:id}/update', [AdminController::class, 'updateSubCourse'])->name('admin.updateSubCourse');
    Route::delete('/admin/sub_course/{sub_course:id}/delete', [AdminController::class, 'deleteSubCourse'])->name('admin.deleteSubCourse');
    Route::get('/admin/content/{sub_course:id}/add', [AdminController::class, 'addContent'])->name('admin.addContent');
    Route::post('/admin/content/{sub_course:id}/store', [AdminController::class, 'storeContent'])->name('admin.storeContent');
    Route::delete('/admin/content/{content:id}/delete', [AdminController::class, 'deleteContent'])->name('admin.deleteContent');
    Route::get('/admin/content/{content:id}/edit', [AdminController::class, 'editContent'])->name('admin.editContent');
    Route::put('/admin/content/{content:id}/update', [AdminController::class, 'updateContent'])->name('admin.updateContent');
    Route::get('/admin/content/materials/{content:id}/manage', [AdminController::class, 'manageMaterials'])->name('admin.manageMaterials');
    Route::put('/admin/materials/store/{material_id}', [AdminController::class, 'storeMaterials'])->name('materials.store');
    Route::post('/ckeditor/upload', [AdminController::class, 'upload'])->name('ckeditor.upload');
    Route::get('/admin/detail_dashboard/{user:id}', [AdminController::class, 'detailDashboard']);
    Route::get('/admin/evaluation', [AdminController::class, 'evaluation']);
    Route::post('/admin/evaluation/update', [AdminController::class, 'evaluationUpdate']);
    Route::get('/admin/evaluation/detail/{evaluationTaken:id}', [AdminController::class, 'evaluationDetail']);
    Route::get('/admin/evaluation/detail/download/{evaluationTaken:id}', [AdminController::class, 'download']);
    Route::get('/admin/challenge', [AdminController::class, 'challenge']);
    Route::get('/admin/challenge/manage', [ChallengeController::class, 'manageChallenge'])->name('admin.manageChallenge');
    Route::get('/admin/challenge/create', [ChallengeController::class, 'createChallenge'])->name('admin.createChallenge');
    Route::post('/admin/challenge/store', [ChallengeController::class, 'storeChallenge'])->name('admin.storeChallenge');
    Route::post('/ckeditor/upload_challenge', [ChallengeController::class, 'upload'])->name('ckeditor.upload_challenge');
    Route::delete('/admin/challenge/delete/{challenge:id}', [ChallengeController::class, 'deleteChallenge'])->name('admin.deleteChallenge');
    Route::get('/admin/challenge/detail/{challengeTaken:id}', [AdminController::class, 'challengeDetail']);
    Route::get('/admin/challenge/detail/download/{challengeTaken:id}', [AdminController::class, 'challengeDownload']);
    Route::post('/admin/challenge/update', [AdminController::class, 'challengeUpdate']);
    Route::get('/admin/content/quizzes/{content:id}/manage', [QuizController::class, 'manageQuizzes'])->name('admin.manageQuizzes');
    Route::get('/admin/edit_challenge/{challenge:id}', [ChallengeController::class, 'editChallenge'])->name('admin.editChallenge');
    Route::put('/admin/update_challenge/{challenge:id}', [ChallengeController::class, 'updateChallenge'])->name('admin.updateChallenge');
    Route::post('/ckeditor/upload_quiz', [QuizController::class, 'upload'])->name('ckeditor.upload_quiz');
    Route::put('/quiz/{quiz:id}/store/{content_id}', [QuizController::class, 'store'])->name('quiz.store');
    Route::get('/quiz/{quiz}/question/{question}/edit', [QuizController::class, 'editQuestion'])->name('question.edit');
    Route::delete('/quiz/{quiz}/question/{question}', [QuizController::class, 'destroyQuestion'])->name('question.destroy');
    Route::get('/quiz/{quiz}/question/create', [QuizController::class, 'createQuestion'])->name('question.create');
    Route::post('/quiz/{quiz}/question', [QuizController::class, 'storeQuestion'])->name('question.store');
    Route::post('/ckeditor/upload_question', [QuizController::class, 'uploadQuestion'])->name('ckeditor.upload_question');
    Route::get('/quiz/{quiz}/question/{question}/edit', [QuizController::class, 'editQuestion'])->name('question.edit');
    Route::put('/quiz/{quiz}/question/{question}', [QuizController::class, 'updateQuestion'])->name('question.update');

    Route::get('/admin/content/evaluations/{content_id}/manage', [EvaluationController::class, 'manageEvaluations'])->name('admin.manageEvaluations');
    Route::put('/admin/content/evaluations/{evaluation:id}/store/{content_id}', [EvaluationController::class, 'storeEvaluations'])->name('admin.storeEvaluations');

    Route::post('/ckeditor/upload_evaluation', [EvaluationController::class, 'upload'])->name('ckeditor.upload_evaluation');
   
    Route::get('/pathway/add', [PathwayController::class, 'addPathway'])->name('admin.addPathway');
    Route::post('/pathway/store', [PathwayController::class, 'storePathway'])->name('admin.storePathway'); 
    Route::get('/admin/edit_pathway/{pathway:id}', [PathwayController::class, 'editPathway'])->name('admin.editPathway');
    Route::put('/admin/update_pathway/{pathway:id}', [PathwayController::class, 'updatePathway'])->name('admin.updatePathway');
    Route::delete('/admin/delete_pathway/{pathway:id}', [PathwayController::class, 'deletePathway'])->name('admin.deletePathway');
    Route::get('/pathway/{pathway_id}/courses/create', [PathwayController::class, 'createCourse'])->name('admin.courses.create');
    Route::post('/pathway/{pathway_id}/courses/store', [PathwayController::class, 'storeCourse'])->name('admin.pathway.course.store');
    Route::get('/pathway/courses/{course}/edit', [PathwayController::class, 'editPathwayCourse'])->name('admin.courses.edit');
    Route::put('/pathway/courses/{course}', [PathwayController::class, 'updatePathwayCourse'])->name('admin.courses.update');
    Route::delete('/pathway/courses/{course}', [PathwayController::class, 'destroyPathwayCourse'])->name('admin.courses.destroy');
});


Route::get('/pathway', [PathwayController::class, 'index'])->name('admin.pathway');
Route::get('/detail_pathway/{pathway:id}', [PathwayController::class, 'detailPathway'])->name('admin.detailPathway');