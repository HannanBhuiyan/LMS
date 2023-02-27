@extends('admin.admin_master')
@section('title', 'Student Dashboard')
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Dashboardss</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 OPEN -->
    <div class="row" id="user-profile">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Image</div>
                </div>
                <div class="card-body">
                    <div class="text-center chat-image mb-5">
                        <form action="{{ route('profile.image.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_image" value="{{ Auth::user()->student_image }}">
                                <img alt="avatar" width="300px" id="img" height="300px" src="{{ (!empty(Auth::user()->student_image)) ? asset(Auth::user()->student_image): asset('backend/assets/uploads/default.jpg') }}" class="brround">
                                <input onchange="document.getElementById('img').src=window.URL.createObjectURL(this.files[0])" type="file" name="student_image" class="form-control my-4">
                                <input type="submit" value="Upload" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Profile</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputname">First Name</label>
                        <input type="text" class="form-control" disabled value="{{ Auth::user()->name }}" id="exampleInputname" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" disabled name="email" id="exampleInputEmail1" value="{{ Auth::user()->email }}" placeholder="Email address">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputnumber">Contact Number</label>
                        <input type="number" name="phone" disabled  value="{{ Auth::user()->student_phone }}" class="form-control" id="exampleInputnumber" placeholder="Contact number">
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- ROW-1 CLOSED -->
@endsection
