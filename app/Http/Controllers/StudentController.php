<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Admission;
use Illuminate\Http\Request;
use Session;

class StudentController extends Controller
{
    public  $student, $image, $imageName, $directory, $imgUrl;

    public function studentRegister() {
        return view('frontEnd.student.register');
    }
    public function saveStudent(Request $request) {
//        return $request;
        $this->student = new Student();
        $this->student->student_name = $request->student_name;
        $this->student->student_email = $request->student_email;
        $this->student->student_phone = $request->student_phone;
        $this->student->password = bcrypt($request->password);
        if ($request->file('image')) {
            $this->student->image = $this->saveImage($request);
        }
        $this->student->address = $request->address;
        $this->student->save();
        return back()->with('message', 'account created successfully');
    }
    private function saveImage($request) {
        $this->image = $request->file('image');
        $this->imageName = rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory = 'adminAsset/studentImage/';
        $this->imgUrl = $this->directory.$this->imageName;
        $this->image->move($this->directory, $this->imageName);
        return $this->imgUrl;
    }
    public function manageStudent() {
        return view('frontEnd.student.manage-student', [
            'students' => Student::all()
        ]);
    }

    public function studentLogin() {
        return view('frontEnd.student.login');
    }
    public function studentLoginCheck(Request $request) {
//       return $request;

        $studentInfo = Student::where('student_email',$request->user_name)
              ->orWhere('student_phone',$request->user_name)
              ->first();
        if ($studentInfo) {
            $expass = $studentInfo->password;
            if(password_verify($request->password, $expass )){
                Session::put('studentId', $studentInfo->id);
                Session::put('studentName', $studentInfo->student_name);
                return redirect('/');

            }else{
                return back()->with('message','Enter valid password');
            }
        }else{
            return back()->with('message','Enter valid email or phone');
        }

    }
    public function studentLogout() {
        Session::forget('studentId');
        Session::forget('studentName');
        return redirect('/');
    }
    public function admission(Request $request) {
        // return $request;
               $admission = new Admission();
        $admission->course_id = $request->course_id;
        $admission->student_id = $request->student_id;
        $admission->confirmation = $request->confirmation;
        $admission->save();
        return back();
    }

}
