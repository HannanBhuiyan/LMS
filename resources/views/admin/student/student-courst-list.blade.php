@extends('admin.admin_master')
@section('title', 'Course List Student')
<style>
    h1.course_title {
        margin: 0;
        color: #000;
        font-size: 23px;
        font-weight: 600;
        padding: 14px 0px 6px 0px;
    }
    p.course_para {
        color: #000;
        font-size: 19px;
    }
</style>
@section('content')

<div class="course" style="margin-top: 50px">
    <nav aria-label="breadcrumb p-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Your Courses</li>
        </ol>
    </nav>
    @if (Auth::user()->isban == 0)
    <div class="row mt-5">
        @forelse ($assing_courses as $course)
        <div class="col-md-4">
            <a href="{{ route('single.course.show', $course->id ) }}">
                <div class="card p-3">
                    <img height="350" width="100%" src="{{ $course->relationwithcourse->thumbnail }}" alt="">
                    <h1 class="course_title">{{ $course->relationwithcourse->course_name }} </h1>
                    <h4 style="color: #000; margin: 10px 0px; font-size: 17px;">Batch  Name: ({{$course->relationwithbatch->batch_name}})</h4>

                    @if ($course->relationwithcourse->course_short_des)
                        <p class="course_para" style="font-size: 16px;">{{ $course->relationwithcourse->course_short_des }}</p>
                    @else
                        <p>There is no blog found</p>
                    @endif
                </div>
            </a>
        </div>
        @empty
            <center>
                <h2 style="color:red; font-weight:700; margin-top: 50px">Course not found</h2>
            </center>
        @endforelse
    </div>
    @endif
</div>

@endsection
