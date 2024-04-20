<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
       // Fetch all posts
       $posts = Post::latest()->get();
        
       // Fetch recent posts (assuming you have a method to get recent posts)
       $recentPosts = Post::latest()->limit(3)->get();
       
       // Pass the posts and recentPosts data to the view
       return view('dashboard', compact('posts', 'recentPosts'));
    }
}
