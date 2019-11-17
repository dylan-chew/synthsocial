@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="title">Edit Theme</h1>

        <form class="" method="POST" action="/admin/themes/{{$theme->id}}" style="margin-bottom: 10px">
            @method('PATCH')
            @csrf

            <div class="form-group">
                <label class="label" for="title">Name</label>

                <div class="control">
                    <input type="text" class="input form-control" name="name" value="{{$theme->name}}">
                </div>
            </div>

            <div class="form-group">
                <label class="label" for="description">Description</label>

                <div class="control">
                    <input type="text" class="input form-control" name="description" value="{{$theme->description}}">
                </div>
            </div>

            <div class="form-group">
                <label class="label" for="description">CDN</label>

                <div class="control">
                    <input type="text" class="input form-control" name="cdn" value="{{$theme->cdn}}">
                </div>
            </div>

            <div class="form-group">
                <div class="control">
                    <button type="submit" class="btn btn-info is-link">Update Theme</button>
                </div>
            </div>
        </form>

        @include ('errors')

        <form method="post" action="/admin/themes/{{$theme->id}}">
            @method('DELETE')
            @csrf

            <div class="field">
                <div class="control">
                    <button type="submit" class="btn btn-danger" {{$theme->is_default ? 'disabled' : ''}}>Delete Theme
                    </button>
                </div>
            </div>
        </form>

        <a href="{{route('themes')}}">
            <button class="btn btn-success">Go Back</button>
        </a>
    </div>
@endsection
