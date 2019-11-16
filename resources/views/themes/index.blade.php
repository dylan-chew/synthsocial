@extends('layouts.app')

@section('content')
<h1>All Themes</h1>
<ul>
    @foreach ($themes as $theme)
        <li>
            <a href="/admin/themes/{{$theme->id}}">
                {{ $theme->name }}
            </a>
            <a href="/admin/themes/{{$theme->id}}/edit">Edit Theme</a>
        </li>
    @endforeach
</ul>

<a href="/admin/themes/create">Add New Theme</a>
@endsection
