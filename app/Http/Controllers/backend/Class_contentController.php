<?php

namespace App\Http\Controllers\backend;

use App\Models\Blog;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Chapter;
use Cohensive\OEmbed\Embed;
use Illuminate\Http\Request;
use App\Models\Class_content;
use App\Http\Controllers\Controller;

class Class_contentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class_conent = Class_content::latest()->get();
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
            'batch_id' => 'required',
            'chapter_id' => 'required',
        ],[
            'course_id.required' => 'The course field is required',
            'batch_id.required' => 'The batch field is required',
            'chapter_id.required' => 'The chapter field is required',
        ]);

        $exist = Class_content::where('course_id', $request->course_id)->where('chapter_id', $request->chapter_id)->where('blog_class_name', $request->blog_class_name)->exists();

            if($exist){
                return back()->with('fail', 'Class alresdy exists in this course');
            }else{
                if($request->content_type=="blog"){
                    $class = new Class_content;
                    $class->course_id = $request->course_id;
                    $class->batch_id = $request->batch_id;
                    $class->chapter_id = $request->chapter_id;
                    $class->blog_class_name = $request->blog_class_name;
                    $class->content_type = $request->content_type;
                    $class->blog_id = $request->blog_id;
                    $class->save();
                }else{
                    $class = new Class_content;
                    $class->course_id = $request->course_id;
                    $class->batch_id = $request->batch_id;
                    $class->chapter_id = $request->chapter_id;
                    $class->blog_class_name = $request->blog_class_name;
                    $class->content_type = $request->content_type;
                    $class->class_video = $request->class_video;
                    $class->class_desc = $request->class_desc;
                    $class->save();
                }
             
            }
         
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
            'chapter_id' => 'required',
            'content_type' => 'required',
            'batch_id' => 'required'
        ],[
            'course_id.required' => 'The course field is required',
            'chapter_id.required' => 'The Batch field is required',
            'content_type.required' => 'Choose a Content type',
            'batch_id.required' => 'The Batch field is required'
        ]);

        
        // $class = Class_content::findOrFail($id);
        if($request->content_type=="blog"){
            $class = Class_content::findOrFail($id);
            $class->course_id = $request->course_id;
            $class->batch_id = $request->batch_id;
            $class->chapter_id = $request->chapter_id;
            $class->blog_class_name = $request->blog_class_name;
            $class->content_type = $request->content_type;
            $class->blog_id = $request->blog_id;
            $class->save();
        }else{
            $class = Class_content::findOrFail($id);
            $class->course_id = $request->course_id;
            $class->batch_id = $request->batch_id;
            $class->chapter_id = $request->chapter_id;
            $class->blog_class_name = $request->blog_class_name;
            $class->content_type = $request->content_type;
            $class->class_video = $request->class_video;
            $class->class_desc = $request->class_desc;
            $class->save();
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

    public function classContentEdit($id, $batchId)
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
