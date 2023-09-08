<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class studentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('Backend.Student.index', compact('students'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        $student=new Student();
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->save();
        return redirect()->route('student.list')->with('success', 'Student created successfully');
    }
    public function delete($id)
    {

        $student=Student::find($id);
        $student->delete();
        return redirect()->route('student.list')->with('success', 'Student created successfully');
    }
    public function update(Request $request)
    {

         $student=Student::find($request->id);
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->update();
        return redirect()->route('student.list')->with('success', 'Student Update successfully');
    }
}
