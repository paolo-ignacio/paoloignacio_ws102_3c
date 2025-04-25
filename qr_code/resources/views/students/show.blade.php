<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 50px 20px;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
        }

        h1 {
            font-size: 2rem;
            color: #343a40;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }

        p {
            font-size: 1.1rem;
            color: #495057;
            margin-bottom: 15px;
        }

        strong {
            color: #212529;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            font-size: 1rem;
            font-weight: 500;
            color: #fff;
            background-color: #6c757d;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            margin: 5px 5px 20px 0;
            transition: background-color 0.2s ease-in-out;
        }

        .btn:hover {
            background-color: #5a6268;
        }

        .mt-3 {
            margin-top: 1rem !important;
        }

        .mt-4 {
            margin-top: 1.5rem !important;
        }

        h4 {
            color: #007bff;
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 30px 15px;
            }

            h1 {
                font-size: 1.5rem;
            }

            p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back to List</a>


        <h1>{{ $student->fname }} {{ $student->lname }}</h1>

        <p><strong>Email:</strong> {{ $student->email }}</p>
        <p><strong>Program:</strong> {{ $student->program }}</p>

        <div class="mt-4">
            <h4>QR Code</h4>
            <div>{!! $qr !!}</div> 
        </div>
    </div>
</body>
</html>
