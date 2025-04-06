<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ticket</title>
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
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }
        h1 {
            text-align: center;
            color: #007BFF;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }
        label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
            color: #444;
        }
        input, select, textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            transition: 0.3s;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            font-size: 0.85rem;
            margin-bottom: 10px;
            display: block;
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
    <h2>Ticketing System</h2>
    <h2>Dashboard</h2>
      
        <a href="/iforms1">Pending Tickets</a>
        <a href="/agentAccepted">Accepted Tickets</a>
        <a href="/agentResolved">Resolved Tickets</a>
        <a href="/agentClosed">Closed Tickets</a>
        <a href="{{route('logout')}}" class="logout">Log out</a>
    </div>
    <div class="main-content">
        <div class="container">
            <h1>Accept Ticket</h1>
            @if(session('success'))
                <p style="color: green; text-align: center;">{{ session('success') }}</p>
            @endif
            <form action="/accept/{{$ticket[0]->id}}" method="post">
                @csrf
                <label for="title">Title:</label>
                <input type="text" name="title" value="{{$ticket[0]->title}}" disabled>
                @error('title')<span class="error">{{$message}}</span>@enderror
                
                <label for="description">Description:</label>
                <textarea id="description" name="description" disabled rows="4">{{$ticket[0]->description}}</textarea>
                @error('description')<span class="error">{{$message}}</span>@enderror

                <label for="submitted">Submitted by:</label>
                <input id="submitted" name="submitted" rows="4" value="{{$user->name}}" disabled>
                @error('submitted')<span class="error">{{$message}}</span>@enderror
                
                <label for="category">Change category:</label>
                <select id="category" name="category" disabled>
                    <option value="support" {{ $ticket[0]->category == 'support' ? 'selected' : '' }}>Support</option>
                    <option value="billing" {{ $ticket[0]->category == 'billing' ? 'selected' : '' }}>Billing</option>
                    <option value="technical" {{ $ticket[0]->category == 'technical' ? 'selected' : '' }}>Technical</option>
                    <option value="general" {{ $ticket[0]->category == 'general' ? 'selected' : '' }}>General Inquiry</option>
                </select>
                @error('category')<span class="error">{{$message}}</span>@enderror
                <label for="priority">Priority:</label>
                <select id="priority" name="priority">
                    <option value="" >Select priority</option>
                    <option value="critical" >Critical</option>
                    <option value="high" >High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
                @error('priority')<span class="error">{{$message}}</span>@enderror
                
               
               
              
                
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
