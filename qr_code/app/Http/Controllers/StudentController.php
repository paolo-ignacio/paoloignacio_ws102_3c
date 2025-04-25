<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class StudentController extends Controller
{public function index()
    {
    
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'program' => 'required',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student added!');
    }

    public function show(Student $student)
    {
  
        $qr = QrCode::size(200)->generate(json_encode([
            'id' => $student->id,
            'fname' => $student->fname,
            'lname' => $student->lname,
            'email' => $student->email,
            'program' => $student->program,
        ]));

        return view('students.show', compact('student', 'qr'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fname'   => 'required',
            'lname'   => 'required',
            'email'   => 'required|email',
            'program' => 'required',
        ]);
    
        $student = Student::findOrFail($id);
   
        $student->update([
            'fname'   => $request->fname,
            'lname'   => $request->lname,
            'email'   => $request->email,
            'program' => $request->program,
        ]);
    
        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated!');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted!');
    }
}
