<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //List all jobs
    public function index(){
        return view('jobs.index', [
            'jobs' => Job::latest()->filter(request(['tag', 'search']))->paginate(8)
        ]);
    }

    //Show single job
    public function show(Job $job){
        return view('jobs.show', [
            'job' => $job
        ]);
    }

    //Show create form
    public function create(){
        return view('jobs.create');
    }

    //Store job data
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        Job::create($formFields);

        return redirect('/')->with('message', 'Job Posted Successfully');
    }
}
