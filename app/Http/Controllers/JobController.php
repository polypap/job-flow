<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \App\Models\Job;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::with('category')->latest()->get();
        return view('jobs.index',['jobs'=> $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::getCategories();
        return view('jobs.create', ['categories'=> $categories]);
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
            'category_id'=> ''
        ]);
    
        $jobs = Job::create($validatedData);
        $jobId = $jobs->id;
        $category = Category::find($validatedData['category_id']);
        if(!empty($category)) {
            $category->job_id = $jobId;
            $category->save();
        }
        //dd($jobs );

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
