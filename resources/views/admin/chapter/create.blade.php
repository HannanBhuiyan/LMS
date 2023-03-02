@extends('admin.admin_master')
@section('title', 'Chapter')
@section('content')

<div class="row mt-5">
    <div class="col-md-8 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('chapter.index') }}">Chapter</a></li>
              <li class="breadcrumb-item active" >Add Chapter</li>
            </ol>
        </nav>
        <div class="card p-5 mt-4"> 
            <form action="{{ route('chapter.store') }}" method="post">
                @csrf 
                <div class="form-group">
                    <label class="form-label">Course Name<span class="text-danger">*</span></label>
                    <select name="course_id" class="form-control">
                        <option value selected>--Select Course--</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->course_name }}</option>     
                        @endforeach
                    </select>
                    @error('course_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror 
                </div>
                <div class="form-group">
                    <label class="form-label">Batch Name<span class="text-danger">*</span></label>
                    <select name="batch_id" class="form-control">
                        <option value selected>--Select Batch--</option>
                    </select>
                    @error('batch_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror 
                </div> 
                <div class="form-group">
                    <label class="form-label">Chapter Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="chapter_name" placeholder="Exmp: Html">
                    @error('chapter_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror 
                </div> 
                <div class="form-group">
                    <input class="btn btn-secondary btn-pill" type="submit" value="Add Chapter">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('select[name="course_id"]').on('change', function(event){
            event.preventDefault();
            let course_id = $(this).val();
            axios.get('changeCourseName/ajax/'+ course_id)
            .then(function(response){
                if(response.status === 200){ 
                      $('select[name="batch_id"]').empty();
                    $.each(response.data, function(key, value){
                        $('select[name="batch_id"]').append('<option value="'+ value.id +'">'+ value.batch_name +'</option>')
                    })
                }
            })
            .catch(function(error){
                console.log("Something is wrong");
            })
        });
    </script>
@endsection