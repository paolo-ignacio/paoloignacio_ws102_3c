<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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

        input.form-control, select.form-control {
            font-size: 1rem;
            border-radius: 4px;
        }

        .form-group {
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
            padding-top: 50px;
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
        <h1 class="mb-4">Add New Student</h1>

        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="fname" class="form-label">Firstname:</label>
                <input type="text" name="fname" id="fname" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="lname" class="form-label">Lastname:</label>
                <input type="text" name="lname" id="lname" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email:</label>
                <input type="text" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="program" class="form-label">Program:</label>
                <select name="program" id="program" class="form-control" required>
                    <option value="" disabled selected>Select a program</option>
                    <option value="BSIT">BSIT</option>
                    <option value="BSMATH">BSMATH</option>
                    <option value="BSSCI">BSSCI</option>
                    <option value="BSCE">BSCE</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success w-100 mt-3">Save Student</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
