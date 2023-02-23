<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\ProgramOverview;
use Illuminate\Http\Request;

class ProgramOverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program_overview = ProgramOverview::all();
        return view('admin.program-overview.index', compact('program_overview'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('admin.program-overview.create', compact('courses'));
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
            '*' => 'required'
        ],[
            'overview_content.required' => 'Overview content is required !'
        ]);


        $data = new ProgramOverview();
        $data->course_id = $request->course_id;
        $data->overview_content = $request->overview_content;
        $data->save();
        return redirect()->back()->with('success', 'Content added success');

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
        $programoverview = ProgramOverview::findOrFail($id);
        return view('admin.program-overview.edit', compact('programoverview'));
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
            '*' => 'required'
        ],[
            'overview_content.required' => 'Overview content is required !'
        ]);


        $data = ProgramOverview::findOrFail($id);
        $data->overview_content = $request->overview_content;
        $data->save();
        return redirect()->back()->with('success', 'Content update success');
    }

    
    public function delete($id)
    {
        ProgramOverview::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Delete successfully');
    }
}
