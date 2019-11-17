@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>All Themes</h1>
    <table class="table-striped table table-hover text-center">
        <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Created</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($themes as $theme)
            <tr>
                <td >{{$theme->name}}</td>
                <td>{{$theme->description}}</td>
                <td>{{$theme->created_at}}</td>
                <td>
                    <a href="/admin/themes/{{$theme->id}}/edit">
                        <button class="btn btn-info">Edit</button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="/admin/themes/create"><button class="btn btn-success">Add New Theme</button></a>
    </div>
@endsection
