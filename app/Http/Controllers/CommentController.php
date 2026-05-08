<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create($post_id)
    {
        // Find the post by id
        $post = Post::findOrFail($post_id);
        $comment = new Comment();
        
        // Pass the post_id to the view
        return view('comments.create', compact('post_id','comment'));
    }

    // Store the form data
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'username' => 'required',
            'comment' => 'required',
            'post_id' => 'required|exists:posts,id' // Validate that the post exists
        ]);
    
        // Create the comment
        Comment::create($request->all());
    
        // Redirect back to the posts index page with a success message
        return redirect()->route('home_page.index')->with('message', 'Comment has been saved successfully');
    }

    // Destroy the comment with the id $id
    public function destroy($comment_id) {
        $comment = Comment::findOrFail($comment_id); // Ensure it throws an exception if not found
        $comment->delete();
        return back()->with('message', 'Comment has been deleted successfully');
    }
    
    // Display post details
    public function show($comment_id) {
        $comment = Comment::find($comment_id);
        return view('comments.show', compact('comment'));
    }

    // Display the edit form
    public function edit($comment_id){
        $comment = Comment::find($comment_id);
        return view('comments.edit', compact('comment')); 
    }

    // Update the user details from the edit form
    public function update($comment_id, Request $request){
        $request->validate([
            'username' => 'required',
            'comment' => 'required',
        ]);

        $comment = Comment::find($comment_id);
        $comment->update($request->all());

        return redirect()->route('home_page.index')->with('message', 'Comment has been updated successfully');
    }
}