<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="/insert">Add student</a>
<table border="1">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Actions</td>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td><a href="update/{{$user->id}}">Edit</a>|<a href="/delete/{{$user->id}}">Delete</a></td>
    </tr>
    @endforeach
</table>

    
</body>
</html>