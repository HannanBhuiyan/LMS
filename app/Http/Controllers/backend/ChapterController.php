<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChapterRequest;
use App\Models\Batch;
use App\Models\Chapter;
use App\Models\Course;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapter_datas = Chapter::latest()->get();
        return view('admin.chapter.index', compact('chapter_datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::latest()->get();
        return view('admin.chapter.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChapterRequest $request)
    {
        // return $request;
        // validate chapter data
        $request->validated();

        // store chapter data
        $chapter = new Chapter();

        // check exists chapter name
        $exists_chapter_name = Chapter::where('course_id', $request->course_id)->where('batch_id', $request->batch_id)->where('chapter_name', $request->chapter_name)->exists();

        if(!$exists_chapter_name){
            $chapter->course_id = $request->course_id;
            $chapter->batch_id = $request->batch_id;
            $chapter->chapter_name = $request->chapter_name;
            $chapter->save();
            return redirect()->back()->with('success', 'Chapter add Successfully');
        }else{
            return redirect()->back()->with('fail', 'Chapter Already exists');
        }
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
        $chapter_data = Chapter::findOrFail($id);
        $courses = Course::latest()->get();
        $batches = Batch::where('course_id', $chapter_data->course_id)->get();
        return view('admin.chapter.edit', compact('chapter_data','courses','batches'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChapterRequest $request, $id)
    {
        // return $request->batch_id;
        // validate chapter data
        $request->validated();

        // store chapter data
        $chapter = Chapter::findOrFail($id);
        $chapter->chapter_name = $request->chapter_name;
        $chapter->course_id = $request->course_id;
        $chapter->batch_id = $request->batch_id;
        $chapter->save();
        return redirect()->route('chapter.index')->with('success', 'Chapter update Successfully');
    }
 
    public function delete($id)
    {
        Chapter::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Chapter added success');
    }

    public function chapterNameGetByAjax($id)
    {
        return Batch::where('course_id', $id)->orderBy('batch_name', 'ASC')->get();
    }

    public function course_dropdown(Request $request)
    {
        $batches = Batch::where('course_id', $request->course_id)->get(['id','batch_name']);
        foreach ($batches as $batch) {
            echo $batch->batch_name .= "<option value='$batch->id'>$batch->batch_name</option>";
        }
    }
  

}
