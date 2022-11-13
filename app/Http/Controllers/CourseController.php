<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use DB;

class CourseController extends Controller
{
    public $course, $image, $imageName, $directory, $imgUrl;
    public function addCourse() {
        return view('admin.course.add-course');
    }
    public function saveCourse(Request $request) {
        $this->validate($request, [
            'course_name' => 'required|unique:courses,course_name|string|min:10|max:90',
            'slug' => 'unique:courses,slug|string|min:10|max:50',
            'course_code' => 'required|unique:courses,course_code|string|min:5|max:15',
            'description' => 'required|unique:courses,course_code|string|min:15|max:420',
            'image' => 'required|mimes:jpg,bmp,png|min:50|max:500'
        ]);
        //return $request;

        $this->course = new Course();
        $this->course->teacher_id = $request->teacher_id;
        $this->course->course_name = $request->course_name;
        $this->course->slug = $this->makeSlug($request);
        $this->course->course_code = $request->course_code;
        $this->course->description = $request->description;
        $this->course->image = $this->saveImage($request);
        $this->course->save();
        return back()->with('message','Added New Course Successfully');
    }
    public function makeSlug($request) {
        if ($request->slug) {
            $str = $request->slug;
            return preg_replace('/\s+/u','-', trim($str));
        }
       $str = $request->course_name;
       return preg_replace('/\s+/u','-', trim($str));
    }
    private function saveImage($request) {
        $this->image = $request->file('image');
        $this->imageName = rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory = 'adminAsset/Course-Image/';
        $this->imgUrl = $this->directory.$this->imageName;
        $this->image->move($this->directory, $this->imageName);
        return $this->imgUrl;
    }
    public function manageCourse() {
       $courses = DB::table('courses')
            ->join('teachers', 'courses.teacher_id', 'teachers.id')
            ->select('courses.*', 'teachers.name')
            ->get();
        return view('admin.course.manage-course', [
            'courses' => $courses
        ]);
    }
}
