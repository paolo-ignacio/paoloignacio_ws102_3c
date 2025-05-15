<?php

namespace App\Http\Controllers;
use Closure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class AuthController extends Controller
{
    
     public function showLogin(){
        return view('auth.login');


    }

    public function login(Request $request){
        
        $credentails = $request->only('email', 'password');
        $user = DB::table('users')->where('email', $credentails['email'])->first();

        if($user && Hash::check($credentails['password'], $user->password)){
            session(['loggedUser' => $user]);
            return redirect('/dashboard');
        } else {
            return back()->with('error', 'Invalid Credentails');
        }
    }

    public function handle($request, Closure $next){
        if(session()->has('loggedUser')){
            return redirect('/login')->with('error', 'Please logoin first');
        }

        return $next($request);
    }

    public function dashboard(){
        $user = session('loggedUser');
        return view('dashboard', compact('user'));
    }

    public function logout(){
        session()->forget('loggedUser');
        return redirect('/login');
    }
    public function create()
{
    return view('auth.register');
}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required', 'confirmed'
        ]);
            DB::table('users')->insert([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);


        return redirect()->route('login')->with('success', 'Registration successful!');
    }

}
