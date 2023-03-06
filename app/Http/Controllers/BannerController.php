<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    function index(){
        return view('admin.banner.index',[
            'banner' => Banner::first(),
        ]);
    }

    function update(Request $request, $id){
        // return $request;
        $request->validate([
            'title_one' => 'required',
            'title_two' => 'required',
            'description' => 'required'
        ]);


        $banner = Banner::find($id);

        if($request->hasFile('banner_image'))
        {
           $image      = $request->file('banner_image');
           $filename   = uniqid() . '.' . $image->getClientOriginalExtension();
           $location   = 'backend/assets/uploads/banner/';
           $image->move( $location, $filename);
           $banner->banner_image = $location.$filename;
        }
        
        $banner->title_one = $request->title_one;
        $banner->title_two = $request->title_two;
        $banner->description = $request->description;

        $banner->save();
   

        return back()->with('success','Banner Updated');

    }
}
