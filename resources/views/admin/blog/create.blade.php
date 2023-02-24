@extends('admin.admin_master')
@section('title', 'Blog')
@section('content')

<div class="row mt-5">
    <div class="col-md-8 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
              <li class="breadcrumb-item active" >Add Blog</li>
            </ol>
        </nav>
        <div class="card p-5 mt-4"> 
            <form action="{{ route('blog.store') }}" method="post">
                @csrf 
                <div class="form-group">
                    <label class="form-label">Blog Title<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="blog_title" placeholder="Enter blog title">
                    @error('blog_title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror 
                </div> 
                <div class="form-group">
                    <label class="form-label">Blog Name<span class="text-danger">*</span></label>
                    <textarea name="blog_content" id="test-area" cols="30" rows="10" placeholder="Enter link or text...."></textarea>
                    @error('blog_content')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror 
                </div> 
                <div class="form-group">
                    <input class="btn btn-secondary btn-pill" type="submit" value="Add Blog">
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
    </script>
@endsection 
