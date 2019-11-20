<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritePostsController extends Controller
{
    public function index(Request $request)
    {



        return response()->json($request);
    }
}
