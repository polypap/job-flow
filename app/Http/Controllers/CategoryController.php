<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::getRecords();
        return view('jobs.category.index',['categories'=> $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:50',
            'description'=>''
        ]);
        
        Category::create($validatedData);

        return redirect()->route('categories.create')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('jobs.category.edit', ['category'=> $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Category $category, Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:2|max:50',
            'description'=>'',
            'status' => ''
        ]);

        $category->update( $validatedData );

        return redirect()->back()->with('success', 'Category successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category Deleted successfully');
    }
}
