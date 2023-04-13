<?php

namespace App\Http\Controllers;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     *@return \Illuminate\Http\Response
     */

    public function index()
    {
        // Load categories with 
        // Shows everything on main page. Last 5 minutes of video
        $posts = Post::with(relations: 'category')->get();
        
        
     
        return view('posts.index', compact(var_name: 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        // shows page with creation of form
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // Code is inside of StorePostRequest class for variables
        // cmd click on StorePostRequest

        // How data is inserted into database
        Post::create([
            'title' => $request->input(key:'title'),
            'post_text' => $request->input(key:'post_text'),
            'category_id' => $request->input(key:'category_id'),

        ]);

        // takes back to original page
        return redirect()->route(route: 'posts.index');
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
    public function edit(Post $post)
    {
        $categories = Category::all();

        // compact can pass many parameters
        // should be: compact(var_name: 'post', ...var_names:'categories')
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update([
            'title' => $request->input(key:'title'),
            'post_text' => $request->input(key:'post_text'),
            'category_id' => $request->input(key:'category_id'),

        ]);

        return redirect()->route(route: 'posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // How records get deleted
        $category->delete();

        return redirect()->route(route: 'posts.index');
    }
}
