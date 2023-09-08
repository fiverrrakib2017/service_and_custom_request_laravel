<?php

use App\Http\Controllers\studentController;
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

/* Student Route */
Route::get('/',[studentController::class,'index'])->name('student.list');
Route::post('/student/add',[studentController::class,'store'])->name('student.store');
Route::get('/student/delete/{deleteId}',[studentController::class,'delete'])->name('student.delete');
Route::post('/student/update',[studentController::class,'update'])->name('student.update');
