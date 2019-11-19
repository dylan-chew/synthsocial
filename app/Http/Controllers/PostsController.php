<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        //validation
        $attributes = $this->validatePost();
        $attributes['created_by'] = Auth::user()->id;

        $post = Post::create($attributes);

        return redirect('/');
    }


    public function validatePost()
    {
        return request()->validate([
            'title' => ['required', 'min:3'],
            'body' => ['required', 'min:3'],
            'youtube_url' => ['required', 'min:3', 'url'],
        ]);
    }
}
