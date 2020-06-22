<!DOCTYPE html>
<html>

<head>
    <!-- -------------- Meta and Title -------------- -->
    <meta charset="utf-8">
    <title> Human Resource Management System </title>
    <meta name="description" content="HRMS">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
{{--    <meta name="csrf_token" content="{{csrf_token()}}">--}}

<!-- -------------- Fonts -------------- -->
    <link rel='stylesheet' type='text/css' href='assets/font.css'>

    <!-- -------------- Icomoon -------------- -->
    <link rel="stylesheet" type="text/css" href="/assets/fonts/icomoon/icomoon.css">

    <!-- -------------- FullCalendar -------------- -->
    <link rel="stylesheet" type="text/css" href="/assets/js/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/js/plugins/magnific/magnific-popup.css">

    <!-- -------------- Plugins -------------- -->

    <!-- -------------- CSS - theme -------------- -->
    <link rel="stylesheet" type="text/css" href="/assets/skin/default_skin/css/theme.css">


    <!-- -------------- CSS - allcp forms -------------- -->
    <link rel="stylesheet" type="text/css" href="/assets/allcp/forms/css/forms.css">
    <link rel="stylesheet" type="text/css" href="/assets/allcp/forms/css/widget.css">

    <link rel="stylesheet" type="text/css" href="assets/js/plugins/select2/css/core.css">
    <!-- -------------- Favicon -------------- -->
    <link rel="shortcut icon" href="/assets/img/favicon-96x96.png">


    <!--  Custom css -->
    <link rel="stylesheet" type="text/css" href="/assets/custom.css">

    <!-- Sweet alert -->
    <link rel="stylesheet" type="text/css" href="/assets/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="/assets/allcp/forms/css/bootstrap-select.css">


    @stack('styles')

    @push('scripts')
        <script src="/assets/js/pages/forms-widgets.js"></script>
        <script src="/assets/js/custom.js"></script>
        <script src="/assets/allcp/forms/js/bootstrap-select.js"></script>
@endpush

<!-- -------------- IE8 HTML5 support  -------------- -->
    <!--[if lt IE 9]>-->
    <script src="/assets/jquery.js"></script>
    <script src="/assets/bootstrap3-typeahead.min.js"></script>
    <script src="/assets/html5shiv.js"></script>
    <script src="/assets/respond.min.js"></script>



</head>

<body>

<!-- -------------- Customizer -------------- -->
<!-- -------------- Body Wrap  -------------- -->
<div id="main">

    <!-- -------------- Header  -------------- -->
@include('inc.header')
<!-- -------------- /Header  -------------- -->

    <!-- -------------- Sidebar  -------------- -->
    <aside id="sidebar_left" class="nano nano-light affix">

        <!-- -------------- Sidebar Left Wrapper  -------------- -->
        <div class="sidebar-left-content nano-content animated fadeIn">

            <!-- -------------- Sidebar Header -------------- -->
            <header class="sidebar-header animated fadeIn">

                <!-- -------------- Sidebar - Author -------------- -->
            @include('inc.sidebar')

            <!-- -------------- Sidebar Hide Button -------------- -->
                <div class="sidebar-toggler">
                    <a href="#">
                        <span class="fa fa-arrow-circle-o-left"></span>
                    </a>
                </div>
                <!-- -------------- /Sidebar Hide Button -------------- -->
            </header>
        </div>
        <!-- -------------- /Sidebar Left Wrapper  -------------- -->

    </aside>

    <!-- -------------- /Sidebar -------------- -->

    <!-- -------------- Main Wrapper -------------- -->
    <section id="content_wrapper" class="animated ">

        <!-- YIELD CONTENT -->
    @yield('content')


    <!-- /YIELD CONTENT -->

    </section>
    <!-- -------------- Page Footer -------------- -->
    <footer id="content-footer" class="affix">
        <div class="row">
            <div class="" style="text-align: center">
                    <span class="footer-legal">
                        H.R.M System  &nbsp;  &copy; <?php echo date("Y");?> All rights reserved. By
                        <a href="https://www.linkedin.com/in/marvin-espira-192348153/" target="_blank">MARVIN</a></span>
            </div>
            <div class="col-md-3 text-right">
                <span class="footer-meta"></span>
                <a href="#content" class="footer-return-top">
                    <span class="fa fa-angle-up"></span>
                </a>
            </div>
        </div>
    </footer>

    <!-- -------------- /Page Footer -------------- -->

</div>
<!-- -------------- /Body Wrap  -------------- -->


<!-- -------------- Scripts -------------- -->

<!-- -------------- jQuery -------------- -->
<script src="/js/jquery.printPage.js"></script>

<script src="/assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>


<!-- -------------- Magnific Popup Plugin -------------- -->
<script src="/assets/js/plugins/magnific/jquery.magnific-popup.js"></script>

<!-- -------------- Theme Scripts -------------- -->
<script src="/assets/js/utility/utility.js"></script>
<script src="/assets/js/demo/demo.js"></script>
<script src="/assets/js/main.js"></script>

<!-- -------------- Widget JS -------------- -->
<script src="/assets/js/demo/widgets.js"></script>
<script src="/assets/js/demo/widgets_sidebar.js"></script>
<script src="/assets/js/pages/dashboard1.js"></script>

<!-- Sweet alert -->
<script src="/assets/js/sweetalert.min.js"></script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-168809633-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-168809633-1');
</script>


<script src="/assets/js/pages/allcp_forms-elements.js"></script>

@stack('scripts')
{{--<script src="/assets/js/jquery/jquery-1.11.3.min.js"></script>--}}
{{--<script src="/assets/js/custom_form_wizard.js"></script>--}}
</body>
<script src="http://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script src="/assets/dataTables.min.js"></script>
<script src="/assets/dataTables.bootstrap4.min.js"></script>

<script>
    // Basic example
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
{{--<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>--}}
<script>
    CKEDITOR.replace( 'editor1' );
</script>

{{--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">--}}
{{--        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>--}}
{{--<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>--}}
{{--<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>--}}
</html>
