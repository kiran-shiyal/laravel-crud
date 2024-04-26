<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\Authenticate;
Route::get('/', function () {
    return view('welcome');
});

Route::resource('students', StudentController::class);
Route::get('/login',[StudentController::class, 'login'])->name('login');
Route::post('/post/login',[StudentController::class, 'postLogin'])->name('post.login');

Route::get('/logout', [StudentController::class, 'logout'])->name('logout');

Route::get('/dataTable', [StudentController::class, 'dataTable'])->name('datatable');

