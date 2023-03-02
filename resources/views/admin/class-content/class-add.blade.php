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
                    <select name="batch_id" class="form-control">
                        <option value selected>--Select Batch--</option>
                    </select>
                    @error('batch_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Chapter Name<span class="text-danger">*</span></label>
                    <select name="chapter_id" class="form-control">
                        <option selected value>--Select Chapter--</option>
                    </select>
                    @error('chapter_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Blog Name<span class="text-danger">*</span></label>
                    <select name="blog_id" class="form-control form-select select2" data-bs-placeholder="Select">
                        <option value selected >--Select Blog--</option>
                        @foreach($blog as $item )
                            <option value="{{ $item->id }}" >{{ $item->blog_title }}</option>
                        @endforeach
                    </select>
                    @error('blog_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label> Class Video Link </label>
                    <div class="row new_properties mb-1">
                        <div class="col-10">
                            <input type="text" class="form-control" name="class_video[]" placeholder="Http://...">
                        </div>
                        <div class="col-2">
                            <button type="button" class="close remove--new_properties">
                                <span>&times;</span>
                            </button>
                        </div>
                    </div>
                    <div class="properties-container"></div>
                    <div class="btn btn-info mt-1" id="add_more">Add More</div>
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
     $('select[name="course_id"]').on('change', function(event){
        event.preventDefault();
        let course_id = $(this).val();
        axios.get('changeCourseName/ajax/'+ course_id)
        .then(function(response){
            if(response.status === 200){ 
                    $('select[name="chapter_id"]').html(" ");
                    $('select[name="chapter_id"]').append('<option>--select batch--</option>')
                    $('select[name="batch_id"]').empty();
                    $('select[name="batch_id"]').append('<option>--select batch--</option>')
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
                        $.each(response.data, function(key, value){
                            $('select[name="chapter_id"]').append( '<option value="'+ value.id +'">'+ value.chapter_name+'</option>')
                        })
                    }
                })
                .catch(function(error){
                    toastr.error("Somthing Wrong! Please try again");
                });
        })
</script>


<script> 
 
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
</script>
<!--######## Add more options JS Code ###### -->

@endsection