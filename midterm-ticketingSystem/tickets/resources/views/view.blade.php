<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Ticket</title>
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
            max-width: 550px;
            margin: auto;
        }
        h1 {
            font-size: 1.8rem;
            text-align: center;
            margin-bottom: 1.5rem;
            color: #333;
            font-weight: 600;
        }
        .ticket-info {
            display: grid;
            gap: 1rem;
        }
        .ticket-info div {
            display: flex;
            justify-content: space-between;
            padding: 12px 15px;
            background: #f8f9fc;
            border-radius: 6px;
            font-size: 1rem;
            color: #555;
            font-weight: 500;
        }
        .ticket-info div span {
            font-weight: 600;
            color: #222;
        }
        .btn {
            display: block;
            margin-top: 20px;
            padding: 12px;
            text-align: center;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
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
            <h1>Ticket Details</h1>
            <div class="ticket-info">
                <div><strong>Title:</strong> <span>{{$ticket[0]->title}}</span></div>
                <div><strong>Issued by:</strong> <span>{{$name[0]->name}}</span></div>
                <div><strong>Description:</strong> <span>{{$ticket[0]->description}}</span></div>
                <div><strong>Category:</strong> <span>{{$ticket[0]->category}}</span></div>
                <div><strong>Status:</strong> <span>{{$ticket[0]->status}}</span></div>
                <div><strong>Agent:</strong> <span>{{$ticket[0]->agent_id}}</span></div>
                <div><strong>Priority:</strong> <span>{{$ticket[0]->priority}}</span></div>
                <div><strong>Last Update:</strong> <span>{{$ticket[0]->updated_at}}</span></div>
                <div><strong>Date Created:</strong> <span>{{$ticket[0]->created_at}}</span></div>
            </div>
            
        </div>
    </div>
</body>
</html>
