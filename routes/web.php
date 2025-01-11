<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasMataKuliahController;
use App\Http\Controllers\MataKuliahAcceptController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\UserController;
use App\Models\MataKuliahAccept;

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/', [UserController::class, 'showLoginRegisterForm'])->name('login');
Route::post('/', [UserController::class, 'login'])->name('login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/users', [UserController::class, 'viewUsers'])->name('users');
Route::get('/admins', [UserController::class, 'viewAdmins'])->name('admins');

Route::get('/courses', [KelasMataKuliahController::class, 'index'])
    ->name('courses.index');







//not used yet
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register.view');
Route::post('/register', [UserController::class, 'register'])->name('register');

// Route::get('/addcourse', function () { return view('addCourse'); });

// Route to show MataKuliah list and details
// Route::get('/courses', [MataKuliahController::class, 'index'])->name('courses.index');

// // Route to fetch detailed Kelas Mata Kuliah data dynamically
// Route::get('/courses-details/{mata_kuliah_id}', [KelasMataKuliahController::class, 'showByMataKuliah'])->name('courses.details');
