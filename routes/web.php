<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/create', [StudentController::class, 'create'])->name('create');
Route::get('/students', [StudentController::class, 'index'])->name('index');
Route::post('/store', [StudentController::class, 'store'])->name('students.store');
Route::post('/reset', [StudentController::class, 'resetStudents'])->name('students.reset');