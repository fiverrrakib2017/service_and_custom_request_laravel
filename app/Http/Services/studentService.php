<?php

namespace APP\Http\Services;
use App\Models\Student;
class studentService{
    public function store($request){
        $student=new Student();
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->save();
        return redirect()->route('student.list')->with('success', 'Student created successfully');
    }
    public function update($request){
        $student=Student::find($request->id);
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->update();
        return redirect()->route('student.list')->with('success', 'Student Update successfully');
    }
}





?>
