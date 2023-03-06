<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = User::all();
        return view('admin.student.student-index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.student.student-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request ->validate([
            'name' => 'required',
            'email' => 'required',
            'student_phone' => 'required',
            'image' => 'required',
            'password' => 'required',
        ]);

        if($request->file('image'))
        {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $location = 'backend/assets/uploads/student/';
            $final_image = $location.$name_gen;
            Image::make($image)->save($final_image);

        }

        $student = new User;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->student_phone = $request->student_phone;
        $student->password = Hash::make($request->password);
        if(!empty($final_image)){
            $student->student_image = $final_image;
        }
        $student->save();

        Mail::send('email.studentPassword', ['password' => $request->password], function($message) use($request){
            $message->to($request->email);
            $message->subject('Your Password');
        });

        return redirect()->route('student.index')->with('success', 'Student create successfully');
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
        $student = User::findOrFail($id);

        return view('admin.student.student-edit', compact('student'));
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
        // return request()->password;
        $request ->validate([
            'name' => 'required',
            'email' => 'required',
            'student_phone' => 'required',
        ]);

        $student = User::findOrFail($id);

        if($request->file('student_image'))
        {
            if(file_exists($student->student_image)){
                unlink($student->student_image);
            }
            $image = $request->file('student_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $location = 'backend/assets/uploads/student/';
            $final_image = $location.$name_gen;
            Image::make($image)->save($final_image);
            $student->student_image = $final_image;
        }
        $student->name = $request->name;
        $student->email = $request->email;
        $student->student_phone = $request->student_phone;
        if($request->password){
            $student->password = Hash::make($request->password);
            
            Mail::send('email.studentPassword', ['password' => $request->password], function($message) use($request){
                $message->to($request->email);
                $message->subject('Your Password');
            });
        }
        $student->save();


        return redirect()->route('student.index')->with('success', 'Student update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = User::findOrFail($id);
        if($student->student_image){
            unlink($student->student_image);
        }
        $student->delete();
        return redirect()->back()->with('success', 'Student delete successfully');
    }

    public function studentManagement(){
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.student-management.index', compact('users'));
    }

    public function studentDisabled($id){
        User::find($id)->update(['isban' => 1]);
        return redirect()->back()->with('success', 'Student disabled successfully');
    }


    public function studentActive($id){
        User::find($id)->update(['isban' => 0]);
        return redirect()->back()->with('success', 'Student active successfully');
    }

}
