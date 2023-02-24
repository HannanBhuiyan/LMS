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
    <title>@yield('title')</title>

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
                    <div class="main-container container-fluid">
                        @yield('content')
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


<!-- INPUT MASK JS-->
<script src="{{ asset('backend') }}/assets/plugins/input-mask/jquery.mask.min.js"></script>

<!-- SIDE-MENU JS-->
<script src="{{ asset('backend') }}/assets/plugins/sidemenu/sidemenu.js"></script>

<!-- TypeHead js -->
<script src="{{ asset('backend') }}/assets/plugins/bootstrap5-typehead/autocomplete.js"></script>
<script src="{{ asset('backend') }}/assets/js/typehead.js"></script>

<!-- SIDEBAR JS -->
<script src="{{ asset('backend') }}/assets/plugins/sidebar/sidebar.js"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="{{ asset('backend') }}/assets/plugins/p-scroll/perfect-scrollbar.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/p-scroll/pscroll.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/p-scroll/pscroll-1.js"></script>

<!-- FILE UPLOADES JS -->
<script src="{{ asset('backend') }}/assets/plugins/fileuploads/js/fileupload.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/fileuploads/js/file-upload.js"></script>

<!-- INTERNAL Bootstrap-Datepicker js-->
<script src="{{ asset('backend') }}/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- INTERNAL File-Uploads Js-->
<script src="{{ asset('backend') }}/assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/fancyuploder/jquery.fileupload.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/fancyuploder/fancy-uploader.js"></script>

<!-- INPUT MASK JS-->
<script src="{{ asset('backend') }}/assets/plugins/input-mask/jquery.mask.min.js"></script>

<!-- INTERNAL SELECT2 JS -->
<script src="{{ asset('backend') }}/assets/plugins/select2/select2.full.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/select2.js"></script>

 <!-- BOOTSTRAP-DATERANGEPICKER JS -->
 <script src="{{ asset('backend') }}/assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
 <script src="{{ asset('backend') }}/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

 <!-- INTERNAL Bootstrap-Datepicker js-->
 <script src="{{ asset('backend') }}/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>

 <!-- INTERNAL Sumoselect js-->
 <script src="{{ asset('backend') }}/assets/plugins/sumoselect/jquery.sumoselect.js"></script>

 <!-- INTERNAL jquery transfer js-->
 <script src="{{ asset('backend') }}/assets/plugins/jQuerytransfer/jquery.transfer.js"></script>

 <!-- INTERNAL multi js-->
 <script src="{{ asset('backend') }}/assets/plugins/multi/multi.min.js"></script>

 <!-- DATEPICKER JS -->
 <script src="{{ asset('backend') }}/assets/plugins/date-picker/date-picker.js"></script>
 <script src="{{ asset('backend') }}/assets/plugins/date-picker/jquery-ui.js"></script>
 <script src="{{ asset('backend') }}/assets/plugins/input-mask/jquery.maskedinput.js"></script>

<!-- SPARKLINE JS-->
<script src="{{ asset('backend') }}/assets/js/jquery.sparkline.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/time-picker/jquery.timepicker.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/time-picker/toggles.min.js"></script>

<!-- SHOW PASSWORD JS -->
<script src="{{ asset('backend') }}/assets/js/show-password.min.js"></script>

<!-- CHART-CIRCLE JS-->
<script src="{{ asset('backend') }}/assets/js/circle-progress.min.js"></script>

<!-- PIETY CHART JS-->
<script src="{{ asset('backend') }}/assets/plugins/peitychart/jquery.peity.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/peitychart/peitychart.init.js"></script>

<!-- FORM WIZARD JS-->
<script src="{{ asset('backend') }}/assets/plugins/formwizard/jquery.smartWizard.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/formwizard/fromwizard.js"></script>

<!-- INTERNAl Jquery.steps js -->
<script src="{{ asset('backend') }}/assets/plugins/jquery-steps/jquery.steps.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/parsleyjs/parsley.min.js"></script>

<!-- INTERNAL Accordion-Wizard-Form js-->
<script src="{{ asset('backend') }}/assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/form-wizard.js"></script>

<!-- INTERNAL CHARTJS CHART JS-->
<script src="{{ asset('backend') }}/assets/plugins/chart/Chart.bundle.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/chart/rounded-barchart.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/chart/utils.js"></script>

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

<!-- INTERNAL APEXCHART JS -->
<script src="{{ asset('backend') }}/assets/js/apexcharts.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/apexchart/irregular-data-series.js"></script>

<!-- INTERNAL Flot JS -->
<script src="{{ asset('backend') }}/assets/plugins/flot/jquery.flot.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/flot/jquery.flot.fillbetween.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/flot/chart.flot.sampledata.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/flot/dashboard.sampledata.js"></script>

<!-- INTERNAL Vector js -->
<script src="{{ asset('backend') }}/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- INTERNAL INDEX JS -->
<script src="{{ asset('backend') }}/assets/js/index1.js"></script>


<!-- INTERNAL SUMMERNOTE Editor JS -->
<script src="{{ asset('backend') }}/assets/plugins/summernote/summernote1.js"></script>
<script src="{{ asset('backend') }}/assets/js/summernote.js"></script>

<!-- INTERNAL FORMEDITOR JS -->
<script src="{{ asset('backend') }}/assets/plugins/quill/quill.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/form-editor2.js"></script>

<!-- MULTI SELECT JS-->
<script src="{{ asset('backend') }}/assets/plugins/multipleselect/multiple-select.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/multipleselect/multi-select.js"></script>

<!-- FORMELEMENTS JS -->
<script src="{{ asset('backend') }}/assets/js/formelementadvnced.js"></script>
<script src="{{ asset('backend') }}/assets/js/form-elements.js"></script>

<!-- Color Theme js -->
<script src="{{ asset('backend') }}/assets/js/themeColors.js"></script>

<!-- Sticky js -->
<script src="{{ asset('backend') }}/assets/js/sticky.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<!-- Switcher js -->
<script src="{{ asset('backend') }}/assets/switcher/js/switcher.js"></script>

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
