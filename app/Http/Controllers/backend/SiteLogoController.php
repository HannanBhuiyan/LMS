<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\SiteLogo;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SiteLogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logos = SiteLogo::all();
        return view('admin.site-logo.index', compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.site-logo.create');
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
            'site_logo' => 'required'
        ]);

        if($request->file('site_logo'))
        {
            $image = $request->file('site_logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $location = 'backend/assets/uploads/logo/';
            $final_image = $location.$name_gen;
            Image::make($image)->save($final_image);

        }

        $site_logo = new SiteLogo(); 
        $site_logo->site_logo = $final_image;
        $site_logo->save(); 
        return redirect()->back();

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
        $logo = SiteLogo::findOrFail($id);
        return view('admin.site-logo.edit', compact('logo'));
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

        $site_logo = SiteLogo::findOrFail($id);

        $request->validate([
            'site_logo' => 'required'
        ]);


        if($request->file('site_logo'))
        {
            if(file_exists($site_logo->thumbnail)){
                unlink($site_logo->thumbnail);
            }
            $image = $request->file('site_logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $location = 'backend/assets/uploads/logo/';
            $final_image = $location.$name_gen;
            Image::make($image)->save($final_image);

        }

        $site_logo = SiteLogo::findOrFail($id); 
        $site_logo->site_logo = $final_image;
        $site_logo->save(); 
        return redirect()->back()->with('success', 'Logo Update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
          
        $site_logo = SiteLogo::findOrFail($id);
        if($site_logo->site_logo){
            unlink($site_logo->site_logo);
        }
        $site_logo->delete();
        return redirect()->back()->with('success', 'Logo delete successfully');
    }
}
