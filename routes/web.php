<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('students.index');
// });



// Route::get('/',[StudentsController::class , 'index']);
Route::resource('students' , StudentsController::class);

Route::get('/signup', [UserController::class, 'afficher_register'])->name('afficher_register');
Route::post('/signup', [UserController::class, 'register'])->name('register');

Route::get('/login', [UserController::class, 'afficher_login'])->name('afficher_login');
Route::post('/login', [UserController::class, 'login'])->name('login');