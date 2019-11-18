<?php

namespace App\Http\Controllers;

use App\User;
use App\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminsThemesController extends Controller
{
    public function __construct()
    {
        //use built in auth middleware to see if user is even logged in first.
        //then check if they have the right privileges
        $this->middleware(['auth', 'themeadmin']);
    }

    public function index()
    {
        $themes = Theme::all();

        return view('themes.index', compact('themes'));
    }

    public function show(Theme $theme)
    {
        return view('themes.show', compact('theme'));
    }

    public function create()
    {
        return view('themes.create');
    }

    public function store()
    {
        //validation
        $attributes = $this->validateTheme();
        $attributes['created_by'] = Auth::user()->id;

        $theme = Theme::create($attributes);

        return redirect('/admin/themes');
    }

    public function edit(Theme $theme)
    {
        return view('themes.edit', compact('theme'));
    }

    public function update(Theme $theme)
    {
        $attributes = $this->validateTheme();
        $attributes['last_modified_by'] = Auth::user()->id;
        $theme->update($attributes);

        return redirect('/admin/themes');
    }

    public function destroy(Theme $theme)
    {
        $theme->delete();

        return redirect('/admin/themes');
    }

    public function setDefault(Theme $theme)
    {
        $currentDefault = Theme::where('is_default', 1)->first();
        $attributes['is_default'] = 0;
        //dd($currentDefault);
        $currentDefault->update($attributes);
        $attributes['is_default'] = 1;
        $theme->update($attributes);

        return redirect('/admin/themes');
    }


    public function validateTheme()
    {
        return request()->validate([
            'name' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            'cdn' => ['required', 'min:3', 'url'],
        ]);
    }
}
