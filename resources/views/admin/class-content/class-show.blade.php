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
    <title>Class Show</title>

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
            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid" style="margin-top: 100px !important">
                         <div class="row mt-5">
                            <div class="col-md-12 m-auto">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('class-content.index') }}">Class List</a></li>
                                        <li class="breadcrumb-item active">Class Content</li>
                                    </ol>
                                </nav>

                                <div class="card p-5 mt-4">
                                    <div class="category_title my-3 d-flex justify-content-between">
                                        <div class="left">
                                            <h3>Class Content</h3>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <tbody>
                                                <tr>
                                                    <th>Course Name</th>
                                                    <td>
                                                        {{ $items->course->course_name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Batch Name</th>
                                                    <td>
                                                        {{ $items->batch->batch_name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Chapter Name</th>
                                                    <td>
                                                        {{ $items->chapter->chapter_name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Video URL</th>
                                                    <td>  {{ $items->class_video }} </td>
                                                </tr>
                                                <tr>
                                                    <th>Class Content</th>
                                                    <td>
                                                        @if ($items->class_text)
                                                            {!! $items->class_text !!}
                                                        @else
                                                            <p>There is no content</p>
                                                        @endif

                                                    </td>
                                                </tr>
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



<!-- SIDE-MENU JS-->
<script src="{{ asset('backend') }}/assets/plugins/sidemenu/sidemenu.js"></script>

<!-- SIDEBAR JS -->
<script src="{{ asset('backend') }}/assets/plugins/sidebar/sidebar.js"></script>


<!-- CUSTOM JS -->
<script src="{{ asset('backend') }}/assets/js/custom.js"></script>




</body>

</html>
