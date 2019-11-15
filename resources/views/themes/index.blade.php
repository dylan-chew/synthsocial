<!doctype html>
<html lang="en">
<head>
    <title></title>
</head>
<body>
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
</body>
</html>
