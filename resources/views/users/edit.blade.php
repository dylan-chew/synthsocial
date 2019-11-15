@extends('layout')

@section('content')
    <h1 class="title">Edit User</h1>

    <form method="POST" action="/projects/{{$user->id}}" style="margin-bottom: 10px">
        @method('PATCH')
        @csrf

        <div class="field">
            <label class="label" for="title">Name</label>

            <div class="control">
                <input type="text" class="input" name="title" placeholder="Title" value="{{$user->name}}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="description">Email</label>

            <div class="control">
                <textarea type="text" class="textarea" name="description">{{$user->email}}</textarea>
            </div>
        </div>

        <div class="field">
            <label class="label" for="description">Email</label>

            <div class="control">
                <textarea type="text" class="textarea" name="description">{{$user->email}}</textarea>
            </div>
        </div>

        //Roles?

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update User</button>
            </div>
        </div>
    </form>

{{--    @include ('errors')--}}

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
