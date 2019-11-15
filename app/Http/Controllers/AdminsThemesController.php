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

    public function edit(Theme $theme)
    {
        return view('themes.edit', compact('theme'));
    }

    public function update(User $user)
    {
        $user->update($this->validateUser());

        return redirect('admin/users');
    }
}
