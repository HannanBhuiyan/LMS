<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{

    public function update_image(Request $request)
    {

        $image = $request->file('student_image');
        $imag_ext = $image->getClientOriginalExtension();
        $hexCode = hexdec(uniqid());
        $full_name = $hexCode.'.'.$imag_ext;

        $upload_location = 'backend/assets/uploads/student/';
        $last_image = $upload_location.$full_name;

        Image::make($image)->resize(300, 300)->save($last_image);

        $user = User::find(Auth::id());

        $user->student_image =   $last_image;
        $user->save();

        return redirect()->back()->with('success', 'Profile Image update success');

    }



}

