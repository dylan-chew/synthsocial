@extends('layouts.app')

@section('content')
    <h1 class="title">Edit Theme</h1>

    <form method="POST" action="/admin/themes/{{$theme->id}}" style="margin-bottom: 10px">
        @method('PATCH')
        @csrf

        <div class="field">
            <label class="label" for="title">Name</label>

            <div class="control">
                <input type="text" class="input" name="name" value="{{$theme->name}}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="description">Description</label>

            <div class="control">
                <input type="text" class="input" name="description" value="{{$theme->description}}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="description">CDN</label>

            <div class="control">
                <input type="text" class="input" name="cdn" value="{{$theme->cdn}}">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update Theme</button>
            </div>
        </div>
    </form>

    @include ('errors')

    <form method="post" action="/admin/themes/{{$theme->id}}">
        @method('DELETE')
        @csrf

        <div class="field">
            <div class="control">
                <button type="submit" class="button">Delete Theme</button>
            </div>
        </div>
    </form>
@endsection
