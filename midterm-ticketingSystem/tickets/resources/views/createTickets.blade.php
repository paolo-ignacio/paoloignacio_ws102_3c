<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Ticket</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f4f6f9;
        }
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            position: fixed;
            height: 100vh;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .sidebar a:hover {
            background-color: #34495e;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        h1 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: #333;
            text-align: center;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        .btn {
            display: block;
            margin-top: 15px;
            padding: 12px;
            text-align: center;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s;
            width: 100%;
        }
        .btn:hover {
            background-color: #2980b9;
        }
        .success {
            color: green;
            text-align: center;
            margin-bottom: 10px;
        }
        .error {
            color: red;
            font-size: 0.9rem;
        }
        .logout {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #e74c3c;
            text-decoration: none;
        }
        .logout:hover {
            text-decoration: underline;
        }
        
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Dashboard</h2>
        <a href="/insertForm">Add Ticket</a>
        <a href="/iforms">View Tickets</a>
        <a href="{{route('logout')}}" class="logout">Log out</a>
    </div>
    <div class="main-content">
        <div class="container">
            @if(session('success'))
                <p class="success">{{ session('success') }}</p>
            @endif
            <h1>Create Ticket</h1>
            <form action="{{ route('insertForm') }}" method="post">
                @csrf
                <label for="title">Title:</label>
                <input type="text" name="title" value="{{ old('title') }}">
                @error('title')
                    <span class="error">{{ $message }}</span>
                @enderror

                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4">{{ old('description') }}</textarea>
                @error('description')
                    <span class="error">{{ $message }}</span>
                @enderror

                <label for="category">Category:</label>
                <select id="category" name="category">
                    <option value="">Select Category</option>
                    <option value="support">Support</option>
                    <option value="billing">Billing</option>
                    <option value="technical">Technical</option>
                    <option value="general">General Inquiry</option>
                </select>
                @error('category')
                    <span class="error">{{ $message }}</span>
                @enderror

                <label for="agent">Agent:</label>
                <select id="agent" name="agent">
                    <option value="">Select Agent</option>
                    @foreach(session('agents', []) as $agent)
                        <option value="{{ $agent->name }}">{{ $agent->name }}</option>
                    @endforeach
                </select>
                @error('agent')
                    <span class="error">{{ $message }}</span>
                @enderror

                <label for="priority">Priority:</label>
                <select id="priority" name="priority">
                    <option value="">Select Priority</option>
                    <option value="critical">Critical</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
                @error('priority')
                    <span class="error">{{ $message }}</span>
                @enderror

                <button type="submit" class="btn">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
