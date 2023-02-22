@extends('admin.admin_master')
@section('title', 'Add Batch')
@section('content')

<div class="row mt-5">
    <div class="col-md-8 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('batch.index') }}">Batches</a></li>
              <li class="breadcrumb-item active" >Add Batch</li>
            </ol>
        </nav>
        <div class="card p-5 mt-4">
            <div class="category_title my-3">
                <h3>Add Batch</h3>
            </div>
            <form action="{{ route('batch.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label class="form-label">Course Name<span class="text-danger">*</span></label>
                    <select name="course_id" class="form-control form-select select2" data-bs-placeholder="Select">
                        <option selected="" disabled="">Select Course</option>
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
                    <input type="text" class="form-control" name="batch_name" placeholder="Batch Name">
                    @error('batch_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <input class="btn btn-secondary btn-pill" type="submit" value="Add Batch">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
