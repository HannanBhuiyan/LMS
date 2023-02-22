<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\assigncourse;
use App\Models\Batch;
use App\Models\Course;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = Batch::all();
        return view('admin.batch.batch-index', compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = Course::latest()->get();
        return view('admin.batch.batch-add', compact('course'));
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
            'batch_name' => 'required|unique:batches'
        ],[
            'course_id.required' => 'The course field is required',
            'batch_name.required' => 'The batch name field is required',
        ]);

        $batches = new Batch;
        $batches->course_id =$request->course_id;
        $batches->batch_name = $request->batch_name;
        $batches->save();

        return redirect()->route('batch.index')->with('success', 'Batch create successfully');
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
        $batches = Batch::findOrFail($id);
        $course = Course::latest()->get();
        return view('admin.batch.batch-edit', compact('batches','course'));
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

        $batches = Batch::findOrFail($id);
        $batches->course_id =$request->course_id;
        $batches->batch_name = $request->batch_name;
        $batches->save();

        return redirect()->route('batch.index')->with('success', 'Batch update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = assigncourse::where('batch_id', $id)->count();

        if( $student > 0 ){
            return redirect()->back()->with('fail', 'Student is enroll in this batch ');
        }else{
            Batch::findOrFail($id)->delete();
            return redirect()->back()->with('success', 'Batch delete successfully');
        }

    }
}
