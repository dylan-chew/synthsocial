<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminsUsersController extends Controller
{
    public function __construct()
    {
        //use built in auth middleware to see if user is even logged in first.
        //then check if they have the right privileges
        $this->middleware(['auth', 'useradmin']);
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user admin']);

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

    public function update(User $user)
    {
        $user->update($this->validateUser());

        return redirect('admin/users');
    }

    public function destroy(User $user)
    {
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
