@extends('admin.admin_master')
@section('title', 'Add Assign Student')
@section('content')

<div class="row mt-5">
    <div class="col-md-8 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Students</a></li>
              <li class="breadcrumb-item active">Assign Student</li>
            </ol>
        </nav>
        <div class="card p-5 mt-4">
            <div class="category_title my-3">
                <h3>Assign Student</h3>
            </div>
            <form action="{{ route('assignstudent.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="form-label">Course Name<span class="text-danger">*</span></label>
                    <select name="course_id" id="course_id" class="form-control form-select select2" data-bs-placeholder="Select">
                        <option selected="" disabled="">Select Course</option>
                        @foreach($course_std as $item )
                            <option value="{{ $item->id }}" >{{ $item->course_name }}</option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Batch Name<span class="text-danger">*</span></label>
                    <select name="batch_id" id="batch_dropdown" class="form-control form-select select2" data-bs-placeholder="Select">
                        <option selected>Select Batch</option>
                        @foreach($batch as $item )
                            <option value="{{ $item->id }}" >{{ $item->batch_name }}</option>
                        @endforeach
                    </select>
                    @error('batch_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group">
                    <label class="form-label">Assign Student Name<span class="text-danger">*</span></label>
                    <select name="student_id" id="batch_dropdown" class="form-control form-select select2" data-bs-placeholder="Select">
                        <option selected="" disabled="">Select Student</option>
                        @foreach($students as $student )
                            <option value="{{ $student->id }}" >{{ $student->name }}</option>
                        @endforeach
                    </select>
                    @error('student_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input class="btn btn-secondary btn-pill" type="submit" value="Add Student">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function(){
            $('#course_id').change(function(){
                let course_id = $(this).val()
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('assignstudent.dropdown') }}",
                        type: "POST",
                        data: {
                            course_id : course_id,
                        },
                        success: function(data){
                            $('#batch_dropdown').html(data)
                        },
                    });
                });
        });

    </script>

@endsection

