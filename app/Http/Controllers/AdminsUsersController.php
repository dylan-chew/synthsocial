<?php

namespace App\Http\Controllers;

use App\Role;
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

    public function index(Request $request)
    {
        $users = User::all();

        if ($request->userFilter == 'showAll') {
            $showall = true;
        } else {
            $showall = false;
        }

        return view('users.index', compact(['users', 'showall']));
    }

    public function search(Request $request)
    {
        $searchString = $request->searchString;
        $users = User::where('name', 'LIKE', '%' . $searchString . '%')
            ->orWhere('email', 'LIKE', '%' . $searchString . '%')
            ->get();

        $showall = true;

        return view('users.index', compact(['users', 'showall']));
    }

    public function show(User $user)
    {

        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $attributes = $this->validateUser();
        $attributes['last_modified_by'] = Auth::user()->id;

        //updating roles
        $userAdminRole = $request->userAdmin;
        $themeAdminRole = $request->themeAdmin;
        $postAdminRole = $request->postAdmin;
        $role_user = Role::where('name', 'user admin')->first();
        $role_theme = Role::where('name', 'theme admin')->first();
        $role_post = Role::where('name', 'post admin')->first();
        $role_default = Role::where('name', 'default')->first();

        //strip all roles from user so we don't duplicate roles in DB
        $user->roles()->detach($role_user);
        $user->roles()->detach($role_theme);
        $user->roles()->detach($role_post);

        if ($userAdminRole) {
            $user->roles()->attach($role_user);
            $user->roles()->detach($role_default);
        } else {
            $user->roles()->detach($role_user);
        }

        if ($themeAdminRole) {
            $user->roles()->attach($role_theme);
            $user->roles()->detach($role_default);
        } else {
            $user->roles()->detach($role_theme);
        }

        if ($postAdminRole) {
            $user->roles()->attach($role_post);
            $user->roles()->detach($role_default);
        } else {
            $user->roles()->detach($role_post);
        }
        //give default user role back if nothing checked
        if (!$userAdminRole && !$themeAdminRole && !$postAdminRole) {
            $user->roles()->attach($role_default);
        }

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
