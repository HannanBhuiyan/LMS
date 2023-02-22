@extends('admin.admin_master')
@section('title', 'Logo')
@section('content')
<div class="row mt-5">
    <div class="col-md-12 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Logo</li>
            </ol>
          </nav>
        <div class="card p-3 mt-4">
            <div class="category_title my-3 d-flex justify-content-between">
               <div class="left">
                    <h3>Logo</h3>
               </div>
               <div class="left">
                <a href="{{ route('site_logo.index') }}" class="btn btn-info">Back</a>
           </div>
            </div>
            <div class="card">
                 <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('site_logo.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Logo</label>
                                <input type="file" name="site_logo" class="form-control">
                                @error('site_logo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group"> 
                                <input type="submit" class="btn btn-success" value="Add Logo">
                            </div>
                        </form>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>

@endsection
