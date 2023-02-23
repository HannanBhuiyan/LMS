@extends('admin.admin_master')
@section('title', 'Program')
@section('content')
<div class="row mt-5">
    <div class="col-md-12 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('program_overview.index') }}">Program Overview</a></li>
                <li class="breadcrumb-item active">Add Overview Content</li>
            </ol>
          </nav>
        <div class="card p-3 mt-4">
            <form action="{{ route('program_overview.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Course Name</label>
                    <select name="course_id" class="form-control">
                        <option value selected>--Select Course --</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Overview Content</label>
                    <input type="text" name="overview_content" placeholder="Write something" class="form-control">
                </div>
                <button class="btn btn-success mt-2">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
