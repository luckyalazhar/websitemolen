<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;




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

Route::get('/', [HeroController::class, 'index'])->name('hero');

Route::get('/insert', [HeroController::class, 'insert'])->name('insert');
Route::post('/insertdata', [HeroController::class, 'insertdata'])->name('insertdata');

Route::get('/edit/{id}', [HeroController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [HeroController::class, 'update'])->name('update');

Route::get('/delete/{id}', [HeroController::class, 'delete'])->name('delete');

Route::get('/admin', [AdminController::class, 'dashboard'])->name('dashboard');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('store');

