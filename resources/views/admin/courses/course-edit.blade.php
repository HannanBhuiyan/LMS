@extends('admin.admin_master')
@section('title', 'Update Course')
@section('content')
<style>
    button.remove_btn {
    background: red;
    color: #fff;
    border: navajowhite;
    padding: 2px 17px;
    border-radius: 4px;
    font-size: 20px;
}
</style>

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

                {{-- for thumbnail image --}}
                <div class="form-group">
                    <label class="form-label">Thumbnail <span class="text-danger">(Size = Width:392px, Height:280px)</span></label>
                    <input type="file" onchange="document.getElementById('img').src=window.URL.createObjectURL(this.files[0])" class="form-control" name="thumbnail">
                </div>

                <div class="form-group"> 
                    <img width="100px" height="100px" id="img" src="{{ (!empty($course->thumbnail)) ? asset($course->thumbnail) : asset('backend/assets/uploads/default.jpg') }}">
                </div>
                {{-- for thumbnail image --}}


                {{--  for feature image --}}
                <div class="form-group">
                    <label class="form-label">Feature Image <span class="text-danger">(Size = Width:392px, Height:280px)</span></label>
                    <input type="file" onchange="document.getElementById('feature_image').src=window.URL.createObjectURL(this.files[0])" class="form-control" name="feature_image">
                </div>

                <div class="form-group"> 
                    <img width="100px" height="100px" id="feature_image" src="{{ (!empty($course->feature_image)) ? asset($course->feature_image) : asset('backend/assets/uploads/default.jpg') }}">
                </div>
                {{-- for feature image --}}

                <div class="form-group">
                    <label>Overview Content</label>
            
                    <div class="form-group">
                        <label for="form-label">Overview Short description</label>
                        <textarea class="form-control" name="program_short_desc" id="" cols="30" rows="10">{{$programoverview->program_short_desc}}</textarea>
                    </div>

                    <label>Overview Items</label>
                    @if ( $programoverview->overview_content)
                        @foreach (json_decode($programoverview->overview_content) as $overview_content)
                        <div class="row main-div mt-2">
                            <div class="col-md-10">
                                <input type="text" name="overview_content[]" value="{{ $overview_content }}"  placeholder="Write content" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="remove_btn">&times;</button>
                            </div>
                        </div> 
                        @endforeach
                    @endif 
                  
                    <div class="new_data"></div>
                    <div class="btn btn-info mt-2" id="add_btn">Add</div>
                    @error('overview_content')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input class="btn btn-secondary btn-pill" type="submit" value="Update Course">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $("#add_btn").click(function(){
                let data = `
                    <div class="row main-div mt-2">
                        <div class="col-md-10">
                            <input type="text" name="overview_content[]"  placeholder="Write content" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="remove_btn">&times;</button>
                        </div>
                    </div> 
                `;
                $(".new_data").append(data);
            });

            $(document).on('click', '.remove_btn', function(){
                $(this).closest(".main-div").remove();
            }) 
        })
    </script>

@endsection
