<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Tickets</title>
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
        }
        h1 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: #333;
        }
        .btn {
            display: inline-block;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            transition: background 0.3s;
        }
        .btn:hover {
            background-color: #2980b9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            background: white;
            border-radius: 5px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #2c3e50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .pagination-btn {
            padding: 10px 15px;
            margin: 2px;
            border-radius: 5px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            transition: 0.3s;
        }
        .pagination-btn:hover {
            background-color: #2980b9;
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

            <h1>Unaccepted Tickets</h1>
            @if(session('success'))
        <p class="message success" style="color:green">{{session('success')}}</p>
            @elseif(session('error'))
                <p class="message error" style="color:red">{{session('error')}}</p>
            @endif
            <form method="GET" action="{{ url('/iforms1') }}">
                <input type="text" name="search" placeholder="Search by title" value="{{ request('search') }}">
              
                <button type="submit" class="btn">Search</button>
            </form>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Issued by:</th>
                    <th>Date Updated</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                   
                </tr>
                @foreach($tickets as $ticket)
                <tr>
                    <td>{{$ticket->title}}</td>
                    <td>{{$ticket->category}}</td>
                    <td>{{$ticket->description}}</td>
                    <td>{{$ticket->status}}</td>
                    <td>{{$name}}</td>
                    <td>{{$ticket->updated_at}}</td>
                    <td>{{$ticket->created_at}}</td>
                    <td>
                       <a href="/accept/{{$ticket->id}}">Accept</a>
                    </td>
                  
                </tr>
                @endforeach
            </table>
            <div class="pagination">
                @if ($tickets->onFirstPage())
                    <span class="pagination-btn disabled">First</span>
                    <span class="pagination-btn disabled">Previous</span>
                @else
                    <a href="{{ $tickets->url(1) }}" class="pagination-btn">First</a>
                    <a href="{{ $tickets->previousPageUrl() }}" class="pagination-btn">Previous</a>
                @endif
                @foreach ($tickets->getUrlRange(max(1, $tickets->currentPage() - 2), min($tickets->lastPage(), $tickets->currentPage() + 2)) as $page => $url)
                    <a href="{{ $url }}" class="pagination-btn {{ $tickets->currentPage() == $page ? 'active' : '' }}">{{ $page }}</a>
                @endforeach
                @if ($tickets->hasMorePages())
                    <a href="{{ $tickets->nextPageUrl() }}" class="pagination-btn">Next</a>
                    <a href="{{ $tickets->url($tickets->lastPage()) }}" class="pagination-btn">Last</a>
                @else
                    <span class="pagination-btn disabled">Next</span>
                    <span class="pagination-btn disabled">Last</span>
                @endif
            </div>
        </div>
    </div>

    
</body>
</html>
