<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f9f9f9;
        }
        .container {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }
        h1 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        label {
            display: block;
            text-align: left;
            font-size: 0.9rem;
            font-weight: 600;
            margin: 0.5rem 0 0.2rem;
        }
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            outline: none;
            transition: border 0.3s;
        }
        input:focus {
            border-color: #007bff;
        }
        .error {
            color: red;
            font-size: 0.8rem;
            text-align: left;
        }
        .btn {
            margin-top: 1rem;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .link {
            margin-top: 1rem;
            font-size: 0.9rem;
        }
        .link a {
            color: #007bff;
            text-decoration: none;
        }
        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Welcome Admin!</h1>
    <h3>Log in</h3>

    @if($errors->any())
        <ul style="color: red; font-size: 0.9rem; text-align: left; padding-left: 15px;">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{route('admin')}}" method="post">
        @csrf

        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')
        <p class="error">{{$message}}</p>
        @enderror

        <label for="password">Password</label>
        <input type="password" name="password">
        @error('password')
        <p class="error">{{$message}}</p>
        @enderror

        <button type="submit" class="btn">Log in</button>
    </form>

  
</div>

</body>
</html>
