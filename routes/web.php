<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\IsVerifyEmail;
use Egulias\EmailValidator\EmailValidator;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', function () {
    return view('register');
});
Route::resource('students', StudentController::class);

Route::get('/students', [StudentController::class, 'index'])->name('students.index')->middleware(IsVerifyEmail::class);
Route::get('/login', [StudentController::class, 'login'])->name('login');
Route::post('/post/login', [StudentController::class, 'postLogin'])->name('post.login');

Route::get('/logout', [StudentController::class, 'logout'])->name('logout');

Route::get('/dataTable', [StudentController::class, 'dataTable'])->name('datatable');

Route::get('/email/verify/{hash}', [EmailVerificationController::class, 'emailVerification'])->name('email.verify');
