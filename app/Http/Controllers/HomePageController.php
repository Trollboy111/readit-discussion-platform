<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index() {
        $topicFilter = request('topic');
        
        $posts = Post::when($topicFilter, function ($query, $topicFilter) {
            return $query->where('topic', $topicFilter);
        })->orderBy('created_at')->get(['id', 'username', 'topic', 'title', 'comment', 'created_at']);
        
        $comments = Comment::orderBy('created_at')->get(['id', 'username', 'comment', 'post_id', 'created_at']);
        
        $postsWithComments = $posts->map(function ($post) use ($comments) {
            $post->comments = $comments->where('post_id', $post->id);
            return $post;
        });
        
        $topics = Post::distinct()->pluck('topic');
    
        return view('home_page.index', compact('postsWithComments', 'topics', 'topicFilter'));
    }
}