<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //

    public function insertform(){
        return view('stud_create');
    }

    public function insert(Request $request){
        
        $name = $request->input('name');
        DB::insert("insert into students (name) values(?)", [$name]);  

        return redirect('view');
    }


    public function index(){
        $users = DB::select("select * from students");
        return view('stud_view', compact('users'));
    }


    public function removeData($id){
        // $users = DB::select("select * from students");
        DB::delete('DELETE FROM students WHERE id = ?',[$id]);
        return redirect('view');
        

    }

    public function updateView($id){
        $users = DB::select('select * from students where id = ?', [$id]);
        return view('stud_Edit', compact('users'));
    }

    public function editData(Request $request, $id){
        $name = $request->input('name');
        
        DB::update('update students set name = ? where id = ?', [$name, $id]);
        return redirect('view');
        
    }
    
}
