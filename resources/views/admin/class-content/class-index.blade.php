<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend') }}/assets/images/brand/favicon.ico" />

    <!-- TITLE -->
    <title>Class List</title>


    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('backend') }}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('backend') }}/assets/css/style.css" rel="stylesheet" />
    <link href="{{ asset('backend') }}/assets/css/dark-style.css" rel="stylesheet" />
    <link href="{{ asset('backend') }}/assets/css/transparent-style.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/assets/css/skin-modes.css" rel="stylesheet" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('backend') }}/assets/css/icons.css" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('backend') }}/assets/colors/color1.css" />

    <!-- INTERNAL Switcher css -->
    <link href="{{ asset('backend') }}/assets/switcher/css/switcher.css" rel="stylesheet" />
    <link href="{{ asset('backend') }}/assets/switcher/demo.css" rel="stylesheet" />

</head>

<body class="app sidebar-mini ltr light-mode">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ asset('backend') }}/assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
                @include('admin.body.header')
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
            @include('admin.body.sidebar')

            <!--app-content open-->
            <div class="main-content app-content" style="margin-top: 100px">
                <div class="side-app"> 
                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">
                        <div class="row mt-5">
                            <div class="col-md-12 m-auto">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Classes</li>
                                    </ol>
                                  </nav>
                                <div class="card p-3 mt-4">
                                    <div class="category_title my-3 d-flex justify-content-between">
                                       <div class="left">
                                            <h3>Class List</h3>
                                       </div>
                                       <div class="right">
                                            <a class="btn btn-primary" href="{{ route('class-content.create') }}">Add New Class</a>
                                       </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                            <thead>
                                              <tr>
                                                <th scope="col">SL No</th>
                                                <th scope="col">Course Name</th>
                                                <th scope="col">Blog Name</th>
                                                <th scope="col">Chapter Name</th>
                                                <th scope="col">Video URl</th> 
                                                <th scope="col">Action</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($class_conent as $items)
                                                <tr>
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>{{ $items->course->course_name }}</td>
                                                    <td>{{ Str::headline($items->relationWithblog->blog_title) }}</td>
                                                    <td>{{ $items->chapter->chapter_name }}</td>
                                                    <td> 
                                                        @if (json_decode($items->class_video))
                                                            @foreach (json_decode($items->class_video) as $vdo)
                                                                <ul><a href="{{$vdo}}" target="_blank">{{$vdo}}</a></ul>
                                                            @endforeach    
                                                        @endif
                                                    </td> 
                                                    <td>
                                                        <a href="{{ route('class-content.edit', $items->id) }}" class="btn btn-success">Edit</a>
                                                        <a href="{{ route('class-content.show', $items->id) }}" class="btn btn-secondary">Show</a>
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
                                                                        <a href="{{ route('class.content.delete', $items->id) }}" class="btn btn-danger">Delete</a>
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
                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
            <!--app-content close-->

        </div>



        <!-- FOOTER -->
        @include('admin.body.footer')
        <!-- FOOTER END -->

    </div>

<!-- BACK-TO-TOP -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

<!-- JQUERY JS -->
<script src="{{ asset('backend') }}/assets/js/jquery.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="{{ asset('backend') }}/assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>



<!-- DATA TABLE JS-->
<script src="{{ asset('backend') }}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/datatable/js/jszip.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/datatable/js/buttons.html5.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/datatable/js/buttons.print.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/datatable/js/buttons.colVis.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/datatable/responsive.bootstrap5.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/table-data.js"></script>


<!-- SIDE-MENU JS-->
<script src="{{ asset('backend') }}/assets/plugins/sidemenu/sidemenu.js"></script>

<!-- SIDEBAR JS -->
<script src="{{ asset('backend') }}/assets/plugins/sidebar/sidebar.js"></script>

<!-- INTERNAL SELECT2 JS -->
<script src="{{ asset('backend') }}/assets/plugins/select2/select2.full.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/select2.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- CUSTOM JS -->
<script src="{{ asset('backend') }}/assets/js/custom.js"></script>



@if (Session::has('success'))
   <script>
      toastr.success("{!! Session::get('success') !!}")
   </script>
@endif

@if (Session::has('fail'))
   <script>
      toastr.error("{!! Session::get('fail') !!}")
   </script>
@endif

@yield('scripts')

</body>

</html>
