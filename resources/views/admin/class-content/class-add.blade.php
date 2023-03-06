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
                        <option selected="" disabled="">--Select Course--</option>
                        @foreach($course as $item )
                            <option value="{{ $item->id }}" >{{ $item->course_name }}</option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Batch Name<span class="text-danger">*</span></label> 
                    <select name="batch_id" class="form-control" data-bs-placeholder="Select">
                        <option value="#" disabled selected>--Select Batch--</option>
                    </select>
                    @error('batch_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Chapter Name<span class="text-danger">*</span></label>
                    <select name="chapter_id" class="form-control" data-bs-placeholder="Select">
                        <option selected disabled>--Select Chapter--</option>
                    </select>
                    @error('chapter_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Class Name<span class="text-danger">*</span></label>
                    <input type="text" name="blog_class_name" placeholder="Class Name" class="form-control">
                    @error('blog_class_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label class="form-label">Content Type<span class="text-danger">*</span></label>
                        <div class="mb-1">
                            <input type="radio" class="blogContentType" name="content_type" id="blog_content_type" value="blog"> <label for="blog_content_type">Blog</label>
                        </div>
                        <div >
                            <input type="radio" class="blogContentType" name="content_type" id="video_content_type" value="video" ><label for="video_content_type">Video</label>
                        </div>
                    @error('content_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group" id="blogContent">
                    <label class="form-label">Blog Name</label>
                    <select name="blog_id" class="form-select form-control select2 blog_dropdown" data-bs-placeholder="Select">
                        <option value selected >--Select Blog--</option>
                        @foreach($blog as $item )
                            <option value="{{ $item->id }}" >{{ $item->blog_title }}</option>
                        @endforeach
                    </select>
                    @error('blog_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- video part --}}
                <div class="form-group" id="videoContent">
                    <div class="form-group">
                        <label> Class Video Link <span class="text-warning">(If YouTube Video, give the embed link)</span> </label>
                        <input type="text" class="form-control class_video" name="class_video" placeholder="Http://...">
                        
                    </div>
                    <div class="form-group">
                        <label> Class Short Descrioption</label>
                        <textarea name="class_desc" id="test-area"  class="form-control class_desc" placeholder="Short Description" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <input class="btn btn-secondary btn-pill" type="submit" value="Add class">
                </div>

            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script type="text/javascript">
ClassicEditor
    .create( document.querySelector( '#test-area' ) )
    .catch( error => {
        console.error( error );
    } );

     $('select[name="course_id"]').on('change', function(event){
        event.preventDefault();
        let course_id = $(this).val();
        axios.get('changeCourseName/ajax/'+ course_id)
        .then(function(response){
            if(response.status === 200){ 
                    $('select[name="chapter_id"]').html(" ");
                    $('select[name="chapter_id"]').append('<option value="">--select batch--</option>')
                    $('select[name="batch_id"]').empty();
                    $('select[name="batch_id"]').append('<option value="">--select batch--</option>')
                $.each(response.data, function(key, value){
                    $('select[name="batch_id"]').append('<option value="'+ value.id +'">'+ value.batch_name +'</option>')
                })
            }
        })
        .catch(function(error){
            console.log(error);
        })
    }); 

    $('select[name="batch_id"]').on('change', function(event){
            event.preventDefault();
            let batch_id = $(this).val();
           
            axios.get('changeBatchName/ajax/'+ batch_id)
            .then(function(response){
                if(response.status === 200){
                    let d = $('select[name=""]').empty(); 
                    $('select[name="chapter_id"]').html(" ");
                    $('select[name="chapter_id"]').append('<option value="">--select batch--</option>')
                        $.each(response.data, function(key, value){
                            $('select[name="chapter_id"]').append( '<option value="'+ value.id +'">'+ value.chapter_name+'</option>')
                        })
                    }
                })
                .catch(function(error){
                  console.log('Somthing Wrong! Please try again');
                });
        })
</script>
<script>
    // blog content type
    $("#blogContent").hide();
    $("#videoContent").hide();
    $('.blogContentType').on('click',function(e){
        let value = this.value;
        if(value == "blog"){
            $("#blogContent").show(200);
            $("#videoContent").hide(200);
            // $('.class_video').val("")
            // $('.class_desc').val("")
        }else{
            $("#blogContent").hide(200);
            // $('select[name="blog_id"]').empty()
            $("#videoContent").show(200);
        }

    })

    $(document).ready(function(){ 
        $('.blog_dropdown').select2({
            width: '100%',
            placeholder: "Select"
        });
    })
</script>



{{-- <script> 
 
    $(document).ready(function () {
        $('#add_more').click(function (){
            // alert('hi');
            let new_properties_html =
            `<div class="row new_properties">
                <div class="col-10">
                    <input type="text" name="class_video[]" class="form-control mb-1" placeholder="Http://...">
                </div>
                <div class="col-2">
                <button type="button" class="close remove--new_properties">
                    <span>&times;</span>
                </button>
                </div>
            </div>`;
            $('.properties-container').append(new_properties_html);
        });
        $(document).on('click', '.remove--new_properties', function(){
            $(this).closest(".new_properties").remove();
        }); 
    });
</script> --}}
<!--######## Add more options JS Code ###### -->

@endsection