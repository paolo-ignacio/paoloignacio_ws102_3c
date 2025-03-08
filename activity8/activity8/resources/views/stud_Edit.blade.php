<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<form action="/update/{{$users[0]->id}}" method="post">

<h1>Edit</h1>
@csrf

<label for="name">Name:</label>
<input type="text" name="name" value="{{$users[0]->name}}">
<button type="submit">Submit to update</button>

</form>
    
</body>
</html>