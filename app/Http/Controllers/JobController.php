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
        //dd($request->file('logo'));
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        //dd($formFields);

        Job::create($formFields);

        return redirect('/')->with('message', 'Job Posted Successfully');
    }

    //Show edit form
    public function edit(Job $job){
        return view('jobs.edit', ['job' => $job]);
    }

    //Update job data
    public function update(Request $request, Job $job){
        //dd($request->file('logo'));

        //Logged in user is owner
        if($job->user_id != auth()->id()){
            abort(403, 'Unauthorized Action!');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $job->update($formFields);

        return back()->with('message', 'Job Updated Successfully');
    }

    //Delete Job
    public function destroy(Job $job){
        $job->delete();
        return redirect('/')->with('message', 'Job Deleted!');
    }

    //Manage Jobs
    public function manage(){
        return view('jobs.manage', ['jobs' => auth()->user()
        ->jobs()->get()]);
    }

}
