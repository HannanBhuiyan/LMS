<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Class_content;
use App\Models\Course;
use Illuminate\Http\Request;

class Class_contentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = Class_content::all();
        return view('admin.class-content.class-index', compact('class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = Course::latest()->get();
        return view('admin.class-content.class-add', compact('course'));
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
            'course_id' => 'required'
        ],[
            'course_id.required' => 'The course field is required',
        ]);

        $class = new Class_content;
        $class->course_id = $request->course_id;
        $class->class_video = $request->class_video;
        $class->class_text = $request->class_text;
        $class->save();

        return redirect()->route('class-content.index')->with('success', 'Class create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Class_content::findOrFail($id);
        $course = Course::latest()->get();
        return view('admin.class-content.class-show', compact('items', 'course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = Class_content::findOrFail($id);
        $course = Course::latest()->get();
        return view('admin.class-content.class-edit', compact('class', 'course'));
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
            'course_id' => 'required'
        ],[
            'course_id.required' => 'The course field is required',
        ]);

        $class = Class_content::findOrFail($id);
        $class->course_id = $request->course_id;
        $class->class_video = $request->class_video;
        $class->class_text = $request->class_text;
        $class->save();

        return redirect()->route('class-content.index')->with('success', 'Class update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Class_content::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Class delete successfully');
    }
}
