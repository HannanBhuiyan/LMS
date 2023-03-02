@extends('admin.admin_master')
@section('title', 'Chapter')
@section('content')

<div class="row mt-5">
    <div class="col-md-8 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('chapter.index') }}">Chapter</a></li>
              <li class="breadcrumb-item active" >Edit Chapter</li>
            </ol>
        </nav>
        <div class="card p-5 mt-4"> 
            <form action="{{ route('chapter.update', $chapter_data->id ) }}" method="post">
                @csrf 
                @method('PUT')

                <div class="form-group">
                    <label class="form-label">Course Name<span class="text-danger">*</span></label>
                    <select name="course_id" class="form-control">
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{$chapter_data->course_id == $course->id ? 'selected' : ''}}>{{ $course->course_name }}</option>     
                        @endforeach
                    </select>
                    @error('course_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror 
                </div>
                <div class="form-group">
                    <label class="form-label">Batch Name{{$chapter_data->batch_id}}<span class="text-danger">*</span></label>
                    <select name="batch_id" class="form-control" id="course_dropdown">
                        @foreach ($batches as $batch)
                            <option value="{{ $batch->id }}" {{$chapter_data->batch_id == $batch->id ? 'selected' : ''}}>{{ $batch->batch_name }}</option>     
                        @endforeach
                    </select>
                    @error('batch_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror 
                </div>
                <div class="form-group">
                    <label class="form-label">Chapter Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="{{ $chapter_data->chapter_name }}" name="chapter_name" placeholder="Exmp: Html">
                    @error('chapter_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror 
                </div> 
                <div class="form-group">
                    <input class="btn btn-secondary btn-pill" type="submit" value="Update Chapter">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="course_id"]').on('change', function(event){
        event.preventDefault();
        let course_id = $(this).val();
        
            $.ajax({
                url: "{{ route('course_dropdown') }}",
                type: "POST",
                data: {
                    course_id : course_id,
                },
                success: function(data){
                    console.log(data);
                    $('#course_dropdown').html(data)
                },
            });
        });
    });
</script>
@endsection
