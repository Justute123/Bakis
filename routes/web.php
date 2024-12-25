<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChatGPTController;

Route::get('/', function () {
    return view('pages/index');
});

Route::get('/index', function () {
    return view('pages/index');
});


Route::get('/newsAsStudent', function () {
    return view('pages/newsAsStudent');
})->middleware('student');
Route::get('/quiz', function () {
    return view('pages/quiz');
})->middleware('student');
Route::get('/tools', function () {
    return view('pages/tools');
})->middleware('student');


Route::get('/nonhierarchy', function () {
    return view('pages/nonhierarchy');
})->middleware('student');




Route::get('/theory', [App\Http\Controllers\theoryController::class, 'index'])->middleware('student');
Route::get('/theory/{id}', [App\Http\Controllers\theoryController::class, 'filterTheoryById'])->middleware('student');
Route::get('/theory/{id}/show', [App\Http\Controllers\theoryController::class, 'show'])->middleware('student');
Route::get('/quiz', [App\Http\Controllers\QuizController::class, 'index'])->middleware('student');
Route::get('/quiz/{id}', [App\Http\Controllers\QuizController::class, 'filterQuestionsByQuizId'])->middleware('student');
Route::post('/submitAnswer/{id}', [App\Http\Controllers\QuizController::class, 'submitAnswer'])->name('submit')->middleware('student');
Route::get('/solved', [App\Http\Controllers\ResultsController::class, 'index'])->middleware('student');
Route::post('/sortedByTotal', [App\Http\Controllers\ResultsController::class, 'sortedByTotal'])->name('sorted')->middleware('student');
Route::get('/bloom', [App\Http\Controllers\BloomController::class, 'index'])->middleware('student');
Route::get('/quizesFilteredByBloom/{id}', [App\Http\Controllers\BloomController::class, 'filterQuizesByBloomId'])->middleware('student');
Route::get('/search/{id}', [App\Http\Controllers\theoryController::class, 'search'])->name('theory.search')->middleware('student');










Route::get('/home',[HomeController::class,'index']);


Route::get('/admin/users', [App\Http\Controllers\admin\UsersController::class, 'index'])->middleware('admin');
Route::get('/admin/users/create', [App\Http\Controllers\admin\UsersController::class, 'create'])->middleware('admin');
Route::post('/admin/users', [App\Http\Controllers\admin\UsersController::class, 'store'])->name('store')->middleware('admin');
Route::get('/admin/users/{id}/edit', [App\Http\Controllers\admin\UsersController::class, 'edit'])->middleware('admin');
Route::put('/admin/users/{id}', [App\Http\Controllers\admin\UsersController::class, 'update'])->name('students.update')->middleware('admin');
Route::post('admin/users/deleteStudent', [App\Http\Controllers\admin\UsersController::class, 'destroy'])->middleware('admin');;

Route::get('/admin/topics', [App\Http\Controllers\admin\TopicsController::class, 'index'])->middleware('admin');
Route::get('/admin/topics/create', [App\Http\Controllers\admin\TopicsController::class, 'create'])->middleware('admin');
Route::post('/admin/topics', [App\Http\Controllers\admin\TopicsController::class, 'store'])->name('topics.store')->middleware('admin');
Route::get('/admin/topics/{id}/edit', [App\Http\Controllers\admin\TopicsController::class, 'edit'])->middleware('admin');
Route::put('/admin/topics/{id}', [App\Http\Controllers\admin\TopicsController::class, 'update'])->name('topics.update')->middleware('admin');
Route::post('admin/topics/deleteTopic', [App\Http\Controllers\admin\TopicsController::class, 'destroy'])->middleware('admin');

Route::get('/admin/studyProgrammes', [App\Http\Controllers\admin\studyProgrammesController::class, 'index'])->middleware('admin');
Route::get('/admin/studyProgrammes/create', [App\Http\Controllers\admin\studyProgrammesController::class, 'create'])->middleware('admin');
Route::post('/admin/studyProgrammes', [App\Http\Controllers\admin\studyProgrammesController::class, 'store'])->name('studyProgrammes.store')->middleware('admin');
Route::get('/admin/studyProgrammes/{id}/edit', [App\Http\Controllers\admin\studyProgrammesController::class, 'edit'])->middleware('admin');
Route::put('/admin/studyProgrammes/{id}', [App\Http\Controllers\admin\studyProgrammesController::class, 'update'])->name('studyProgramme.update')->middleware('admin');
Route::post('admin/studyProgrammes/deleteStudyProgramme', [App\Http\Controllers\admin\studyProgrammesController::class, 'destroy'])->middleware('admin');

Route::get('/admin/theory', [App\Http\Controllers\admin\TheoryController::class, 'index'])->middleware('admin');
Route::get('/admin/theory/create', [App\Http\Controllers\admin\TheoryController::class, 'create'])->middleware('admin');
Route::post('/admin/theory', [App\Http\Controllers\admin\TheoryController::class, 'store'])->name('theory.store')->middleware('admin');
Route::get('/admin/theory/{id}/edit', [App\Http\Controllers\admin\TheoryController::class, 'edit'])->middleware('admin');
Route::put('/admin/theory/{id}', [App\Http\Controllers\admin\TheoryController::class, 'update'])->name('theory.update')->middleware('admin');
Route::post('admin/theory/deleteTheory', [App\Http\Controllers\admin\TheoryController::class, 'destroy'])->middleware('admin');

Route::get('/admin/quizes', [App\Http\Controllers\admin\QuizesController::class, 'index'])->middleware('admin');
Route::get('/admin/quizes/create', [App\Http\Controllers\admin\QuizesController::class, 'create'])->middleware('admin');
Route::post('/admin/quizes', [App\Http\Controllers\admin\QuizesController::class, 'store'])->name('quiz.store')->middleware('admin');
Route::get('/admin/quizes/{id}/edit', [App\Http\Controllers\admin\QuizesController::class, 'edit'])->middleware('admin');
Route::put('/admin/quizes/{id}', [App\Http\Controllers\admin\QuizesController::class, 'update'])->name('quizes.update')->middleware('admin');
Route::post('admin/quizes/deleteQuizes', [App\Http\Controllers\admin\QuizesController::class, 'destroy'])->middleware('admin');

Route::get('/admin/questions', [App\Http\Controllers\admin\QuestionsController::class, 'index'])->middleware('admin');
Route::get('/admin/questions/create', [App\Http\Controllers\admin\QuestionsController::class, 'create'])->middleware('admin');
Route::post('/admin/questions', [App\Http\Controllers\admin\QuestionsController::class, 'store'])->name('question.store')->middleware('admin');
Route::get('/admin/questions/{id}/edit', [App\Http\Controllers\admin\QuestionsController::class, 'edit'])->middleware('admin');
Route::put('/admin/questions/{id}', [App\Http\Controllers\admin\QuestionsController::class, 'update'])->name('question.update')->middleware('admin');
Route::post('admin/questions/deleteQuestions', [App\Http\Controllers\admin\QuestionsController::class, 'destroy'])->middleware('admin');

Route::get('/admin/options', [App\Http\Controllers\admin\OptionsController::class, 'index'])->middleware('admin')->middleware('admin');
Route::get('/admin/options/create', [App\Http\Controllers\admin\OptionsController::class, 'create'])->middleware('admin')->middleware('admin');
Route::post('/admin/options', [App\Http\Controllers\admin\OptionsController::class, 'store'])->name('option.store')->middleware('admin');
Route::get('/admin/options/{id}/edit', [App\Http\Controllers\admin\OptionsController::class, 'edit'])->middleware('admin');
Route::put('/admin/options/{id}', [App\Http\Controllers\admin\OptionsController::class, 'update'])->name('option.update')->middleware('admin');
Route::post('admin/options/deleteOptions', [App\Http\Controllers\admin\OptionsController::class, 'destroy'])->middleware('admin');


Route::get('/admin/solvedQuizesHistory', [App\Http\Controllers\admin\ShowResults::class, 'index'])->middleware('admin');

Route::get('/hierarchy', [App\Http\Controllers\aglomerativeController::class, 'index'])->middleware('student');
Route::post('/hierarchy', [App\Http\Controllers\aglomerativeController::class, 'upload'])->name('upload')->middleware('student');
Route::get('/kMeans', [App\Http\Controllers\kMeansController::class, 'index'])->middleware('student');
Route::post('/kMeans', [App\Http\Controllers\kMeansController::class, 'upload'])->name('upload2')->middleware('student');
Route::get('/kMedoids', [App\Http\Controllers\kMedoidsController::class, 'index'])->middleware('student');
Route::post('/kMedoids', [App\Http\Controllers\kMedoidsController::class, 'upload'])->name('upload3')->middleware('student');
Route::post('/admin/chatgpt', [ChatGPTController::class, 'index'])->name('chat-gpt.index')->middleware('admin');
Route::get('/admin/chatgpt', [App\Http\Controllers\admin\TheoryController::class, 'create'])->middleware('admin');



