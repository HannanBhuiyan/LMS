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
    <title>Single Course</title>

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

    <style>

        .tablinks {
            background: #ddd;
            color: #000;
        }
        .tablinks.active {
            background: #233ac5;
            color: #fff;
        }
        .tablinks.active, .tablinks {
            width: 100%;
            border: none;
            font-size: 18px;
            text-align: start;
            padding: 8px 20px;
            margin-bottom: 14px;
            border-radius: 3px;
        }
        .course_single_title {
            color: #000;
            font-size: 22px;
            font-weight: 600;
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
        }
        .accordion-body {
            padding: 0 !important;
        }
        .accordion-item {
            margin-bottom: 15px;
        }
        .tablinks.active, .tablinks {
            font-size: 15px;
        }
        .accordion-button {
            font-size: 18px;
            padding: 15px;
        }
        /* .accordion-item:last-of-type .accordion-collapse {
            margin-top: 10px;
        } */
    </style>

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

            @if (Auth::user()->isban == 0)
            <!--app-content open-->
            <div class="main-content app-content" style="margin-top:100px">
                <div class="side-app">
                    <nav aria-label="breadcrumb p-3" style="margin-left: 12px">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ route('student.showallcourses') }}">Your Couse</a></li>
                          <li class="breadcrumb-item active">{{ $single_course_info->course_name }}</li>
                        </ol>
                    </nav>
                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">
                        <div class="row mt-5">
                            <div class="col-md-7">
                                @foreach ($class_content as $tabContent)
                                <div class="card p-3">  
                                    <ul>    
                                        @foreach (json_decode($tabContent->class_video) as $class_ll) 
                                            <div id="{{ $tabContent->chapter->chapter_name }}{{ $loop->index }}" class="tabcontent">
                                                <iframe width="100%" height="450" src="{{ $class_ll }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                <div class="card p-3 mt-4">
                                                    <h3>{{ $tabContent->relationWithblog->blog_title }}</h3>
                                                    <p>{!!$tabContent->relationWithblog->blog_content!!}</p>
                                                </div>
                                            </div> 
                                        @endforeach 
                                        </ul>
                                    </div>
                                @endforeach 
                            </div>
                            <div class="col-md-5"> 
                                <div class="card p-4">
                                  <p class="course_single_title"> {{ $single_course_info->course_name }}</p> 
 
                                  @forelse ($class_content as $item)
                                    <div class="accordion" id="accordionExample{{$item->id}}">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne{{$item->id}}">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$item->id}}" aria-expanded="true" aria-controls="collapseOne">
                                                {{ $item->chapter->chapter_name }}
                                            </button>
                                            </h2> 
                                            @foreach (json_decode($item->class_video) as $class_vid)
                                                <div id="collapseOne{{$item->id}}" class="accordion-collapse collapse" aria-labelledby="headingOne{{$item->id}}" data-bs-parent="#accordionExample{{$item->id}}">
                                                    <div class="accordion-body">
                                                        <button class="tablinks" onclick="openCity(event, '{{ $item->chapter->chapter_name }}{{ $loop->index }}')" id="defaultOpen">{{ $item->chapter->chapter_name }} Class {{ $loop->index+1 }}</button>
                                                    </div>
                                                </div> 
                                            @endforeach
                                        </div> 
                                    </div>
                                  @empty
                                    <span style="color:red; font-weight:700; font-size: 20px" >There is not content</span>
                                  @endforelse 
                                       
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
            <!--app-content close-->
            @endif

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

 

<!-- CUSTOM JS -->
<script src="{{ asset('backend') }}/assets/js/custom.js"></script>

<script>
    function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>

</body>

</html>
