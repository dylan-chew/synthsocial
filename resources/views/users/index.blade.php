@extends('layouts.app')

@section ('content')
    <div class="container">
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
                <input type="radio" name="userFilter" value="showAll" {{$showall ? 'checked' : ''}}>Show All Users<br/>
                <input type="submit">
            </form>
        </div>
        <table class="table table-striped table-hover text-center" >
            <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Created</th>
                <th>Roles</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                @if($user->hasAnyRole(['user admin', 'theme admin', 'post admin']) || $showall)
                    <tr>
                        <td class="align-middle">{{$user->name}}</td>
                        <td class="align-middle">{{$user->email}}</td>
                        <td class="align-middle">{{$user->created_at}}</td>
                        <td class="align-middle">
                            <ul class="list-group">
                            @foreach ($user->roles as $role)
                                    <li class="list-group-item">{{$role->name}}</li>
                            @endforeach
                            </ul>
                        </td>
                        <td class="align-middle">
                            <a href="/admin/users/{{$user->id}}/edit">
                                <button class="btn btn-info">Edit</button>
                            </a>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
