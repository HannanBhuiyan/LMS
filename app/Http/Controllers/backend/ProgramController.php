<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\ProgramRequest;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\ProgramContent;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program_contents = ProgramContent::latest()->get();
        return view('admin.program-content.index', compact('program_contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $courses = Course::latest()->get();
        return view('admin.program-content.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramRequest $request)
    {
        // retrieve the validate input data
        $request->validated();
 

        // validate image 
        if($request->file('image')){
            $img = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            $location = 'backend/assets/uploads/program/';
            $final_image = $location.$name_gen;
            Image::make($img)->resize(50,50)->save($final_image);
        }

        // store program data
        $program_data = new ProgramContent();
        $program_data->course_id = $request->course_id;
        $program_data->title = $request->title;
        $program_data->description = $request->description;
        $program_data->image = $final_image;
        $program_data->save();
        return redirect()->back()->with('success', 'Content added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program_content = ProgramContent::findOrFail($id);
        return view('admin.program-content.view', compact('program_content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses = Course::latest()->get();
        $program = ProgramContent::findOrFail($id);
        return view('admin.program-content.edit', compact('program', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramRequest $request, $id)
    {
        // retrieve the validate input data
        $request->validated();
 
        $img = $request->file('image');
        $program_data = ProgramContent::findOrFail($id);

        // validate image 
        if($img != "" ){ 
            if(file_exists($request->old_image)){
                unlink($request->old_image);
            }
            $img = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            $location = 'backend/assets/uploads/program/';
            $final_image = $location.$name_gen;
            Image::make($img)->resize(50,50)->save($final_image);
            $program_data->image = $final_image; 
        }

        // store program data
        $program_data->course_id = $request->course_id;
        $program_data->title = $request->title;
        $program_data->description = $request->description; 
        $program_data->save();
        return redirect()->back()->with('success', 'Content update successfully');
    }

   
    public function delete($id)
    {
 
        $program_data = ProgramContent::findOrFail($id);

        if(file_exists($program_data->image)){
            unlink($program_data->image);
        }

        $program_data->delete();
        return redirect()->back()->with('success', 'Delete successfully');
        
    }
  
}
