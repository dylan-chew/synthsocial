<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostLike;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoritePostsController extends Controller
{
    public function index(Request $request)
    {
        $curUserId = $request->curUserId;   //grab the current user ID from the request and save it
        $user = User::find($curUserId);     //grab the correct model for the current user
        $likedPosts = $user->post_likes()->get();   //grab all of the posts that the current user likes

        return response()->json($likedPosts);
    }

    public function add(Request $request)
    {
        $curUserId = $request->curUserId;   //grab the current user ID from the request and save it
        $postId = $request->postId;         //grab the post id from the params

        //add variables to attributes array
        $attributes['user_id'] = $curUserId;
        $attributes['post_id'] = $postId;

        //save to database
        $querySuccess = DB::table('like_post')->insert([
            'post_id' => $postId,
            'user_id' => $curUserId,
        ]);

        if ($querySuccess) {
            return response()->json(['success' => 'success'], 200);
        } else {
            response()->json(['error' => 'invalid'], 401);
        }
    }

    public function remove(Request $request)
    {
        $curUserId = $request->curUserId;   //grab the current user ID from the request and save it
        $postId = $request->postId;         //grab the post id from the params

        //add variables to attributes array
        $attributes['user_id'] = $curUserId;
        $attributes['post_id'] = $postId;

        //delete from database
        $querySuccess = DB::table('like_post')
            ->where([
                ['user_id', $curUserId],
                ['post_id', $postId],
            ])
            ->delete();

        if ($querySuccess) {
            return response()->json(['success' => 'success'], 200);
        } else {
            response()->json(['error' => 'invalid'], 401);
        }
    }
}
