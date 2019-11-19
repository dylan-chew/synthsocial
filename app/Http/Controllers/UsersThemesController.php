<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Http\Request;

class UsersThemesController extends Controller
{
    public function set(Request $request){
        $themeToSet = Theme::find($request->input('themeId'));

        return redirect()->back()->withCookie(cookie('userTheme', $themeToSet));
    }
}
