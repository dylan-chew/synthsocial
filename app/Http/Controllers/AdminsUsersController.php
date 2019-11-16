<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminsUsersController extends Controller
{
    public function __construct()
    {
        //use built in auth middleware to see if user is even logged in first.
        //then check if they have the right privileges
        $this->middleware(['auth', 'useradmin']);
    }

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
        return view('users.edit', compact('user'));
    }

    public function update(User $user)
    {
        $attributes = $this->validateUser();
        $attributes['last_modified_by'] = Auth::user()->id;

        $user->update($attributes);

        return redirect('admin/users');
    }

    public function destroy(User $user)
    {
        $user->update(['deleted_by' => Auth::user()->id]);
        $user->delete();

        return redirect('admin/users');
    }


    protected function validateUser()
    {
        return request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'min:3', 'email'],
        ]);
    }
}
