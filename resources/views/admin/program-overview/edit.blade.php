@extends('admin.admin_master')
@section('title', 'Program')
<style>
    button.remove_btn {
    background: red;
    color: #fff;
    border: navajowhite;
    padding: 2px 17px;
    border-radius: 4px;
    font-size: 22px;
}
</style>
@section('content')
<div class="row mt-5">
    <div class="col-md-12 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('program_overview.index') }}">Program Overview</a></li>
                <li class="breadcrumb-item active">Edit Overview Content</li>
            </ol>
          </nav>
        <div class="card p-3 mt-4">
            <form action="{{ route('program_overview.update', $programoverview->id ) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label>Course Name</label>
                            <select name="course_id" class="form-control">
                                <option value selected>--Select Course --</option>
                                @foreach ($courses as $course)
                                    <option {{ $course->id == $programoverview->course_id ? 'selected' : '' }} value="{{ $course->id }}">{{ $course->course_name }}</option>
                                @endforeach
                            </select>
                            @error('course_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Overview Content</label>
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
                <button type="submit" class="btn btn-success mt-2">Update</button>
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