<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [StudentController::class, 'student'])->name('student');
Route::get('/input', [StudentController::class, 'input'])->name('input');
Route::post('/input', [StudentController::class, 'insert'])->name('insert');

Route::get('/show/{id}', [StudentController::class, 'show'])->name('show');
Route::post('/edit/{id}', [StudentController::class, 'edit'])->name('edit');

Route::get('/delete/{id}', [StudentController::class, 'delete'])->name('delete');

// Export PDF
Route::get('/exportpdf', [StudentController::class, 'exportpdf'])->name('exportpdf');

