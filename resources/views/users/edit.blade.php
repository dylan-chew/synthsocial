@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title">Edit User</h1>

        <form method="POST" action="/admin/users/{{$user->id}}" style="margin-bottom: 10px">
            @method('PATCH')
            @csrf

            <div class="form-group">
                <label class="label" for="title">Name</label>
                <input type="text" class="form-control" name="name" value="{{$user->name}}">

            </div>

            <div class="form-group">
                <label class="label" for="description">Email</label>
                <input type="email" class="form-control input" name="email" value="{{$user->email}}">
            </div>

            <div class="form-group">
                <h3>Roles</h3>
                <input type="checkbox"
                       name="userAdmin" {{$user->id === 2 ? 'disabled' : ''}} {{$user->hasRole('user admin') ? 'checked' : ''}}>
                <label for="userAdmin">User Admin</label><br/>
                <input type="checkbox" name="themeAdmin" {{$user->hasRole('theme admin') ? 'checked' : ''}}>
                <label for="userAdmin">Theme Admin</label><br/>
                <input type="checkbox" name="postAdmin" {{$user->hasRole('post admin') ? 'checked' : ''}}>
                <label for="userAdmin">Post Admin</label><br/>
            </div>


            <div class="field">
                <div class="control">
                    <button type="submit" class="btn btn-info is-link">Update User</button>
                </div>
            </div>
        </form>

        @include ('errors')

        <form method="post" action="/admin/users/{{$user->id}}">
            @method('DELETE')
            @csrf

            <div class="field">
                <div class="control">
                    <button type="submit" class="btn btn-danger" {{$user->id === 2 ? 'disabled' : ''}} >Delete User
                    </button>
                </div>
            </div>
        </form>

        <a href="{{route('users')}}">
            <button class="btn btn-success">Go Back</button>
        </a>
    </div>
@endsection
