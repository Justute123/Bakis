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
