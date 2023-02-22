<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\assigncourse;
use App\Models\Batch;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class AssignStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assign_atudents = assigncourse::orderby('id', 'desc')->get();
        return view('admin.assign-student.assign-student', compact('assign_atudents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course_std = Course::latest()->get();
        $batch = Batch::latest()->get();
        $students = User::latest()->get();
        return view('admin.assign-student.add-assign-student', compact('course_std', 'batch', 'students'));
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
            'course_id' => 'required',
            'batch_id' => 'required',
            'student_id' => 'required',
        ],[
            'course_id.required' => 'The course field is required',
            'batch_id.required' => 'The batch field is required',
            'student_id.required' => 'The student name is required',
        ]);
        assigncourse::create([
            'course_id' => $request->course_id,
            'batch_id' => $request->batch_id,
            'student_id' => $request->student_id,
        ]);
        return redirect()->route('assignstudent.index')->with('success', 'Student assign successfully');
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
        $assign_students = assigncourse::findOrFail($id);
        $course_std = Course::latest()->get();
        $batch = Batch::latest()->get();
        $students = User::latest()->get();
        return view('admin.assign-student.edit-assign-student', compact('assign_students','course_std','batch','students'));
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
        $request->validate([
            'course_id' => 'required',
            'batch_id' => 'required',
            'student_id' => 'required',
        ],[
            'course_id.required' => 'The course field is required',
            'batch_id.required' => 'The batch field is required',
            'student_id.required' => 'The student name is required',
        ]);

        $assign_students = assigncourse::findOrFail($id);
        $assign_students->course_id = $request->course_id;
        $assign_students->batch_id = $request->batch_id;
        $assign_students->student_id = $request->student_id;
        $assign_students->save();

        return redirect()->route('assignstudent.index')->with('success', 'Assign student successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        assigncourse::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Assign student delete successfully');
    }

    public function dropdown(Request $request)
    {

        $show_batch = "<option value>Select Batch</option>";
        $sub_batch = Batch::where('course_id', $request->course_id)->get(['id','batch_name']);
        foreach ($sub_batch as $batch) {
            $show_batch .= "<option value='$batch->id'>$batch->batch_name</option>";
        }
        echo $show_batch;
    }
}
