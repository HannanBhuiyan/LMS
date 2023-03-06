@extends('admin.admin_master')
@section('title', 'Add Course')
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
              <li class="breadcrumb-item active">Add Course</li>
            </ol>
        </nav>
        <div class="card p-5 mt-4">
            <div class="category_title my-3">
                <h3>Add Course</h3>
            </div>
            <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class="form-label">Course Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="course_name" placeholder="Course Name">
                    @error('course_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Course Duration<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="course_duration" placeholder="Course Duration">
                    @error('course_duration')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <label class="form-label">Start Date<span class="text-danger">*</span></label>
                <div class="wd-200 mg-b-30">
                     <div class="input-group">
                        <div class="input-group-text">
                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                        </div><input name="start_date" class="form-control fc-datepicker" placeholder="MM/DD/YYYY"  type="text">
                    </div>
                    @error('start_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <div class="form-check form-switch">
                        <input class="form-check-input form-control" type="checkbox"  name="status" role="switch" id="flexSwitchCheckDefault">
                        <label class="form-label" for="flexSwitchCheckDefault">Status</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Course Short Description<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="course_short_des" placeholder="Course Short Description">
                    @error('course_short_des')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Course Description<span class="text-danger">*</span></label>
                    <textarea class="form-control" id="summernote" name="course_desceiption"  placeholder="Course Description"></textarea>
                    @error('course_desceiption')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- thumbnail image start --}}
                <div class="form-group">
                    <label class="form-label">Thumbnail <span class="text-danger">(Size = Width:392px, Height:280px)</span></label>
                    <input type="file" onchange="document.getElementById('img').src=window.URL.createObjectURL(this.files[0])" class="form-control" name="thumbnail" >
                </div>
                <div class="form-group">
                    <label for="form-label"></label>
                    <img width="100px" height="100px" id="img" src="{{ url('backend/assets/uploads/default.jpg') }}" >
                </div>
                {{-- thumbnail image end --}}

                {{-- feature image start --}}
                <div class="form-group">
                    <label class="form-label">Feature Image <span class="text-danger">(Size = Width:588px, Height:540px)</span></label>
                    <input type="file" onchange="document.getElementById('feature_img').src=window.URL.createObjectURL(this.files[0])" class="form-control" name="feature_image" >
                </div>
                <div class="form-group">
                    <label for="form-label"></label>
                    <img width="100px" height="100px" id="feature_img" src="{{ url('backend/assets/uploads/default.jpg') }}" >
                </div>
                {{-- feature image end --}}
                
                <div class="form-group">
                    <label>Overview Content</label>

                    <div class="form-group">
                        <label for="form-label">Overview Short description</label>
                        <textarea class="form-control" name="program_short_desc" id="" cols="30" rows="10"></textarea>
                    </div>
                  

                    <label>Overview Items</label>
                    <div class="row main-div mt-2">
                        <div class="col-md-10">
                            <input type="text" name="overview_content[]"  placeholder="Write content" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <button type="button"  class="remove_btn">&times;</button>
                        </div>
                    </div> 
                  
                    <div class="new_data"></div>
                    <div class="btn btn-info mt-2" id="add_btn">Add</div>
                    @error('overview_content')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
               

                <div class="form-group">
                    <input class="btn btn-secondary btn-pill" type="submit" value="Add Course">
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
        })

        $(document).on('click', '.remove_btn', function(){
            $(this).closest(".main-div").remove();
        }) 
    })
</script>
@endsection
