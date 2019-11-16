@extends('layouts.app')

@section('content')
    <h1 class="title">Edit User</h1>

    <form method="POST" action="/admin/users/{{$user->id}}" style="margin-bottom: 10px">
        @method('PATCH')
        @csrf

        <div class="field">
            <label class="label" for="title">Name</label>

            <div class="control">
                <input type="text" class="input" name="name" value="{{$user->name}}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="description">Email</label>

            <div class="control">
                <input type="text" class="input" name="email" value="{{$user->email}}">
            </div>
        </div>

        <div>
            <h3>Roles</h3>
            <input type="checkbox" name="userAdmin" {{$user->hasRole('user admin') ? 'checked' : ''}}>
            <label for="userAdmin">User Admin</label><br/>
            <input type="checkbox" name="themeAdmin" {{$user->hasRole('theme admin') ? 'checked' : ''}}>
            <label for="userAdmin">Theme Admin</label><br/>
            <input type="checkbox" name="postAdmin" {{$user->hasRole('post admin') ? 'checked' : ''}}>
            <label for="userAdmin">Post Admin</label><br/>
        </div>


        <div class="field">
            <div class="control">
                <button type="submit" class="button btn-warning is-link">Update User</button>
            </div>
        </div>
    </form>

    @include ('errors')

    <form method="post" action="/admin/users/{{$user->id}}">
        @method('DELETE')
        @csrf

        <div class="field">
            <div class="control">
                <button type="submit" class="button btn-danger" {{$user->id === 2 ? 'disabled' : ''}} >Delete User</button>
            </div>
        </div>
    </form>

    <a href="{{route('users')}}"><button class="btn btn-success">Go Back</button></a>
@endsection
