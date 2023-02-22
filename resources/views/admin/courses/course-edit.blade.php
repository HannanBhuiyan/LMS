@extends('admin.admin_master')
@section('title', 'Update Course')
@section('content')

<div class="row mt-5">
    <div class="col-md-8 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Courses</a></li>
              <li class="breadcrumb-item active" aria-current="page">Update Course</li>
            </ol>
        </nav>
        <div class="card p-5 mt-4">
            <div class="category_title my-3">
                <h3>Update Course</h3>
            </div>
            <form action="{{ route('courses.update', $course->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label">Course Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="course_name" value="{{ $course->course_name }}">
                    @error('course_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Course Duration<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="course_duration" value="{{ $course->course_duration }}">
                    @error('course_duration')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <label class="form-label">Start Date<span class="text-danger">*</span></label>
                <div class="wd-200 mg-b-30">
                     <div class="input-group">
                        <div class="input-group-text">
                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                        </div><input name="start_date" class="form-control fc-datepicker" value="{{ $course->start_date }}"  type="text">
                    </div>
                    @error('start_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <div class="form-check form-switch">
                        <input class="form-check-input form-control" type="checkbox"  {{  ($course->status == 'on' ? ' checked' : '') }} name="status" role="switch" id="flexSwitchCheckDefault">
                        <label class="form-label" for="flexSwitchCheckDefault">Status</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Course Short Description<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="course_short_des" value="{{ $course->course_short_des }}" placeholder="Course Short Description">
                    @error('course_short_des')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Course Description<span class="text-danger">*</span></label>
                    <textarea class="form-control" id="summernote" name="course_desceiption"  placeholder="Course Description">{!! ($course->course_desceiption) !!}</textarea>
                    @error('course_desceiption')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Thumbnail</label>
                    <input type="file" onchange="document.getElementById('img').src=window.URL.createObjectURL(this.files[0])" class="form-control" name="thumbnail">
                </div>

                <div class="form-group">
                    <label for="form-label"></label>
                    <img width="100px" height="100px" id="img" src="{{ (!empty($course->thumbnail))? url($course->thumbnail):url('backend/assets/uploads/default.jpg') }}">
                </div>

                <div class="form-group">
                    <input class="btn btn-secondary btn-pill" type="submit" value="Update Course">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
