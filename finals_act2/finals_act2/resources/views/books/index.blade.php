<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> <!-- Optional: For custom CSS -->
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
}

h1 {
    font-size: 2.5rem;
    color: #343a40;
    font-weight: bold;
}

button {
    font-size: 1rem;
}

ul.list-group {
    list-style-type: none;
    padding-left: 0;
}

ul.list-group-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
    background-color: #ffffff;
    border: 1px solid #dee2e6;
    border-radius: 5px;
    padding: 15px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

ul.list-group-item a, ul.list-group-item form {
    margin-left: 10px;
}

ul.list-group-item .btn {
    padding: 0.5rem 1rem;
}

ul.list-group-item .btn-danger {
    background-color: #e74c3c;
    border-color: #e74c3c;
}

ul.list-group-item .btn-danger:hover {
    background-color: #c0392b;
}

ul.list-group-item .btn-warning {
    background-color: #f39c12;
    border-color: #f39c12;
}

ul.list-group-item .btn-warning:hover {
    background-color: #e67e22;
}

.container {
    max-width: 900px;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

form button {
    padding: 8px 16px;
}

a {
    text-decoration: none;
}

a.btn-primary {
    font-size: 1.1rem;
    padding: 10px 20px;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

a.btn-primary:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body class="bg-light">
    <div class="container py-5">
        <header class="d-flex justify-content-between align-items-center mb-4">
            <h1>All Books</h1>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </header>

        <a href="{{route('books.create')}}" class="btn btn-primary mb-3">Add New Book</a>

        <ul class="list-group">
            @foreach($books as $book)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{$book->title}}</strong> by {{$book->author}} ({{$book->published_date}})
                    </div>
                    <div>
                        <a href="{{route('books.edit', $book->id)}}" class="btn btn-sm btn-warning me-2">Edit</a>
                        <form action="{{route('books.destroy', $book->id)}}" method="post" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
