@extends('admin.admin_master')
@section('title', 'Class Update')
@section('content')

<div class="row mt-5">
    <div class="col-md-8 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('class-content.index') }}">Class Content</a></li>
              <li class="breadcrumb-item active">Update Class Content</li>
            </ol>
        </nav>
        <div class="card p-5 mt-4">
            <div class="category_title my-3">
                <h3>Update Class</h3>
            </div>
            <form action="{{ route('class-content.update', $class_content->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="form-label">Course Name<span class="text-danger">*</span></label>
                    <select name="course_id" class="form-control form-select select2" data-bs-placeholder="Select">
                        <option selected="" disabled="">Select Course</option>
                        @foreach($course as $item )
                            <option value="{{ $item->id }}" {{ $item->id == $class_content->course_id ? 'selected': ''}}>{{ $item->course_name }}</option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Batch Name<span class="text-danger">*</span></label>
                    <select name="blog_id" class="form-control form-select select2" data-bs-placeholder="Select">
                        <option selected="" disabled="">Select Batch</option>
                        @foreach($blog as $item )
                            <option value="{{ $item->id }}" {{ $item->id == $class_content->blog_id ? 'selected': ''}}>{{ $item->blog_title }}</option>
                        @endforeach
                    </select>
                    @error('blog_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Chapter Name<span class="text-danger">*</span></label>
                    <select name="chapter_id" class="form-control form-select select2" data-bs-placeholder="Select">
                        <option selected="" disabled="">Select Chapter</option>
                        @foreach($chapter as $item )
                            <option value="{{ $item->id }}" {{ $item->id == $class_content->chapter_id ? 'selected': ''}}>{{ $item->chapter_name }}</option>
                        @endforeach
                    </select>
                    @error('chapter_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Video URL</label>
                    <input type="url" class="form-control" name="class_video" value="{{ $class_content->class_video }}">
                </div>
 

                <div class="form-group">
                    <input class="btn btn-secondary btn-pill" type="submit" value="Update class">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
