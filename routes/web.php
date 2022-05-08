<?php

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;

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
//All jobs
Route::get('/', [JobController::class, 'index']);

//Show create form
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');

//Store job data
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');

//Show edit form
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth');

//Update job
Route::put('/jobs/{job}', [JobController::class, 'update'])->middleware('auth');

//Delete job
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->middleware('auth');

//Manage Jobs
Route::get('/jobs/manage', [JobController::class, 'manage'])->middleware('auth');

//Show single job
Route::get('/jobs/{job}', [JobController::class, 'show']);

//Register user form
Route::get('/register', [UserController::class, 'register'])->middleware('guest');

//Create new user
Route::post('/users', [UserController::class, 'store']);

//Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


