@extends('admin.admin_master')
@section('title', 'Add Class')
@section('content')

<div class="row mt-5">
    <div class="col-md-8 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('class-content.index') }}">Class</a></li>
              <li class="breadcrumb-item active" >Add Class</li>
            </ol>
        </nav>
        <div class="card p-5 mt-4">
            <div class="category_title my-3">
                <h3>Add Class</h3>
            </div>
            <form action="{{ route('class-content.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class="form-label">Course Name<span class="text-danger">*</span></label>
                    <select name="course_id" class="form-control form-select select2" data-bs-placeholder="Select">
                        <option selected="" disabled="">Select Course</option>
                        @foreach($course as $item )
                            <option value="{{ $item->id }}" >{{ $item->course_name }}</option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Video URL</label>
                    <input type="url" class="form-control" name="class_video" placeholder="URL">
                </div>

                <div class="form-group">
                    <label class="form-label">Class Content</span></label>
                    <textarea class="form-control" id="summernote" name="class_text"  placeholder="Class Content"></textarea>
                </div>

                <div class="form-group">
                    <input class="btn btn-secondary btn-pill" type="submit" value="Add class">
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
