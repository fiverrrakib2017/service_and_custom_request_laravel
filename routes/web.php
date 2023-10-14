<?php

use App\Http\Controllers\OrderController;
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



Route::get('send/email', function(){

	$send_mail = 'test@gmail.com';

    dispatch(new App\Jobs\SendEmailQueueJob($send_mail));

    dd('send mail successfully !!');
});


Route::get('orders', [OrderController::class, 'index']);
Route::get('orders/{id}', [OrderController::class, 'show']);
Route::post('orders', [OrderController::class, 'store']);
Route::put('orders/{id}', [OrderController::class, 'update']);
Route::delete('orders/{id}', [OrderController::class, 'delete']);
