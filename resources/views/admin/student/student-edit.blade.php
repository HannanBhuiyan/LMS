@extends('admin.admin_master')
@section('title', 'Student Update')
@section('content')

<div class="row mt-5">
    <div class="col-md-8 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Students</a></li>
              <li class="breadcrumb-item active" >Edit Student</li>
            </ol>
        </nav>
        <div class="card p-5 mt-4">
            <div class="category_title my-3">
                <h3>Edit Student</h3>
            </div>
            <form action="{{ route('student.update', $student->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="form-label">Student Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" value="{{ $student->name }}">
                    @error('student_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Student Email<span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" value="{{ $student->email }}">
                    @error('student_email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Student Password </label>
                    <input type="text" class="form-control" name="password" placeholder="****">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Student Phone<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="student_phone" value="{{ $student->student_phone }}">
                    @error('student_phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Student Image</label>
                    <input type="file" onchange="document.getElementById('img').src=window.URL.createObjectURL(this.files[0])" class="form-control" name="student_image" >
                </div>

                <div class="form-group">
                    <label for="form-label"></label>
                    <img width="100px" height="100px" id="img" src="{{ (!empty($student->student_image)) ? asset($student->student_image) : asset('backend/assets/uploads/default.jpg') }}" >
                </div>

                <div class="form-group">
                    <input class="btn btn-secondary btn-pill" type="submit" value="Update Student">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


