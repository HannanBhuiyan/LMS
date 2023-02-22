<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialStoreRequest;
use App\Models\SocialLiks;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social_links = SocialLiks::latest()->get();
        return view('admin.social_link.index', compact('social_links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.social_link.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocialStoreRequest $request)
    {

        $validate = $request->validated();
        $data = new SocialLiks();
        $data->facebook = $request->facebook;
        $data->linkedin = $request->linkedin;
        $data->twitter = $request->twitter;
        $data->telegram = $request->telegram;
        $data->instragram = $request->instragram;
        $data->youtube = $request->youtube;
        $data->save();
        return redirect()->route('social_links.index')->with('success', 'Social Link Added Success'); 
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $social_link = SocialLiks::findOrFail($id);
        return view('admin.social_link.show', compact('social_link'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $social_links = SocialLiks::findOrFail($id);
        return view('admin.social_link.edit', compact('social_links'));
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
        $data = SocialLiks::findOrFail($id);
        $data->facebook = $request->facebook;
        $data->linkedin = $request->linkedin;
        $data->twitter = $request->twitter;
        $data->telegram = $request->telegram;
        $data->instragram = $request->instragram;
        $data->youtube = $request->youtube;
        $data->save();
        return redirect()->route('social_links.index')->with('success', 'Social Link Update Success'); 
 
    }
 
    public function delete($id)
    {
        SocialLiks::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Links delete successfully');
    }
}
