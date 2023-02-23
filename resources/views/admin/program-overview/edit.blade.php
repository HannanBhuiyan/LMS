@extends('admin.admin_master')
@section('title', 'Program')
@section('content')
<div class="row mt-5">
    <div class="col-md-12 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('program_overview.index') }}">Program Overview</a></li>
                <li class="breadcrumb-item active">Edit Overview Content</li>
            </ol>
          </nav>
        <div class="card p-3 mt-4">
            <form action="{{ route('program_overview.update', $programoverview->id ) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Overview Content</label>
                    <input type="text" value="{{ $programoverview->overview_content }}" name="overview_content" placeholder="Write something" class="form-control">
                </div>
                <button class="btn btn-success mt-2">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
