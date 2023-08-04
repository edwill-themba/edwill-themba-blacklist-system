<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('login', [AuthController::class, 'login_view'])->name('login.view');

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth:web'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard.view');
});
