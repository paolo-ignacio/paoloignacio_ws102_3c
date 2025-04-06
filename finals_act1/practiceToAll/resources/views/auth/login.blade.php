<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    form {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
        width: 400px;
        max-width: 100%;
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-size: 14px;
        color: #555;
        margin-bottom: 8px;
    }

    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
        color: #333;
        box-sizing: border-box;
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
        border-color:rgb(84, 119, 189);
        outline: none;
    }

    .error {
        color: red;
        font-size: 12px;
        margin-bottom: 10px;
    }

    .success {
        color: green;
        font-size: 14px;
        margin-bottom: 10px;
    }

    button {
        width: 100%;
        padding: 12px;
        background-color: rgb(84, 119, 189);
        color: white;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: rgb(84, 119, 189);
    }

    p {
        text-align: center;
        color: #777;
    }

    a {
        color:rgb(84, 119, 189);
        text-decoration: none;
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
    }

    .error-message {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }
</style>

</head>
<body>

        <form action="/login" method="post">
<h1>Login</h1>
            @csrf

            @if(session('success'))
                <p style="color:green">{{session('success')}}</p>
            @endif

            <label for="email">Email: </label>
            <input type="email" name="email" value="{{old('email')}}"> <br>
            @error('email')
                <p style="color:red">{{$message}}</p>
            @enderror
            <label for="password">Password: </label>
            <input type="password" name="password">
            @error('password')
                <p style="color:red">{{$message}}</p>
            @enderror
            <br>
            <p>Don't have an account yet? <a href="{{route('register')}}">Sign up</a></p>
            <button type="submit">Login</button>
        </form>
    
</body>
</html>
