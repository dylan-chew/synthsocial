@extends('layouts.app')

@section ('content')
    <div class="container">
        <h1>Create a new Post</h1>

        <form method="post" action="/posts">
            @csrf
            <div>
                <input type="text" class="input form-control {{$errors->has('title') ? 'is-danger' : ''}}" name="title"
                       placeholder="Title" value="{{old('title')}}">
            </div>

            <div>
                <textarea  class="input form-control {{$errors->has('description') ? 'is-danger' : ''}}" name="body"
                          placeholder="Body" rows="4" value="{{old('body')}}">{{old('body')}}</textarea>
            </div>

            <div>
                <input class="input form-control {{$errors->has('cdn') ? 'is-danger' : ''}}" name="youtube_url" placeholder="YouTube embed URL"
                       value="{{old('youtube_url')}}">
            </div>

            <div>
                <button type="submit" class="btn btn-info">Create Post</button>
            </div>

            @include ('errors')
        </form>
        <a href="{{route('themes')}}">
            <button class="btn btn-success">Go Back</button>
        </a>
    </div>
@endsection
