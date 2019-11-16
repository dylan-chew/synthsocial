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

        Edit roles here?

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update User</button>
            </div>
        </div>
    </form>

    @include ('errors')

    <form method="post" action="/admin/users/{{$user->id}}">
        @method('DELETE')
        @csrf

        <div class="field">
            <div class="control">
                <button type="submit" class="button">Delete User</button>
            </div>
        </div>
    </form>
@endsection
