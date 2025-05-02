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
        height: 100vh;
        background-color: #0A28D8;
        background-image: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23FFDA27' fill-opacity='0.1'%3E%3Crect width='2' height='2'/%3E%3Crect x='10' width='2' height='2'/%3E%3Crect y='10' width='2' height='2'/%3E%3Crect x='10' y='10' width='2' height='2'/%3E%3C/g%3E%3C/svg%3E");
        background-repeat: repeat;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
    }
    .container {
        background: #fff;
        padding: 3rem 2rem;
        border-radius: 15px;
        box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 400px;
        color: #333;
    }
    h1 {
        font-size: 2rem;
        margin-bottom: 1.5rem;
        color: #0A28D8;
        text-align: center;
    }
    label {
        display: block;
        font-size: 0.95rem;
        font-weight: 600;
        margin: 1rem 0 0.3rem;
    }
    input {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 1rem;
        outline: none;
        transition: border-color 0.3s;
    }
    input:focus {
        border-color: #0A28D8;
    }
    .error {
        color: red;
        font-size: 0.85rem;
        margin-top: 0.2rem;
    }
    .btn {
        margin-top: 1.5rem;
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 8px;
        background-color: #0A28D8;
        color: white;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s, transform 0.2s;
    }
    .btn:hover {
        background-color: #001a9c;
        transform: scale(1.02);
    }
    .link {
        margin-top: 1.2rem;
        font-size: 0.9rem;
        text-align: center;
    }
    .link a {
        color: #0A28D8;
        font-weight: 600;
        text-decoration: none;
    }
    .link a:hover {
        text-decoration: underline;
    }
    .error-list {
        color: red;
        font-size: 0.85rem;
        text-align: left;
        padding-left: 1rem;
        margin-bottom: 1rem;
    }

    @media (max-width: 480px) {
        .container {
            padding: 2rem 1.5rem;
        }
    }
</style>

</head>
<body>

<div class="container">
    <h1>Welcome Back</h1>

    @if($errors->any())
        <ul class="error-list">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('login') }}" method="post">
        @csrf

        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')
        <p class="error">{{ $message }}</p>
        @enderror

        <label for="password">Password</label>
        <input type="password" name="password">
        @error('password')
        <p class="error">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn">Log in</button>
    </form>

    <p class="link">Don't have an account? <a href="/account">Sign up</a></p>
    <p class="link">Are you an agent? <a href="/agentLog">Agent Login</a></p>
</div>

</body>
</html>
