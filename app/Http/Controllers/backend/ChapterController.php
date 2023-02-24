<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChapterRequest;
use App\Models\Chapter;

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
        return view('admin.chapter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChapterRequest $request)
    {
        
        // validate chapter data
        $request->validated();

        // store chapter data
        $chapter = new Chapter();
        $chapter->chapter_name = $request->chapter_name;
        $chapter->save();
        return redirect()->back()->with('success', 'Chapter add Successfully');
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
        return view('admin.chapter.edit', compact('chapter_data'));
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
        // validate chapter data
        $request->validated();

        // store chapter data
        $chapter = Chapter::findOrFail($id);
        $chapter->chapter_name = $request->chapter_name;
        $chapter->save();
        return redirect()->back()->with('success', 'Chapter update Successfully');
    }
 
    public function delete($id)
    {
        Chapter::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Chapter added success');
    }
}
