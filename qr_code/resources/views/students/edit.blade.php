<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
            color: #495057;
        }

        .form-control {
            width: 100%;
            padding: 10px 14px;
            font-size: 1rem;
            border: 1px solid #ced4da;
            border-radius: 6px;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            border-color: #80bdff;
            outline: none;
        }

        .btn {
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 6px;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .container {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit Student</h1>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="fname">Firstname:</label>
            <input type="text" name="fname" id="fname" class="form-control" value="{{ $student->fname }}" required>
        </div>

        <div class="form-group">
            <label for="lname">Lastname:</label>
            <input type="text" name="lname" id="lname" class="form-control" value="{{ $student->lname }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ $student->email }}" required>
        </div>

        <div class="form-group">
            <label for="program">Program:</label>
            <select name="program" id="program" class="form-control"  required>
            <option value="" disabled>Select a program</option>
            <option value="BSIT" {{ $student->program == 'BSIT' ? 'selected' : '' }}>BSIT</option>
            <option value="BSMATH" {{ $student->program == 'BSMATH' ? 'selected' : '' }}>BSMATH</option>
            <option value="BSSCI" {{ $student->program == 'BSSCI' ? 'selected' : '' }}>BSSCI</option>
            <option value="BSCE" {{ $student->program == 'BSCE' ? 'selected' : '' }}>BSCE</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update student</button>
    </form>
</div>
</body>
</html>
