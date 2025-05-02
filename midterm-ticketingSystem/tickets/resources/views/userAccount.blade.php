<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Create Account</title>
  <style>
    :root {
      --primary: #0A28D8;
      --accent: #FFDA27;
      --background: #f4f6fc;
      --text: #333;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      height: 100vh;
      width: 100vw;
      background: var(--background);
      display: flex;
      justify-content: center;
      align-items: center;
      background-image: linear-gradient(to bottom right, #e0e7ff, #fff);
    }

    .container {
      background: #fff;
      padding: 2.5rem 2rem;
      border-radius: 12px;
      box-shadow: 0 8px 30px rgba(10, 40, 216, 0.1);
      width: 100%;
      max-width: 400px;
    }

    h1 {
      text-align: center;
      font-size: 1.8rem;
      margin-bottom: 1.5rem;
      color: var(--primary);
    }

    label {
      font-weight: 600;
      font-size: 0.95rem;
      margin-bottom: 0.3rem;
      display: block;
      color: var(--text);
    }

    input {
      width: 100%;
      padding: 12px;
      border: 1.5px solid #ccc;
      border-radius: 8px;
      margin-bottom: 0.8rem;
      font-size: 1rem;
      transition: border 0.3s ease;
    }

    input:focus {
      border-color: var(--primary);
      outline: none;
    }

    .error {
      color: red;
      font-size: 0.8rem;
      margin-bottom: 0.5rem;
      text-align: left;
    }

    .btn {
      width: 100%;
      padding: 12px;
      font-size: 1rem;
      background-color: var(--primary);
      color: #fff;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #071fb4;
    }

    .link {
      text-align: center;
      margin-top: 1rem;
      font-size: 0.9rem;
    }

    .link a {
      color: var(--primary);
      text-decoration: none;
      font-weight: 600;
    }

    .link a:hover {
      text-decoration: underline;
    }

    ul {
      padding-left: 20px;
      margin-bottom: 1rem;
    }

    ul li {
      font-size: 0.85rem;
    }
  </style>
</head>
<body>

<div class="container">
  <h1>Create Account</h1>

  @if($errors->any())
      <ul style="color: red;">
          @foreach($errors->all() as $error)
              <li>{{$error}}</li>
          @endforeach
      </ul>
  @endif

  <form action="{{ route('account') }}" method="post">
    @csrf

    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name')
    <p class="error">{{$message}}</p>
    @enderror

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

    <button type="submit" class="btn">Sign up</button>
  </form>

  <p class="link">Already have an account? <a href="/login">Sign in</a></p>
</div>

</body>
</html>
