<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;
use \App\Models\Job;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$jobs = Job::with(['category','company'])->latest()->get();
        $jobs = Job::getRecords()->get();
        return view('jobs.index',['jobs'=> $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::getCategories();
        $companies = Company::all();
        return view('jobs.create',
            [
                'categories'=> $categories,
                'companies' => $companies
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>'required|string',
            'description'=> 'required',
            'salary' => 'required',
            'category_id'=> '',
            'company_id' => '',
            'state_id' => '',
            'open_date'=> 'date',
            'close_date'=> 'date',
            'status'=> ''
        ]);
    
        $jobs = Job::create($validatedData);
        $jobId = $jobs->id;

        //add category
        // $category = Category::find($validatedData['category_id']);
        // if(!empty($category)) {
        //     $category->job_id = $jobId;
        //     $category->save();
        // }

        return redirect()->back()->with('success', 'Job Successfully Created');
         
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job, Request $request)
    {
        $companies = Company::all();
        $categories = Category::getCategories();
        
        return view('jobs.edit',
            [
                'job'=> $job, 
                'companies'=>$companies, 
                'categories'=>$categories
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Job $job, Request $request)
    {
        //dd($job);
        $validatedData = $request->validate([
            'title'=>'required|string',
            'description'=> 'required',
            'salary' => 'required',
            'category_id'=> '',
            'company_id' => '',
            'state_id' => '',
            'open_date'=> 'date',
            'close_date'=> 'date',
            'status'=> ''
        ]);

        //dd($validatedData);
        
        //Update to new category
        $category = Category::find($validatedData['category_id']);
        if(!empty($category)) {
            $job->category_id = $category->id;
        }
        
        $job->update($validatedData);

        return redirect()->back()->with('success', 'Job Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job, Request $request)
    {
        $job->delete();
        // return redirect()->route('jobs.index')->with('success', 'Mesage D')
        session()->flash('success','Job Deleted Successfully');
        return response()->json([
            'success' => true,
            'message' => 'Job Deleted Successfully'
        ]);
    }
}
