<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentTeacherController;

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
// directs user to login view
Route::get('login', [AuthController::class, 'login_view'])->name('login.view');
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
});
