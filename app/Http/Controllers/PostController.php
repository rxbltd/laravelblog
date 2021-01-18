<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Post;
use App\Category;

class PostController extends Controller
{
    public function details($slug)
    {
        $post = Post::where('slug',$slug)->first();

        // Session View Count as Visited Site User
        $blogKey = 'blog_'. $post->id;
        if(!Session::has($blogKey))
        {
        	$post->increment('view_count');
        	Session::put($blogKey,1);
        }
        $randomposts = Post::all()->random(3);
        $categories = Category::all();
        return view('post', compact('categories', 'post', 'randomposts'));
    }

    public function index()
    {
    	$posts = Post::latest()->paginate(12);
    	return view('posts', compact('posts'));
    }
}
