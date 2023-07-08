<?php

use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DepartmentController::class,'index']);
Route::resource('departments',DepartmentController::class);
Route::get('/departments/confirm-delete/{id}', [DepartmentController::class,'confirmDelete'])->name('departments.confirm');