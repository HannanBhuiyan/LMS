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
