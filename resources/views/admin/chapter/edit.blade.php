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
