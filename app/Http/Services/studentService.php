<?php

namespace APP\Http\Services;

use App\Jobs\sendMailJob;
use App\Mail\newStudentNotification;
use App\Mail\WelcomeMail;
use App\Models\Student;
use Illuminate\Support\Facades\Mail;

class studentService{
    public function store($request){
        $student=new Student();
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->save();
        dispatch(new sendMailJob((object) $request->all()));
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
