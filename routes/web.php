<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasMataKuliahController;
use App\Http\Controllers\MataKuliahAcceptController;
use App\Http\Controllers\UserController;
use App\Models\MataKuliahAccept;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/courses', [KelasMataKuliahController::class, 'index'])->name('courses.index');

Route::get('/addcourse', function () {
    return view('addCourse');
});

Route::get('/approved', [MataKuliahAcceptController::class, 'index'])->name('approved.index');

Route::get('/approved/{id}/students', [MataKuliahAcceptController::class, 'showAcceptedStudents'])->name('course.details');

Route::get('/home', function () {
    return view('home');
})->name('home');


Route::get('/login', [UserController::class, 'showLoginRegisterForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register.view');
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/users', [UserController::class, 'viewUsers'])->name('users');

Route::get('/user/accepted-courses', [MataKuliahAcceptController::class, 'userAcceptedCourses'])
    ->name('user.acceptedCourses');


