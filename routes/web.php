<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\FacultyTeacherController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
Route::post('/teacher', [TeacherController::class, 'store'])->name('teacher.store');
Route::get('/teacher/{id}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::put('/teacher/{id}', [TeacherController::class, 'update'])->name('teacher.update');
Route::delete('/teacher/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');

Route::get('/faculties', [FacultyController::class, 'index'])->name('faculties.index');
Route::get('/faculties/create', [FacultyController::class, 'create'])->name('faculties.create');
Route::post('/faculties', [FacultyController::class, 'store'])->name('faculties.store');
Route::get('/faculties/{id}/edit', [FacultyController::class, 'edit'])->name('faculties.edit');
Route::put('/faculties/{id}', [FacultyController::class, 'update'])->name('faculties.update');
Route::delete('/faculties/{id}', [FacultyController::class, 'destroy'])->name('faculties.destroy');

Route::get('/faculty_teacher',[FacultyTeacherController::class,'index'])->name('faculty_teacher.index');
Route::get('/faculty_teacher/create',[FacultyTeacherController::class,'create'])->name('faculty_teacher.create');
Route::post('/faculty_teacher',[FacultyTeacherController::class,'store'])->name('faculty_teacher.store');
Route::get('/faculty_teacher/{id}/edit',[FacultyTeacherController::class,'edit'])->name('faculty_teacher.edit');
Route::put('/faculty_teacher/{id}',[FacultyTeacherController::class,'update'])->name('faculty_teacher.update');
Route::delete('/faculty_teacher/{id}',[FacultyTeacherController::class,'destroy'])->name('faculty_teacher.destroy');
