<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\GestionStagiaireController;

// Route::get('/', function () {
//     return view('students.index');
// });



// Route::get('/',[StudentsController::class , 'index']);
Route::resource('students' , StudentsController::class);
Route::resource('modules' , ModuleController::class);
Route::resource('gestionnaire' , GestionStagiaireController::class);

Route::get('/signup', [UserController::class, 'afficher_register'])->name('afficher_register');
Route::post('/signup', [UserController::class, 'register'])->name('register');

Route::get('/', [UserController::class, 'afficher_login'])->name('afficher_login');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/test', [UserController::class, 'test']);
