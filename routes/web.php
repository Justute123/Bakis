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

Route::get('/admin/users', [App\Http\Controllers\admin\UsersController::class, 'index']);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dash', function () {
        return view('pages/dash');
    })->name('dashboard');
});
