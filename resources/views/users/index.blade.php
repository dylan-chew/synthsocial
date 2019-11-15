<!doctype html>
<html lang="en">
<head>
    <title></title>
</head>
<body>
<h1>All Users</h1>
<ul>
    @foreach ($users as $user)
        <li>
            <a href="/admin/users/{{$user->id}}">
                {{ $user->name }}
            </a>
            <a href="/admin/users/{{$user->id}}/edit">Edit User</a>
        </li>
    @endforeach
</ul>
</body>
</html>
