<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasMataKuliahController;
use App\Http\Controllers\MataKuliahAcceptController;
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

Route::get('/acc', function () {
    return view('studentPrev');
});
