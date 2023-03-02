<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Blog;
use App\Models\Chapter;
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
        $class_conent = Class_content::all();
        return view('admin.class-content.class-index', compact('class_conent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = Course::latest()->get();
        $blog = Blog::latest()->get();
        $chapter = Chapter::latest()->get();
        return view('admin.class-content.class-add', compact('course','blog','chapter'));
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
            'blog_id' => 'required',
            'chapter_id' => 'required'
        ],[
            'course_id.required' => 'The course field is required',
            'blog_id.required' => 'The batch field is required',
            'chapter_id.required' => 'The chapter field is required'
        ]);

        $exist = Class_content::where('course_id', $request->course_id)->where('chapter_id', $request->chapter_id)->where('chapter_id', $request->chapter_id)->exists();

            if($exist){
                return back()->with('fail', 'Chapter alresdy exists in this course');
            }else{
                $class = new Class_content;
                $class->course_id = $request->course_id;
                $class->batch_id = $request->batch_id;
                $class->chapter_id = $request->chapter_id;
                $class->blog_id = $request->blog_id;
                if($request->class_video){
                    $class->class_video = json_encode($request->class_video);
                }
            }
         
        
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
        $blog = Blog::latest()->get();
        $chapter = Chapter::latest()->get();
        return view('admin.class-content.class-show', compact('items', 'course','blog','chapter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $class_content = Class_content::findOrFail($id);
        // $course = Course::latest()->get();
        // $batches = Batch::where('course_id', $id)->get();
        // $chapter = Chapter::latest()->get();
        // $blog = Blog::latest()->get();
        // return view('admin.class-content.class-edit', compact('class_content', 'course','blog','chapter','batches'));
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
        // return $request;
        $request->validate([
            'course_id' => 'required',
            'blog_id' => 'required',
            'chapter_id' => 'required'
        ],[
            'course_id.required' => 'The course field is required',
            'blog_id.required' => 'The batch field is required',
            'chapter_id.required' => 'The chapter field is required'
        ]);

        
        $class = Class_content::findOrFail($id);
        $class->course_id = $request->course_id;
        $class->batch_id = $request->batch_id;
        $class->chapter_id = $request->chapter_id;
        $class->blog_id = $request->blog_id;
        if($request->class_video){
            $class->class_video = json_encode($request->class_video);
        }
        
        
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

    public function batchNameGetByAjax($id)
    {
        return Batch::where('course_id', $id)->orderBy('batch_name', 'ASC')->get();
    }


    public function chapterNameGetByAjax($id)
    {
        return Chapter::where('batch_id', $id)->orderBy('chapter_name', 'ASC')->get();
    }

    public function classContentEdit($id,$batchId)
    {
        $class_content = Class_content::findOrFail($id);
        $course = Course::latest()->get();

        $batches = Batch::where('id', $class_content->batch_id)->get();

        $chapter = Chapter::where('batch_id',$batchId)->get();

        $blog = Blog::latest()->get();
        return view('admin.class-content.class-edit', compact('class_content', 'course','blog','chapter','batches'));
    }

    public function batch_dropdown(Request $request)
    {
        $show_batch_name = "<option value>Select Batch</option>";
        $batches = Batch::where('course_id', $request->course_id)->get(['id','batch_name']);
        foreach ($batches as $batch) {
            $show_batch_name .= "<option value='$batch->id'>$batch->batch_name</option>";
        }
        echo $show_batch_name;
    }

    public function chapter_dropdown(Request $request)
    {
        $show_chapter_name = "<option value>Select Chapter</option>";
        $chapters = Chapter::where('batch_id', $request->batch_id)->get(['id','chapter_name']);
        foreach ($chapters as $chapter) {
            $show_chapter_name .= "<option value='$chapter->id'>$chapter->chapter_name</option>";
        }
        echo $show_chapter_name;
    }

    

}
