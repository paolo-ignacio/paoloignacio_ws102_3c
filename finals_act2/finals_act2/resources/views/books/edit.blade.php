<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
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
            text-align: center;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            font-size: 1rem;
            color: #495057;
        }

        input {
            font-size: 1rem;
            border-radius: 4px;
        }

        input.form-control {
            margin-bottom: 15px;
        }

        button {
            font-size: 1rem;
            padding: 10px 20px;
            border-radius: 5px;
        }

        button.btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        button.btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .container {
            max-width: 700px;
        }

        @media (max-width: 768px) {
            .container {
                padding-left: 20px;
                padding-right: 20px;
            }
        }

    </style>
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4">Edit Book</h1>

        <form action="{{route('books.update', $book->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" name="title" id="title" value="{{$book->title}}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author:</label>
                <input type="text" name="author" id="author" value="{{$book->author}}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="published_date" class="form-label">Published Date:</label>
                <input type="date" name="published_date" id="published_date" value="{{$book->published_date}}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Save Changes</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
