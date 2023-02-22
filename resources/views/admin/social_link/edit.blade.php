@extends('admin.admin_master')
@section('title', 'Social Links')
@section('content')
<div class="row mt-5">
    <div class="col-md-12 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('social_links.index') }}">Index</a></li>
                <li class="breadcrumb-item active">Update</li>
            </ol>
          </nav>
        <div class="card p-3 mt-4"> 
            <div class="row"> 
                <div class="col-md-7">
                    <div class="category_title my-3 d-flex justify-content-between">
                        <div class="left">
                             <h3>Social Link</h3>
                        </div>
                     </div> 
                    <div class="card">
                        <form action="{{ route('social_links.update', $social_links->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Facebook Link</label>
                                <input type="text" class="form-control" value="{{ $social_links->facebook }}" name="facebook" placeholder="Http://..."> 
                            </div>
                            <div class="form-group">
                                <label>Twitter Link</label>
                                <input type="text" class="form-control" value="{{ $social_links->twitter }}" name="twitter" placeholder="Http://...">
                            </div>
                            <div class="form-group">
                                <label>Instagram Link</label>
                                <input type="text" class="form-control" value="{{ $social_links->instragram }}" name="instragram" placeholder="Http://...">
                            </div>
                            <div class="form-group">
                                <label>Linkedin Link</label>
                                <input type="text" class="form-control" value="{{ $social_links->linkedin }}" name="linkedin" placeholder="Http://...">
                            </div>
                            <div class="form-group">
                                <label>Youtube Link</label>
                                <input type="text" class="form-control" value="{{ $social_links->youtube }}" name="youtube" placeholder="Http://...">
                            </div>
                            <div class="form-group">
                                <label>Telegram Link</label>
                                <input type="text" class="form-control" value="{{ $social_links->telegram }}" name="telegram" placeholder="Http://...">
                            </div>
                            
                            <div class="form-group"> 
                                <input type="submit" class="btn btn-success" value="Update Social Link">
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
