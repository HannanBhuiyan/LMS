@extends('admin.admin_master')
@section('title', 'Program')
@section('content')
<div class="row mt-5">
    <div class="col-md-12 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('programs.index') }}">Program</a></li>
                <li class="breadcrumb-item active">Program Edit</li>
            </ol>
          </nav>
        <div class="card p-3 mt-4">
           <form action="{{ route('programs.update', $program->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" value="{{ $program->image }}" name="old_image">
                <div class="form-group">
                    <label for="">Course</label>
                    <select name="course_id" class="form-control">
                        <option selected >--Select Course--</option>
                        @foreach ($courses as $course)
                            <option {{ $course->id == $program->course_id ? 'selected' : " " }} value="{{ $course->id }}">{{ $course->course_name }}</option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Program Title</label>
                    <input type="text" name="title" value="{{ $program->title }}" placeholder="Enter Program Title" class="form-control">
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Program Description</label>
                    <textarea name="description" class="form-control" rows="7" placeholder="Enter Program Description">{{ $program->description }}</textarea>
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <br>
                    <img src="{{ asset($program->image) }}" width="100px" class="my-2" height="100px" alt="image">
                    <input type="file" name="image" class="form-control">
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-info mt-2">Update</button>
           </form>
        </div>
    </div>
</div>

@endsection
