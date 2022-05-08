<?php

use App\Http\Controllers\JobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

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
Route::get('/jobs/create', [JobController::class, 'create']);

//Store job data
Route::post('/jobs', [JobController::class, 'store']);

//Show edit form
Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);

//Update job
Route::put('/jobs/{job}', [JobController::class, 'update']);

//Show single job
Route::get('/jobs/{job}', [JobController::class, 'show']);


