@extends('admin.admin_master')
@section('title', 'Blog')
@section('content')

<div class="row mt-5">
    <div class="col-md-8 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
              <li class="breadcrumb-item active" >View</li>
            </ol>
        </nav>
        <div class="card p-5 mt-4"> 
            <table class="table table-bordered">
                <tr>
                    <td>{{ $blog->blog_title}}</td>
                </tr>
                <tr>
                    <td>{!! $blog->blog_content !!}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
 
