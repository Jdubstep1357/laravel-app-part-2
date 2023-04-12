<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     *
     */

    public function index()
    {
        // Shows everything on main page
        $categories = Category::all();
        
        
        // above is same as below
        // return view('categories.index', [
        //     'categories' => $categories
        // ]);

        // view is categories.index, var_name is 'categories'
        // categories is subfolder index is file
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // shows page with creation of form
        return view(view:'categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // How data is inserted into database
        Category::create([
            'name' => $request->input(key:'name')
        ]);

        // takes back to original page
        return redirect()->route(route: 'categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param \App\Models\Category
     * @return \Illuminate\Http\Response
     */
    // find category by id
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->input(key:'name')
        ]);

        return redirect()->route(route: 'categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // How records get deleted
        $category->delete();

        return redirect()->route(route: 'categories.index');
    }
}
