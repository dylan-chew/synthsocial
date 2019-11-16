@extends('layouts.app')

@section ('content')
    <h1>Manage Users</h1>
    <div>
        <form method="POST" action="/admin/users/search">
            @csrf
            <input type="text" name="searchString">
            <input type="submit" value="Search Users">
        </form>
        <form method="GET" action="/admin/users">
            @csrf
            <input type="radio" name="userFilter" value="adminsOnly" {{!$showall ? 'checked' : ''}}>Admins Only<br/>
            <input type="radio" name="userFilter" value="showAll" {{$showall ? 'checked' : ''}}>Show All Users<br />
            <input type="submit">
        </form>
    </div>
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Created</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            @if($user->hasAnyRole(['user admin', 'theme admin', 'post admin']) || $showall)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>
                    <a href="/admin/users/{{$user->id}}/edit">
                        <button class="btn btn-info">Edit</button>
                    </a>
                </td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@endsection
