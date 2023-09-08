<?php

namespace App\Http\Controllers;

use App\Http\Requests\studentRequest;
use App\Http\Services\studentService;
use App\Models\Student;
use Illuminate\Http\Request;

class studentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('Backend.Student.index', compact('students'));
    }
    public function store(studentRequest $request)
    {

        return (new studentService())->store( $request);
    }
    public function delete($id)
    {

        $student=Student::find($id);
        $student->delete();
        return redirect()->route('student.list')->with('success', 'Student created successfully');
    }
    public function update(studentRequest $request)
    {
        
       return (new studentService())->update($request);
    }
}
