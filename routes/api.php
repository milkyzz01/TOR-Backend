<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/wwlog', [LoginController::class, 'Log']);
Route::post('/display', [LoginController::class, 'addUser']);
Route::get('/students', [StudentController::class, 'fetchStudents']);
Route::post('/deleteStudents', [StudentController::class, 'deleteStudent']);
Route::post('/addStudent', [StudentController::class, 'addStudent']);
Route::get('/fetchStudent/{id}', [StudentController::class, 'fetchSpecificStudent']);


