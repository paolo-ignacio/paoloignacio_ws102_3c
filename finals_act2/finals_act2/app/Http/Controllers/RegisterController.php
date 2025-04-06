<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    //



    public function showRegistrationForm(){
        return view('auth.register');
    }


    public function register(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        if($validator ->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' =>now()

        ]);


        return redirect()->route('login')->with('success', 'Registration Successful, you can now log in');


    }

    public function loginForm(){
        return view('auth.login');
    }


    public function login(Request $request){
        $validator = $request->validate(
            [
                'email' => 'required|string|email',
                'password' => 'required|string'
            ]
            );

            $user = DB::table('users')->where('email', $request->email)->first();
            if($user && Hash::check($request->password, $user->password)){
                Auth::loginUsingId($user->id);
                return redirect()->route('books.index');
            }
            return back()->withErrors(['email' =>'Invalid Credentials']);

    }

public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }

    

}
