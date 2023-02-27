<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\assigncourse;
use App\Models\Class_content;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDasdhboardController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('admin.student.student-dashboard', compact('user'));
    }

    public function showAllCourse()
    {
        $user_id = Auth::user()->id;
        $assing_courses = assigncourse::where('student_id', $user_id)->get();

        return view('admin.student.student-courst-list', compact('assing_courses'));
    }


    public function singleCourseShow($id)
    {

         

        // $user_id = Auth::user()->id;
        $courses_id = assigncourse::findOrFail($id)->course_id;

       
        $single_course_info = Course::where('id', $courses_id)->first();


        $class_content = Class_content::where('course_id', $courses_id)->get();
       

        return view('admin.student.student-course-show',  compact('class_content', 'single_course_info'));


    }
}
