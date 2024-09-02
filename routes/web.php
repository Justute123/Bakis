<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages/index');
});
Route::get('/index', function () {
    return view('pages/index');
});
Route::get('/dashInd', function () {
    return view('pages/dashInd');
});
Route::get('/newsAsStudent', function () {
    return view('pages/newsAsStudent');
});
Route::get('/quiz', function () {
    return view('pages/quiz');
});

Route::get('/theory', [App\Http\Controllers\theoryController::class, 'index']);
Route::get('/theory/{id}', [App\Http\Controllers\theoryController::class, 'filterTheoryById']);
Route::get('/theory/{id}/show', [App\Http\Controllers\theoryController::class, 'show']);
Route::get('/quiz', [App\Http\Controllers\QuizController::class, 'index']);
Route::get('/quiz/{id}', [App\Http\Controllers\QuizController::class, 'filterQuestionsByQuizId']);
Route::post('/submitAnswer/{id}', [App\Http\Controllers\QuizController::class, 'submitAnswer'])->name('submit');







Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dash', function () {
        return view('pages/dash');
    })->name('dashboard');
});

Route::get('/admin/users', [App\Http\Controllers\admin\UsersController::class, 'index']);
Route::get('/admin/users/create', [App\Http\Controllers\admin\UsersController::class, 'create']);
Route::post('/admin/users', [App\Http\Controllers\admin\UsersController::class, 'store'])->name('store');
Route::get('/admin/users/{id}/edit', [App\Http\Controllers\admin\UsersController::class, 'edit']);
Route::put('/admin/users/{id}', [App\Http\Controllers\admin\UsersController::class, 'update'])->name('students.update');
Route::post('admin/users/deleteStudent', [App\Http\Controllers\admin\UsersController::class, 'destroy']);

Route::get('/admin/topics', [App\Http\Controllers\admin\TopicsController::class, 'index']);
Route::get('/admin/topics/create', [App\Http\Controllers\admin\TopicsController::class, 'create']);
Route::post('/admin/topics', [App\Http\Controllers\admin\TopicsController::class, 'store'])->name('topics.store');
Route::get('/admin/topics/{id}/edit', [App\Http\Controllers\admin\TopicsController::class, 'edit']);
Route::put('/admin/topics/{id}', [App\Http\Controllers\admin\TopicsController::class, 'update'])->name('topics.update');
Route::post('admin/topics/deleteTopic', [App\Http\Controllers\admin\TopicsController::class, 'destroy']);

Route::get('/admin/studyProgrammes', [App\Http\Controllers\admin\studyProgrammesController::class, 'index']);
Route::get('/admin/studyProgrammes/create', [App\Http\Controllers\admin\studyProgrammesController::class, 'create']);
Route::post('/admin/studyProgrammes', [App\Http\Controllers\admin\studyProgrammesController::class, 'store'])->name('studyProgrammes.store');
Route::get('/admin/studyProgrammes/{id}/edit', [App\Http\Controllers\admin\studyProgrammesController::class, 'edit']);
Route::put('/admin/studyProgrammes/{id}', [App\Http\Controllers\admin\studyProgrammesController::class, 'update'])->name('studyProgramme.update');
Route::post('admin/studyProgrammes/deleteStudyProgramme', [App\Http\Controllers\admin\studyProgrammesController::class, 'destroy']);

Route::get('/admin/theory', [App\Http\Controllers\admin\TheoryController::class, 'index']);
Route::get('/admin/theory/create', [App\Http\Controllers\admin\TheoryController::class, 'create']);
Route::post('/admin/theory', [App\Http\Controllers\admin\TheoryController::class, 'store'])->name('theory.store');
Route::get('/admin/theory/{id}/edit', [App\Http\Controllers\admin\TheoryController::class, 'edit']);
Route::put('/admin/theory/{id}', [App\Http\Controllers\admin\TheoryController::class, 'update'])->name('theory.update');
Route::post('admin/theory/deleteTheory', [App\Http\Controllers\admin\TheoryController::class, 'destroy']);

Route::get('/admin/quizes', [App\Http\Controllers\admin\QuizesController::class, 'index']);
Route::get('/admin/quizes/create', [App\Http\Controllers\admin\QuizesController::class, 'create']);
Route::post('/admin/quizes', [App\Http\Controllers\admin\QuizesController::class, 'store'])->name('quiz.store');
Route::get('/admin/quizes/{id}/edit', [App\Http\Controllers\admin\QuizesController::class, 'edit']);
Route::put('/admin/quizes/{id}', [App\Http\Controllers\admin\QuizesController::class, 'update'])->name('quizes.update');
Route::post('admin/quizes/deleteQuizes', [App\Http\Controllers\admin\QuizesController::class, 'destroy']);

Route::get('/admin/questions', [App\Http\Controllers\admin\QuestionsController::class, 'index']);
Route::get('/admin/questions/create', [App\Http\Controllers\admin\QuestionsController::class, 'create']);
Route::post('/admin/questions', [App\Http\Controllers\admin\QuestionsController::class, 'store'])->name('question.store');
Route::get('/admin/questions/{id}/edit', [App\Http\Controllers\admin\QuestionsController::class, 'edit']);
Route::put('/admin/questions/{id}', [App\Http\Controllers\admin\QuestionsController::class, 'update'])->name('question.update');
Route::post('admin/questions/deleteQuestions', [App\Http\Controllers\admin\QuestionsController::class, 'destroy']);

Route::get('/admin/options', [App\Http\Controllers\admin\OptionsController::class, 'index']);
Route::get('/admin/options/create', [App\Http\Controllers\admin\OptionsController::class, 'create']);
Route::post('/admin/options', [App\Http\Controllers\admin\OptionsController::class, 'store'])->name('option.store');
Route::get('/admin/options/{id}/edit', [App\Http\Controllers\admin\OptionsController::class, 'edit']);
Route::put('/admin/options/{id}', [App\Http\Controllers\admin\OptionsController::class, 'update'])->name('option.update');
Route::post('admin/options/deleteOptions', [App\Http\Controllers\admin\OptionsController::class, 'destroy']);


