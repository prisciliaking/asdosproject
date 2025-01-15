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
use App\Http\Controllers\RegistrasiAsdosController;


Route::get('/', [UserController::class, 'showLoginRegisterForm'])->name('login');
Route::post('/', [UserController::class, 'login'])->name('login');
//not used yet
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register.view');
Route::post('/register', [UserController::class, 'register'])->name('register');


Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/users', [UserController::class, 'viewUsers'])->name('users');
    Route::get('/admins', [UserController::class, 'viewAdmins'])->name('admins');

    Route::get('/courses', [KelasMataKuliahController::class, 'index'])
        ->name('courses.index');

    Route::get('/approved', [AsdosAcceptController::class, 'showAsdos'])
        ->name('approved');

    Route::get('/approvedDetail', [AsdosAcceptController::class, 'index'])
        ->name('approvedDetail');

    Route::get('/approvedDetail/{kelasId}', [AsdosAcceptController::class, 'showDetail'])->name('approvedDetail');

    Route::get('/user/accepted-courses', [AsdosAcceptController::class, 'getMyAssignments'])->name('studentApproval');

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/addcourse', [KelasMataKuliahController::class, 'create'])->name('addCourse');
    Route::post('/addcourse', [KelasMataKuliahController::class, 'store'])->name('addCourse.store');

    // Route to display the list of courses
    Route::get('/courses', [KelasMataKuliahController::class, 'index'])->name('courses.index');

    // Route to show course details by ID
    Route::get('/courses/{id}', [KelasMataKuliahController::class, 'show'])->name('courses.show');

    // Route to display the edit form
    Route::get('/courses/{id}/edit', [KelasMataKuliahController::class, 'edit'])->name('courses.edit');

    // Route to update the course
    Route::put('/courses/{id}', [KelasMataKuliahController::class, 'update'])->name('courses.update');

    // Route to delete a course
    Route::delete('/courses/{id}', [KelasMataKuliahController::class, 'destroy'])->name('courses.destroy');

    Route::get('/registrasi-asdos', [RegistrasiAsdosController::class, 'create'])->name('registrasiAsdos.create');
    Route::post('/registrasi-asdos', [RegistrasiAsdosController::class, 'store'])->name('registrasiAsdos.store');
});




// // Route to show MataKuliah list and details
// Route::get('/courses', [MataKuliahController::class, 'index'])->name('courses.index');

// // // Route to fetch detailed Kelas Mata Kuliah data dynamically
// Route::get('/courses-details/{mata_kuliah_id}', [KelasMataKuliahController::class, 'showByMataKuliah'])->name('courses.details');
