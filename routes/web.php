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


