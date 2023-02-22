<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Batch;
use App\Models\Class_content;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminDasdhboardController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $batches = Batch::all();
        $students = User::all();
        $class = Class_content::all();
        return view('admin.dashboard', compact('courses','students','class','batches'));
    }
}
