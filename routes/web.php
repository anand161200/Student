<?php

use App\Http\Controllers\Employee;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

// to do list

Route::get('index',[StudentController::class, 'index'])->name('index');
Route::get('student',[StudentController::class,'studentData'])->name('student');
Route::get('updateStatus/{id}/{check}',[StudentController::class,'updateStatus']);
Route::get('deleteStatus/{id}',[StudentController::class,'deleteStatus']);

// pagination 

Route::get('emp_list',[EmployeeController::class,'employelist']);
Route::post('emp_data',[EmployeeController::class,'employeeData']);

// add model

Route::post('addEmployee',[EmployeeController::class,'addEmployee']);

