<?php

use App\Http\Controllers\AsdosAcceptController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasMataKuliahController;
use App\Http\Controllers\MataKuliahAcceptController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\UserController;
use App\Models\AsdosAccept;
use App\Models\KelasMataKuliah;
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

Route::get('/approved', [AsdosAcceptController::class, 'showAsdos'])
    ->name('approved');

Route::get('/approvedDetail', [AsdosAcceptController::class, 'index'])
    ->name('approvedDetail');

Route::get('/approvedDetail/{kelasId}', [AsdosAcceptController::class, 'showDetail'])->name('approvedDetail');




// Route untuk menampilkan form tambah kelas mata kuliah
Route::get('/addcourse', [KelasMataKuliahController::class, 'create'])->name('addCourse');

// // Route untuk menyimpan data kelas mata kuliah baru
// Route::post('/addcourse', [KelasMataKuliahController::class, 'store'])->name('addCourse.store');
// routes/web.php
Route::post('/addcourse', [KelasMataKuliahController::class, 'store'])->name('addCourse');


// Route untuk menampilkan daftar kelas mata kuliah
Route::get('/courses', [KelasMataKuliahController::class, 'index'])->name('courses.index');

// Route untuk menampilkan detail kelas mata kuliah berdasarkan ID
Route::get('/courses/{id}', [KelasMataKuliahController::class, 'show'])->name('courses.show');

// Route untuk menampilkan form edit kelas mata kuliah
Route::get('/courses/{id}/edit', [KelasMataKuliahController::class, 'edit'])->name('courses.edit');

// Route untuk memperbarui data kelas mata kuliah
Route::put('/courses/{id}', [KelasMataKuliahController::class, 'update'])->name('courses.update');

// Route untuk menghapus kelas mata kuliah
Route::delete('/courses/{id}', [KelasMataKuliahController::class, 'destroy'])->name('courses.destroy');




//not used yet
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register.view');
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/addcourse', function () {
    return view('addCourse');
});



// // Route to show MataKuliah list and details
// Route::get('/courses', [MataKuliahController::class, 'index'])->name('courses.index');

// // // Route to fetch detailed Kelas Mata Kuliah data dynamically
// Route::get('/courses-details/{mata_kuliah_id}', [KelasMataKuliahController::class, 'showByMataKuliah'])->name('courses.details');
