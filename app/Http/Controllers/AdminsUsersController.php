<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminsUsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        //dd($user);
        return view('users.edit', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('admin/users');
    }




    protected function validateUser(){
        return request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'min:3'],
        ]);
    }
}
