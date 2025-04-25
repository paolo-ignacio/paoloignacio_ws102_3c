<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ticketController extends Controller
{
    //

    public function createUserAccount(Request $request){
        $validate = $request->validate(
            [
                'name'=> 'required|string|min:8|max:30',
                'email'=> 'required|email:rfc,dns',
                'password'=> 'required|min:8|max:30'
            ]
        );

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        DB::insert("INSERT INTO userss (name, email, password) VALUES (?,?,?)", [$name, $email, $password]);
        return redirect('login');
    }

    public function account(){
        return view('userAccount');
    }



    public function login(){
        return view('login');
    }

    public function logout(){
        session()->invalidate(); 
        session()->regenerateToken();  

        return redirect('/login')->with('success', 'Logged out successfully.');
    }


    public function loginCredentials(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        
        $emailToCheck = DB::select("SELECT * FROM userss WHERE email = ?", [$email]);
    
        if (!empty($emailToCheck)) {
            $user = $emailToCheck[0]; 
    
            if ($password == $user->password) {
                $id = $user->id;
                session(['user_id' => $user->id]);
                
            
                $tickets = DB::table('ticketss')
                ->where('user_id', $id)
                ->where('status', 'open')
                ->where('agent_id' ,'')
                ->orderBy('id', 'desc')
                ->paginate(4);
    
                $agents = DB::select("SELECT name FROM agents");
                session(['agents' => $agents]);
    
                return view('tickets', compact('id', 'tickets'));
            }
        }
        return back()->withErrors(['password' => 'Invalid email or password.']);
    }
    public function login1(){
        return view('agentLogin');
    }
    public function agentLogin(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        
        $emailToCheck = DB::select("SELECT * FROM agents WHERE email = ?", [$email]);
  
        if (!empty($emailToCheck)) {
            $user = $emailToCheck[0]; 
    
            if ($password == $user->password) {
                $id = $user->id; // Logged-in agent's ID
                $agent_name = $user->name;
                session(['agent_id' => $id]);

                
                // Fetch tickets assigned to this agent
                $tickets = DB::table('ticketss')
                    ->where('status', 'open')
                    ->where('agent_id' ,'')
                    ->orderBy('id', 'desc') // Get all columns from ticketss
                    ->paginate(4); // Paginate results
                
                
                
                return view('agentTickets', compact('id', 'tickets'));
            }
        }
        return back()->withErrors(['password' => 'Invalid email or password.']);
    }

    public function view($id){
        $ticket = DB::select('select * FROM ticketss WHERE  id = ?',[$id]);
        $name = DB::select("select name from userss where id= ?", [$ticket[0]->user_id]);
        $comment = !empty($comments) ? $comments[0] : null;
        return view('view', compact('ticket', 'name', 'comment'));
    }
    public function viewAgent($id){
        $ticket = DB::select('select * FROM ticketss WHERE  id = ?',[$id]);
        $name = DB::select("select name from userss where id= ?", [$ticket[0]->user_id]);
        return view('veiwAgent', compact('ticket', 'name'));
    }
    public function view1($id){
        $ticket = DB::select('select * FROM ticketss WHERE  id = ?',[$id]);
        $name = DB::select("select name from userss where id= ?", [$ticket[0]->user_id]);
        $comments = DB::select("SELECT * FROM comment where ticket_id = ?", [$id]);
        $comment = !empty($comments) ? $comments[0] : null;
        return view('viewAgentTickets', compact('ticket', 'name', 'comment'));
    }

    
    public function createForm(){
        if (!session()->has('agents')) {
            $agents = DB::select("SELECT name FROM agents");
            session(['agents' => $agents]);
        }
        return view('createTickets');
     
    }
    public function iforms(Request $request) {
        $id = session('user_id');
    $search = $request->input('search'); // Get search query
 

    $query = DB::table('ticketss')->where('user_id', $id);
   
    if ($search) {
        $query->where('title', 'LIKE', "%$search%");
    }

    $query->where('status', 'open')
    ->where('agent_id', '')
    ->orderBy('id', 'desc');
    $tickets = $query->paginate(4); 
   
    if ($tickets->isEmpty()) {
        return view('tickets', compact('id', 'tickets', 'search'))->with('message', 'No data available here');
    }

    return view('tickets', compact('id', 'tickets', 'search'));
    }

    public function userAccepted(Request $request) {
        $id = session('user_id');
     $search = $request->input('search'); // Get search query
 

    $query = DB::table('ticketss')->where('user_id', $id);
   
    if ($search) {
        $query->where('title', 'LIKE', "%$search%");
    }

    $query->where('status', 'open')->orderBy('id', 'desc');;;
    $query->whereNotNull('agent_id'); // Ensure agent_id is not null
    $query->where('agent_id', '<>', ''); // Ensure agent_id is not empty
    $tickets = $query->paginate(4); 
   

    return view('userAcceptedTickets', compact('id', 'tickets', 'search'));
    }
    public function userResolved(Request $request) {
        $id = session('user_id');
     $search = $request->input('search'); // Get search query
 

    $query = DB::table('ticketss')->where('user_id', $id);
   
    if ($search) {
        $query->where('title', 'LIKE', "%$search%");
    }

    $query->where('status', 'resolved')->orderBy('id', 'desc');;;
    $tickets = $query->paginate(4); 
   

    return view('userResolvedTickets', compact('id', 'tickets', 'search'));
    }


    public function userClosed(Request $request) {
        $id = session('user_id');
     $search = $request->input('search'); // Get search query
 

    $query = DB::table('ticketss')->where('user_id', $id);
   
    if ($search) {
        $query->where('title', 'LIKE', "%$search%");
    }

    $query->where('status', 'closed')->orderBy('id', 'desc');;;
    $tickets = $query->paginate(4); 
   

    return view('userClosedTickets', compact('id', 'tickets', 'search'));
    }
    public function iforms1(Request $request) {
        $id = session('agent_id'); // Get logged-in agent's ID

        $search = $request->input('search'); // Get search query
        $agent_name = DB::select("SELECT * FROM agents where id = ?", [$id]);
        // Get status filter
        
        // Start query: Join ticketss with assignedTickets to get tickets assigned to this agent

        $query = DB::table('ticketss');
   
  
        // // Apply search filter (search by ticket title)
        if ($search) {
            $query->where('ticketss.title', 'LIKE', "%$search%");
        }
    
        // Apply status filter (only if it's not 'all')
        $query->where('status', 'open')->where('ticketss.agent_id' ,'')->orderBy('id', 'desc');
    
        $tickets = $query->paginate(4); // Paginate results
    
        return view('agentTickets', compact('id', 'tickets', 'search'));
    }

    public function accept($id){
       
        $ticket = DB::select("SELECT * FROM TICKETSS WHERE id = ?", [$id]);
        $users = DB::select("SELECT * FROM userss where id = ?", [$ticket[0]->user_id]);
        $user = $users[0]; 
        return View("Accept", compact('ticket', 'user'));
    }


    public function acceptInsert(Request $request, $id){
        $validated = $request->validate([
            'priority' => 'required|string'
        ]);
        $agent_name = "";
        if(session('agent_id') == 1){
            $agent_name = "Juan Dela Cruz";

        } else if(session('agent_id') == 2){
            $agent_name = "Maria Santos";
        }
         else if(session('agent_id') == 3){
                $agent_name = "Carlos Reyes";
         }
         $agent_id = session('agent_id');
        $priority = $request->input('priority');
        DB::insert("UPDATE ticketss SET priority = ?, agent_id = ? where id = ?", [$priority, $agent_name, $id]);
        DB::insert("INSERT INTO assignedTickets(ticket_id,agent_id) VALUES(?,?)",[$id, $agent_id]);
        return back()->with('success', 'Ticket accepted, you can now resolve the issue');

    }
    
// where i stopped with agentTikcets.view to put the issued by
// basically, I want to put who uploaded the tickets
    public function agentAccepted(Request $request){
        $agent_id = session('agent_id');
        $search = $request->input('search'); // Get search query
    
        $agent_name = DB::select("SELECT * FROM agents where id = ?", [$agent_id]);
       $query = DB::table('ticketss')->where('agent_id', $agent_name[0]->name);
      
      
       if ($search) {
           $query->where('title', 'LIKE', "%$search%");
       }
       $users = DB::select("SELECT * FROM userss");
       $user = $users[0]->name; 
       $query->where('status', 'open')->orderBy('id', 'desc');;;
       $query->whereNotNull('agent_id'); // Ensure agent_id is not null
       $query->where('agent_id', '<>', ''); // Ensure agent_id is not empty
       $tickets = $query->paginate(4); 
      
   
       return view('agentAccepted', compact('agent_id', 'tickets', 'search'));
    }


    public function agentResolved(Request $request){
        $agent_id = session('agent_id');
        $search = $request->input('search'); // Get search query
    
        $agent_name = DB::select("SELECT * FROM agents where id = ?", [$agent_id]);
       $query = DB::table('ticketss')->where('agent_id', $agent_name[0]->name);
      
      
       if ($search) {
           $query->where('title', 'LIKE', "%$search%");
       }
       $users = DB::select("SELECT * FROM userss");
       $user = $users[0]->name; 
       $query->where('status', 'resolved')->orderBy('id', 'desc');;;
       $query->whereNotNull('agent_id'); // Ensure agent_id is not null
       $query->where('agent_id', '<>', ''); // Ensure agent_id is not empty
       $tickets = $query->paginate(4); 
      
   
       return view('agentResolved', compact('agent_id', 'tickets', 'search'));
    }


    public function agentClosed(Request $request){
        $agent_id = session('agent_id');
        $search = $request->input('search'); // Get search query
    
        $agent_name = DB::select("SELECT * FROM agents where id = ?", [$agent_id]);
       $query = DB::table('ticketss')->where('agent_id', $agent_name[0]->name);
      
      
       if ($search) {
           $query->where('title', 'LIKE', "%$search%");
       }
       $users = DB::select("SELECT * FROM userss");
       $user = $users[0]->name; 
       $query->where('status', 'closed')->orderBy('id', 'desc');;;
       $query->whereNotNull('agent_id'); // Ensure agent_id is not null
       $query->where('agent_id', '<>', ''); // Ensure agent_id is not empty
       $tickets = $query->paginate(4); 
      
   
       return view('agentClosed', compact('agent_id', 'tickets', 'search'));
    }
    
    

    public function createTicket(Request $request){

        $validated = $request ->validate([
            'title'=> 'required|string|min:5|max:30',
            'description'=> 'required|string|max:60',
            'category'=> 'required',
          

        ]);
        $title = $request->input('title');
        $desc = $request->input('description');
        $cat = $request->input('category');
   
        $prio = $request->input('priority');
        $user_id = session('user_id');
        DB::insert("INSERT INTO ticketss(title, description, category, priority, status, user_id,agent_id, updated_at,created_at)
         VALUES (?,?,?,?,?,?,?, ?,?)", [$title, $desc, $cat, "",'open', $user_id, "",now(), now() ]);
        // $agent_id = 0;
        // $idResult = DB::select("SELECT id FROM ticketss ORDER BY id DESC LIMIT 1");
        // if($agent == "Juan Dela Cruz"){
        //     $agent_id = 1;
            
        // } else if($agent == "Maria Santos"){
        //     $agent_id = 2;
            
        // } else if($agent == "Carlos Reyes"){
        //     $agent_id = 3;
        // }
        
        // DB::insert("INSERT INTO assignedTickets (ticket_id, agent_id) VALUES (?, ?)", [$idResult[0]->id, $agent_id ]);
        return back()->with('success', 'Ticket submitted, please wait to resolve issue');
    }



    public function viewEditTicket($id){
        $ticket = DB::select("SELECT * FROM ticketss where id = ?", [$id]);
        return view('editTickets', compact('id','ticket'));
    }
    
    public function updateTickets(Request $request, $tid) {
        $validated = $request->validate([
            'title' => 'required|string|min:5|max:30',
            'description' => 'required|string|max:60',
            'category' => 'required',
        ]);
    
        $title = $request->input('title');
        $desc = $request->input('description');
        $cat = $request->input('category');

        $id = session('user_id');
        
 
        $agents = session('agents');
        DB::update('UPDATE ticketss SET title = ?, description = ?, category = ?, updated_at = ? WHERE id = ?', 
        [$title, $desc, $cat , now(), $tid]);
    
        return redirect('/iforms')->with('success', 'Ticket updated successfully.');
    }

    public function viewAgentTickets($id) {
        $agent_id = session('agent_id'); // Get logged-in agent's ID
    
        // Fetch the ticket ONLY if it's assigned to the logged-in agent
        $ticket = DB::table('ticketss')
            ->join('assignedTickets', 'ticketss.id', '=', 'assignedTickets.ticket_id')
            ->where('assignedTickets.agent_id', $agent_id)
            ->where('ticketss.id', $id)
            ->select('ticketss.*') // Get all ticket details
            ->first(); // Get a single result
    
        // If the ticket is not found (not assigned to this agent), show an error
        if (!$ticket) {
            return redirect('/agentAccepted')->with('error', 'You are not authorized to view this ticket.');
        }

        return view('agentEdit', compact('id', 'ticket'));
    }
    public function updateTickets1(Request $request, $tid) {
        $validated = $request->validate([
            'title' => 'required|string|min:5|max:30',
            'description' => 'required|string|max:60',
            'status' => 'required',
            'category' => 'required',
            'priority' => 'required',
        ]);
    
        $title = $request->input('title');
        $desc = $request->input('description');
        $cat = $request->input('category');
        $prio = $request->input('priority');
        $status = $request->input('status');
        $id = session('user_id');
        
 
        DB::update('UPDATE ticketss SET title = ?, description = ?, category = ?, priority = ?,  status = ?,updated_at = ? WHERE id = ?', 
        [$title, $desc, $cat, $prio, $status, now(), $tid]);
    
    
    return redirect('/agentAccepted')->with('success', 'Ticket updated successfully.');
    }
    public function removeTickets($id){

        $ticket = DB::select('SELECT status FROM ticketss WHERE id = ?', [$id]);
    
        if ($ticket[0]->status === 'open') {
            return back()->with('error', 'Cannot delete an open ticket. Please close or resolve it first.');
        }
    
        // Delete the ticket if it's not open
        DB::delete('DELETE FROM ticketss WHERE id = ?', [$id]);
    
        return back()->with('success', 'Ticket deleted successfully.');

        

    }
    public function removeTickets1($id) {
       
        $ticket = DB::select('SELECT status FROM ticketss WHERE id = ?', [$id]);
    
        if ($ticket[0]->status === 'open') {
            return back()->with('error', 'Cannot delete an open ticket. Please close or resolve it first.');
        }
    
        // Delete the ticket if it's not open
        DB::delete('DELETE FROM ticketss WHERE id = ?', [$id]);
    
        return back()->with('success', 'Ticket deleted successfully.');
    }
    
    public function comment($id){
        $tickets = DB::select("SELECT * FROM ticketss WHERE id = ?", [$id]);
        $ticket = $tickets[0];
        return view("comment", compact("ticket"));
    }

    public function commentInsert(Request $request, $id, $user_id){
        $validate = $request->validate([
            'comment' => 'required'
        ]);
        DB::insert("INSERT INTO comment(ticket_id,user_id,message,created_at) VALUES (?,?,?,?)", [$id, $user_id, $request->comment, now()]);
        return back()->with('success', 'Comment added successfully');
    }


    public function admin(){
        return view('adminLogin');
    }


    public function adminLogin(Request $request){
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        if($request->email == 'admin@gmail.com' && $request->password == 'admin'){


            
            return redirect('adminResolvedAll');
        }

        return back()->with('success', 'Login Successfully');
    }



    public function adminR(){
       $query = DB::table('ticketss')->where('status', 'resolved')->orderBy('id', 'desc');
       $tickets = $query->paginate(4); 
       return view('adminDashboard', compact('tickets'));
        
    }
    public function adminResolved(Request $request){

        
        $search = $request->input('search'); 
    
       $query = DB::table('ticketss');
      
      
       if ($search) {
           $query->where('title', 'LIKE', "%$search%");
       }

       $query->where('status', 'resolved')->orderBy('id', 'desc');;;
       $tickets = $query->paginate(4); 
       return view('adminDashboard', compact('tickets'));
    }

    public function adminCloseButton($id){
        DB::update('UPDATE ticketss SET status = ? WHERE id = ?', ['closed', $id]);


        return back()->with('success' ,'Ticket closed successfully');
    }


    public function adminC(){
        $query = DB::table('ticketss')->where('status', 'closed')->orderBy('id', 'desc');
        $tickets = $query->paginate(4); 
        return view('admin', compact('tickets'));
         
     }
     public function adminClosed(Request $request){
 
         
         $search = $request->input('search'); 
     
        $query = DB::table('ticketss');
       
       
        if ($search) {
            $query->where('title', 'LIKE', "%$search%");
        }
 
        $query->where('status', 'resolved')->orderBy('id', 'desc');;;
        $tickets = $query->paginate(4); 
        return view('admin', compact('tickets'));
     }
}
