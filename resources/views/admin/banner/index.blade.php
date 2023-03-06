@extends('admin.admin_master')
@section('title', 'Banner')
@section('content')

<div class="row mt-5">
    <div class="col-md-8 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('banner.index') }}">Banner</a></li>
              <li class="breadcrumb-item active" >Edit Banner</li>
            </ol>
        </nav>
        <div class="card p-5 mt-4"> 
            <form action="{{ route('banner.update', $banner->id) }}" method="post" enctype="multipart/form-data">
                @csrf 
                @method('PUT')
                <div class="form-group">
                    <label class="form-label">Title(Left)<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="{{ $banner->title_one }}" name="title_one">
                    @error('title_one')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror 
                </div> 
                <div class="form-group">
                    <label class="form-label">Title(Right)<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="{{ $banner->title_two }}" name="title_two">
                    @error('title_two')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror 
                </div> 
                <div class="form-group">
                    <label class="form-label">Description<span class="text-danger">*</span></label>
                    <textarea class="form-control" rows="7" name="description">{{$banner->description}}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror 
                </div> 

                <div class="col-12">
                    <div class="form-group">
                        <label for="image"> Previous Image</label><br>
                        <img src="{{ asset($banner->banner_image) }}" alt="not found" width="200">
                    </div>
                </div>

                <div class="form-group">
                    <label for="category_image"> Banner Image </label>
                    <input type="file" id="banner_image" class="form-control" name="banner_image"/>
                </div>
                @error('banner_image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="form-group">
                    <img width="200" id="output">
                </div>
                 
                <div class="form-group">
                    <input class="btn btn-secondary btn-pill" type="submit" value="Update Banner">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        document.getElementById('banner_image').onchange = function() {
        var src = URL.createObjectURL(this.files[0])
        document.getElementById('output').src = src
    }

    </script>
@endsection 
