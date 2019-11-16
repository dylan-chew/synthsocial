<?php

namespace App\Http\Controllers;

use App\User;
use App\Theme;
use Illuminate\Http\Request;

class AdminsThemesController extends Controller
{
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

        $theme = Theme::create($attributes);

        return redirect('/admin/themes');
    }

    public function edit(Theme $theme)
    {
        return view('themes.edit', compact('theme'));
    }

    public function update(Theme $theme)
    {
        $theme->update($this->validateTheme());

        return redirect('/admin/themes');
    }

    public function destroy(Theme $theme)
    {
        $theme->delete();

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
