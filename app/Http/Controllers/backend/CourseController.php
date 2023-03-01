<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\assigncourse;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::all();
        return view('admin.courses.course-index',compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.course-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required|unique:courses',
            'course_duration' => 'required',
            'start_date' => 'required',
            'course_short_des' => 'required',
            'course_desceiption' => 'required',
            'feature_image' => 'required',
            'thumbnail' => 'required',
        ],[
            'course_name.required' => 'The course name is required',
            'course_name.unique' => 'The course name should be unique',
            'course_short_des.required' => 'The course short description is required',
            'feature_image.required' => 'Feature image is required',
            'thumbnail.required' => 'Thumbnail is required',
        ]);

        if($request->file('thumbnail'))
        {
            $image = $request->file('thumbnail');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $location = 'backend/assets/uploads/course/';
            $final_image = $location.$name_gen;
            Image::make($image)->resize(392, 280)->save($final_image);
        }


        if($request->file('feature_image'))
        {
            $image = $request->file('feature_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $location = 'backend/assets/uploads/course/';
            $feature_final_image = $location.$name_gen;
            Image::make($image)->resize(588, 540)->save($feature_final_image);
        }

        $course = new Course;
        $course->course_name = $request->course_name;
        $course->slug = Str::slug($request->course_name);
        $course->course_duration = $request->course_duration;
        $course->start_date = $request->start_date;
        $course->status = $request->status;
        $course->course_short_des = $request->course_short_des;
        $course->course_desceiption = $request->course_desceiption;
        if(!empty($final_image)){
            $course->thumbnail = $final_image;
        } 
        if(!empty($feature_final_image)){
            $course->feature_image = $feature_final_image;
        }

        $course->save();
        return redirect()->route('courses.index')->with('success', 'Course create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.courses.course-edit', Compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'course_name' => 'required|unique:courses,course_name,'.$course->id,
            'course_duration' => 'required',
            'start_date' => 'required'
        ],[
            'course_name.required' => 'The course name is required',
            'course_name.unique' => 'The course name should be unique',
        ]);


        if($request->file('thumbnail'))
        {
            if(file_exists($course->thumbnail)){
                unlink($course->thumbnail);
            }
            $image = $request->file('thumbnail');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $location = 'backend/assets/uploads/course/';
            $final_image = $location.$name_gen;
            Image::make($image)->resize(392, 280)->save($final_image);
            $course->thumbnail = $final_image;
        }


        if($request->file('feature_image'))
        {
            if(file_exists($course->feature_image)){
                unlink($course->feature_image);
            }
            $image = $request->file('thumbnail');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $location = 'backend/assets/uploads/course/';
            $final_feature_image = $location.$name_gen;
            Image::make($image)->resize(588, 540)->save($final_feature_image);
            $course->feature_image = $final_feature_image;
        }
 

        $course->course_name = $request->course_name;
        $course->slug = Str::slug($request->course_name);
        $course->course_duration = $request->course_duration;
        $course->start_date = $request->start_date;
        $course->status = $request->status;
        $course->course_short_des = $request->course_short_des;
        $course->course_desceiption = $request->course_desceiption;
        $course->save();

        return redirect()->route('courses.index')->with('success', 'Course update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = assigncourse::where('course_id', $id)->count();

        if($student > 0){
            return redirect()->back()->with('fail', 'Student is enroll in this course ');
        }else{
            $course = Course::findOrFail($id);
            if($course->thumbnail){
                unlink($course->thumbnail);
            }
            if($course->feature_image){
                unlink($course->feature_image);
            }
            $course->delete();
            return redirect()->back()->with('success', 'Course delete successfully');
        }

    }


    public function inactive($id) {
        Course::findOrFail($id)->update(['status' => 'off']);
        return redirect()->back()->with('success', 'Course Inactive Successfully');
    }

    public function active($id) {
        Course::findOrFail($id)->update(['status' => 'on']);
        return redirect()->back()->with('success', 'Course Active Successfully');
    }

    



}
