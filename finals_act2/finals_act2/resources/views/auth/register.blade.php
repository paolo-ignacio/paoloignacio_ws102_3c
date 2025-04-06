

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

    input[type="text"],
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

    input[type="text"]:focus,
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
        background-color:rgb(84, 119, 189);
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

    /* Error messages */
    .error-message {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }
</style>
</head>
<body>

        <form action="/register" method="post" >
<h1>Sign up</h1>



            @csrf

            @if($errors->any())

            @foreach($errors as $error)
            <p style="color: red;">{{$error}}</p>
            @endforeach


            @endif

            <label for="name">Name: </label>
            <input type="text" name="name" value="{{old('name')}}">
            @error('name')
                <p style="color: red;">{{$message}}</p>
            @enderror
            <br>
            <label for="">Email: </label>
            <input type="email" name="email" value="{{old('email')}}">
            @error('email')
                <p style="color: red;">{{$message}}</p>
            @enderror
            <br>
            <label for="">Password: </label>
            <input type="password" name="password">
            @error('password')
                <p style="color: red;">{{$message}}</p>
            @enderror
            <br>
            <label for="password_confirmation">Confirm Password: </label>
            <input type="password" name="password_confirmation">

            <br>
            <p>Already have an account? <a href="{{route('login')}}">Login</a></p>
            <button type="submit">Register</button>

        </form>
    
</body>
</html>
