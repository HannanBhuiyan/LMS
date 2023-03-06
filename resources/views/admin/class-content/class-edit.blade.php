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
                    <select name="batch_id" class="form-control" id="batch_dropdown">
                        <option value selected>--Select Batch--</option>
                        @foreach($batches as $item )
                            <option value="{{ $item->id }}" {{ $item->id == $class_content->batch_id ? 'selected': ''}}>{{ $item->batch_name }}</option>
                        @endforeach
                    </select>
                    @error('batch_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Chapter Name<span class="text-danger">*</span></label>
                    <select name="chapter_id" class="form-control form-select select2" data-bs-placeholder="Select" id="chapter_dropdown">
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
                    <label class="form-label">Class Name<span class="text-danger">*</span></label>
                    <input type="text" name="blog_class_name" value="{{$class_content->blog_class_name}}" class="form-control">
                    @error('blog_class_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Content Type<span class="text-danger">*</span></label>
                        <div class="mb-1">
                            <input type="radio" class="blogContentType" name="content_type" id="blog_content_type" value="blog" {{ ($class_content->content_type=="blog")? "checked" : "" }}> <label for="blog_content_type">Blog</label>
                        </div>
                        <div >
                            <input type="radio" class="blogContentType" name="content_type" id="video_content_type" value="video" {{ ($class_content->content_type=="video")? "checked" : "" }}><label for="video_content_type">Video</label>
                        </div>
                    @error('content_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group" id="blogContent">
                    <label class="form-label">Blog Name</label>
                    <select name="blog_id" class="form-select form-control select2 blog_dropdown" data-bs-placeholder="Select">
                        <option selected="" disabled="">Select Blog</option>
                        @foreach($blog as $item )
                            <option value="{{ $item->id }}" {{ $item->id == $class_content->blog_id ? 'selected': ''}}>{{ $item->blog_title }}</option>
                        @endforeach
                    </select>
                    @error('blog_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>                    

                <div class="form-group" id="videoContent">
                    <div class="form-group">
                        <label> Class Video Link <span class="text-warning">(If YouTube Video, give the embed link)</span> </label>
                        <input type="text" class="form-control class_video" name="class_video" value="{{$class_content->class_video}}">
                        
                    </div>
                    <div class="form-group">
                        <label> Class Short Descrioption</label>
                        <textarea name="class_desc" class="form-control class_desc" placeholder="Short Description" id="test-area" cols="30" rows="10">{{$class_content->class_desc}}</textarea>
                        {{-- <input class="form-control class_desc" type="text" name="class_desc" value="{{$class_content->class_desc}}"> --}}
                    </div>
                </div>
 

                <div class="form-group">
                    <input class="btn btn-secondary btn-pill" type="submit" value="Update class">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    ClassicEditor
    .create( document.querySelector( '#test-area' ) )
    .catch( error => {
        console.error( error );
    } );

    // CKEDITOR.replace('class_desc');

    console.log('item', "{{$class_content->content_type}}")
    let selectedContentType =  "{{$class_content->content_type}}"

    if(selectedContentType=='blog'){
        $("#blogContent").show();
        $("#videoContent").hide();
        // console.log('ok')
    }else{
        $("#videoContent").show();
        $("#blogContent").hide();
        // console.log('ok not')
    }

   
    $('.blogContentType').on('click',function(e){
        let value = this.value;
        if(value == "blog"){
            $("#blogContent").show(200);
            $("#videoContent").hide(200);
            // console.log('blog')
        }else{
            $("#blogContent").hide(200);
            $("#videoContent").show(200);
            
            // console.log('video')
        }

    })

    $(document).ready(function(){ 
        $('.blog_dropdown').select2({
            width: '100%',
            placeholder: "Select"
        });
    })
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="course_id"]').on('change', function(event){
        event.preventDefault();
        let course_id = $(this).val();
        // alert(course_id)
        
            $.ajax({
                url: "{{ route('batch_dropdown') }}",
                type: "POST",
                data: {
                    course_id : course_id,
                },
                success: function(data){
                    $('#batch_dropdown').html(data)
                },
            });
        });

        $('select[name="batch_id"]').on('change', function(event){
        event.preventDefault();
        let batch_id = $(this).val();
        // alert(batch_id)
        
            $.ajax({
                url: "{{ route('chapter_dropdown') }}",
                type: "POST",
                data: {
                    batch_id : batch_id,
                },
                success: function(data){
                    $('#chapter_dropdown').html(data)
                },
            });
        });
    });
</script>
@endsection
