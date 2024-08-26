<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       
        $request->validate([
           'title' => 'required',
            'slug' => 'required',
            'post' => 'required'
        ]); 
       
        return Post::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return Post::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $Post = Post::find($id);
        $Post->update($request->all());
        return Post::find($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
       return Post::destroy($id);
    }


       /**
     * This will search a Post
     */
    public function search(string $title)
    {
        //
       return Post::where('title', 'like', '%'.$title.'%')->get();
    }
}
