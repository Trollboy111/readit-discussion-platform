<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{   
    // Create a new contact
    public function create() {
        $post = new Post();
        return view('posts.create', compact('post'));
    }

    // Store the form data
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'topic' => 'required',
            'title' => 'required',
            'comment' => 'required',
        ]);

        Post::create($request->all());
        return redirect()->route('home_page.index')->with('message', 'Post has been saved successfully');
    }
    
    // Destroy the post with the id $id
    public function destroy($id){
        $post = Post::find($id);
        $post->delete();
        return back()->with('message', 'Post and comments have been deleted successfully');
    }

    // Display the edit form
    public function edit($id){
        $post = Post::find($id);
        return view('posts.edit', compact('post')); 
    }

    // Update the user details from the edit form
    public function update($id, Request $request){
        $request->validate([
            'username' => 'required',
            'topic' => 'required',
            'title' => 'required',
            'comment' => 'required',
        ]);

        $post = Post::find($id);
        $post->update($request->all());

        return redirect()->route('home_page.index')->with('message', 'Post has been updated successfully');
    }

    // Display post details
    public function show($id) {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }
}