<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\assigncourse;
use App\Models\Blog;
use App\Models\Chapter;
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


    public function singleCourseShow($id, $batch_id)
    {

        $asignedCourseStudent = assigncourse::find($id);
        $courses_id =  $asignedCourseStudent->course_id;
       $chapters = Chapter::where('course_id',$courses_id)->where('batch_id',$asignedCourseStudent->batch_id)->with('ClassContents')->get();

        $single_course_info = Course::find($courses_id);

        $class_content = Class_content::where('course_id', $courses_id)->where("batch_id", $batch_id)->with('chapter')->get();
   
        return view('admin.student.student-course-show',  compact('class_content', 'single_course_info',"chapters"));

    }

    public function classWiseVdo(Request $request)
    {
 
        $classInfos = Class_content::find($request->data_id);
        $blog = Blog::find($classInfos->blog_id);
        // if($class_content->content_type == 'blog'){
        //     $classInfos = $class_content->blog_id;
        //     $classDesc = '';
        // }else{
        //     $classInfos = $class_content->class_video;
        //     $classDesc = $class_content->class_desc;
        // }

        // $view = view('includes.classBlogOrVideo', ['item' => $classInfos]);

        // $data = $view->render();

        return response()->json(['data'=>$classInfos, 'blog'=>$blog]);
    }
}
  