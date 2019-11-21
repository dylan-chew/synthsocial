<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
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

    public function destroy(Post $post)
    {
        $post->update(['deleted_by' => Auth::user()->id]);

        //delete the user/post like relationship from database
        DB::table('like_post')
            ->where([
                ['user_id', Auth::user()->id],
                ['post_id', $post->id],
            ])
            ->delete();

        $post->delete();

        return redirect('/');
    }

    public function showFavorites()
    {
        $curUser = Auth::user();
        $userPostLikes = $curUser->post_likes()->get();
        $favPosts = array();

        foreach ($userPostLikes as $userPostLike) {
            $postId = $userPostLike->post_id;
            $favPost = Post::find($postId);
            $favPosts[] = $favPost;
        }

        return view('posts.favorites', compact('favPosts'));
    }


    public function validatePost()
    {
        return request()->validate([
            'title' => ['required', 'min:3'],
            'body' => ['required', 'min:3'],
            'youtube_id' => ['required', 'min:3',],
        ]);
    }
}
