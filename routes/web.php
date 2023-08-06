<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentTeacherController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BlackListController;

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
    return view('auth.login');
});
// directs user to login view
Route::get('/', [AuthController::class, 'login_view'])->name('login.view');
// logs the user in
Route::post('login', [AuthController::class, 'login'])->name('login');
// protected routes 
Route::middleware('auth')->group(function () {
    // directs the user to the dashboard
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard.view');
    // route log the user out
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout.user');
    // student teacher list
    Route::get('student_teachers', [StudentTeacherController::class, 'index'])->name('student_teacher.lists');
    // return the create student teacher screen
    Route::get('student_teacher', [StudentTeacherController::class, 'create'])->name('student_teacher.create');
    // store the student
    Route::post('student_teacher', [StudentTeacherController::class, 'store'])->name('student_teacher.store');
    // student show  student
    Route::get('student_teacher/{id}', [StudentTeacherController::class, 'show'])->name('student_teacher.show');
    // show the edit view
    Route::get('student_teacher/{id}/edit', [StudentTeacherController::class, 'edit'])->name('student_teacher.edit');
    // update student teacher details
    Route::patch('student_teacher/{id}', [StudentTeacherController::class, 'update'])->name('student_teacher.update');
    // student edit vew
    Route::delete('student_teacher/{id}', [StudentTeacherController::class, 'destroy'])->name('student_teacher.destroy');
    // list schools
    Route::get('schools', [SchoolController::class, 'index'])->name('school.lists');
    // school create view
    Route::get('school', [SchoolController::class, 'create'])->name('school.create');
    // school store
    Route::post('school', [SchoolController::class, 'store'])->name('school.store');
    // show single school
    Route::get('school/{id}', [SchoolController::class, 'show'])->name('school.show');
    // shows school edit view
    Route::get('school/{id}/edit', [SchoolController::class, 'edit'])->name('school.edit');
    // update school
    Route::patch('school/{id}', [SchoolController::class, 'update'])->name('school.update');
    // delete school
    Route::delete('school/{id}', [SchoolController::class, 'destroy'])->name('school.destroy');
    // search school or student
    Route::post('search', [SearchController::class, 'search'])->name('search');
    // create a black list view
    Route::get('blacklist/{id}', [BlackListController::class, 'create'])->name('blacklist.create');
    // blacklist student
    Route::post('blacklist', [BlackListController::class, 'store'])->name('blacklist.store');
    // student black list
    Route::get('student_blacklist/{id}', [BlackListController::class, 'student_black_list'])->name('student.blacklist');
    // get student black listed by that school
    Route::get('school_blacklist/{name}', [BlackListController::class, 'school_black_list'])->name('school.blacklist');
});


