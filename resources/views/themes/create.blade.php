@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add a new Theme</h1>

        <form method="post" action="/admin/themes">
            {{csrf_field()}}
            <div>
                <input type="text" class="input {{$errors->has('title') ? 'is-danger' : ''}}" name="name"
                       placeholder="Name" value="{{old('name')}}">
            </div>

            <div>
                <input class="input {{$errors->has('description') ? 'is-danger' : ''}}" name="description"
                       placeholder="Description" value="{{old('description')}}">
            </div>

            <div>
                <input class="input {{$errors->has('cdn') ? 'is-danger' : ''}}" name="cdn" placeholder="CDN"
                       value="{{old('cdn')}}">
            </div>

            <div>
                <button type="submit" class="btn btn-info">Add Theme</button>
            </div>

            @include ('errors')
        </form>
        <a href="{{route('themes')}}">
            <button class="btn btn-success">Go Back</button>
        </a>
    </div>
@endsection
