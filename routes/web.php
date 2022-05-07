<?php

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
Route::get('/', function () {
    return view('jobs',[
        'heading' => 'Latest jobs',
        'jobs' => Job::all()
    ]);
});

//Single job
Route::get('/jobs/{id}', function($id){
    return view('job', [
        'job' => Job::find($id)
    ]);
});

