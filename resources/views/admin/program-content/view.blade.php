@extends('admin.admin_master')
@section('title', 'Program')
@section('content')
<div class="row mt-5">
    <div class="col-md-12 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('programs.index') }}">Program</a></li>
                <li class="breadcrumb-item active">Program View</li>
            </ol>
          </nav>
        <div class="card p-3 mt-4">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap border-bottom"> 
                    <tr>
                        <th scope="col">Image</th>
                        <td>
                            <img src="{{ asset($program_content->image) }}" alt="img">
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Title</th>
                        <td>{{ $program_content->title }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Description</th>
                        <td>{{ $program_content->description }}</td> 
                    </tr>     
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
