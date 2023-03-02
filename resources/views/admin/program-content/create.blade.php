@extends('admin.admin_master')
@section('title', 'Program')
@section('content')
<div class="row mt-5">
    <div class="col-md-12 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('programs.index') }}">Course</a></li>
                <li class="breadcrumb-item active">Course Content</li>
            </ol>
          </nav>
        <div class="card p-3 mt-4">
           <form action="{{ route('programs.store') }}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label class="form-label" for="">Course</label>
                    <select name="course_id" class="form-control">
                        <option value selected>--Select Course--</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Program Title  <span style="color:red">(2 - 3 words)</span></label>
                    <input type="text" name="title" placeholder="Enter Program Title" class="form-control">
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Program Description <span style="color:red">(12 - 14 words)</span></label>
                    <textarea name="description" class="form-control" rows="7" placeholder="Enter Program Description"></textarea>
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Image(size: 50 x 50)</label>
                    <input type="file" name="image" class="form-control">
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-info mt-2">Save</button>
           </form>
        </div>
    </div>
</div>

@endsection


