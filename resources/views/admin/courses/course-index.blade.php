@extends('admin.admin_master')
@section('title', 'Courses')
@section('content')
<div class="row mt-5">
    <div class="col-md-12 m-auto">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Courses</li>
            </ol>
          </nav>
        <div class="card p-3 mt-4">
            <div class="category_title my-3 d-flex justify-content-between">
               <div class="left">
                    <h3>Courses List</h3>
               </div>
               <div class="right">
                    <a class="btn btn-primary" href="{{ route('courses.create') }}">Add New Course</a>
               </div>
            </div>
            <div class="table-responsive">
                <table class="table text-center table-bordered text-nowrap border-bottom" id="basic-datatable">
                    <thead>
                    <tr>
                        <th scope="col">SL No</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Classes</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Status</th>
                        <th scope="col">Start date</th>
                        <th scope="col">Short Description</th> 
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($course as $items)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $items->course_name }} <span style="color:red">({{ $items->assign_course->count() }} Students)</span></td>
                            <td>{{ $items->class_content->count() }}</td>
                            <td>{{ $items->course_duration }}</td>
                            <td>
                                @if ($items->status == 'on')
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-info">Inactive</span>
                                @endif

                            </td>
                            <td>{{ $items->start_date }}</td>
                            <td>{!! Str::limit($items->course_short_des, 30, '...') !!}</td> 
                            <td>
                                <img width="100px" height="100px" src="{{ (!empty($items->thumbnail)) ? asset($items->thumbnail) : asset('backend/assets/uploads/default.jpg') }}" alt="image">
                            </td>
                            <td>
                                @if ($items->status == "on")
                                    <a href="{{ route('course.inactive', $items->id) }}" class="btn btn-info">Inactive</a>
                                @else
                                    <a href="{{ route('course.active', $items->id) }}" class="btn btn-success">Active</a>
                                @endif

                                <a href="{{ route('courses.edit', $items->id) }}" class="btn btn-primary">Edit</a>
                                <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modaldemo8__{{ $items->id }}">Delete</a>
                            </td>
                        </tr>

                        <!-- MODAL EFFECTS -->
                        <div class="modal fade" id="modaldemo8__{{ $items->id }}">
                            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                <div class="modal-content modal-content-demo">
                                    <div class="card-body text-center">
                                        <span class=""><svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 24 24"><path fill="#f07f8f" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"/><circle cx="12" cy="17" r="1" fill="#e62a45"/><path fill="#e62a45" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"/></svg></span>
                                        <h4 class="h4 mb-0 mt-3">Warning</h4>
                                        <p class="card-text">Are you sure you want to delete data?</p>
                                        <strong class="card-text text-red">Once deleted, you will not be able to recover this data!</strong>
                                    </div>
                                    <div class="card-footer text-center border-0 pt-0">
                                        <div class="row">
                                            <div class="text-center">
                                                <a href="javascript:void(0)" class="btn btn-white me-2" data-bs-dismiss="modal">Cancel</a>
                                                <a href="{{ route('courses.delete', $items->id) }}" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
