<!DOCTYPE html>
<html>

<head>
    <!-- -------------- Meta and Title -------------- -->
    <meta charset="utf-8">
    <title> Human Resource Management System </title>
    <meta name="description" content="HRMS">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="{{csrf_token()}}">

    <!-- -------------- Fonts -------------- -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic' rel='stylesheet'
          type='text/css'>


    <!-- -------------- Icomoon -------------- -->
    <link rel="stylesheet" type="text/css" href="/assets/fonts/icomoon/icomoon.css">

    <!-- -------------- FullCalendar -------------- -->
    <link rel="stylesheet" type="text/css" href="/assets/js/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/js/plugins/magnific/magnific-popup.css">

    <!-- -------------- Plugins -------------- -->
    <link rel="stylesheet" type="text/css" href="/assets/js/plugins/c3charts/c3.min.css">

    <!-- -------------- CSS - theme -------------- -->
    <link rel="stylesheet" type="text/css" href="/assets/skin/default_skin/css/theme.css">


    <!-- -------------- CSS - allcp forms -------------- -->
    <link rel="stylesheet" type="text/css" href="/assets/allcp/forms/css/forms.css">
    <link rel="stylesheet" type="text/css" href="/assets/allcp/forms/css/widget.css">

    <link rel="stylesheet" type="text/css" href="assets/js/plugins/select2/css/core.css">
    <!-- -------------- Favicon -------------- -->
    <link rel="shortcut icon" href="/assets/img/favicon.png">

    <!--  Custom css -->
    <link rel="stylesheet" type="text/css" href="/assets/custom.css">

    <!-- Sweet alert -->
    <link rel="stylesheet" type="text/css" href="/assets/sweetalert.css">

@stack('styles')

<!-- -------------- IE8 HTML5 support  -------------- -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        .blink {
            color:mediumblue;
        }

        .blink_second {
            color:red;
        }

        .blink_third {
            color:yellow;
        }
    </style>

</head>

<body class="dashboard-page">

<!-- -------------- Customizer -------------- -->
<!-- -------------- Body Wrap  -------------- -->
<div id="main">

    <!-- -------------- Header  -------------- -->
@include('inc.header')
<!-- -------------- /Header  -------------- -->

    <!-- -------------- Sidebar  -------------- -->
    <aside id="sidebar_left" class="nano nano-light affix">

        <!-- -------------- Sidebar Left Wrapper  -------------- -->
        <div class="sidebar-left-content nano-content">

            <!-- -------------- Sidebar Header -------------- -->
            <header class="sidebar-header">

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
    <section id="content_wrapper">

        <!-- -------------- Topbar Menu Wrapper -------------- -->
        <div id="topbar-dropmenu-wrapper">
            <div class="topbar-menu row">
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="service-box bg-danger">
                        <span class="fa fa-music"></span>
                        <span class="service-title">Audio</span>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="service-box bg-success">
                        <span class="fa fa-picture-o"></span>
                        <span class="service-title">Images</span>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="service-box bg-primary">
                        <span class="fa fa-video-camera"></span>
                        <span class="service-title">Videos</span>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="service-box bg-alert">
                        <span class="fa fa-envelope"></span>
                        <span class="service-title">Messages</span>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="service-box bg-system">
                        <span class="fa fa-cog"></span>
                        <span class="service-title">Settings</span>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-2">
                    <a href="#" class="service-box bg-dark">
                        <span class="fa fa-user"></span>
                        <span class="service-title">Users</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- -------------- /Topbar Menu Wrapper -------------- -->

        <!-- YIELD CONTENT -->

    @yield('content')

    <!-- /YIELD CONTENT -->



{{--    @if(\Route::getFacadeRoot()->current()->uri() == 'dashboard' || \Route::getFacadeRoot()->current()->uri() == 'welcome' || \Route::getFacadeRoot()->current()->uri() == 'change-password' ||--}}
{{--    \Route::getFacadeRoot()->current()->uri() == 'not-found' )--}}
        <!-- -------------- Page Footer -------------- -->
            <footer id="content-footer" class="affix">
                <div class="row">
                    <div class="col-md-6">
                    <span class="footer-legal">H.R.M Systems © 2019 All rights reserved. By <a
                            href="http://jamesshisiah.com" target="_blank">HACKINTECHNOLOGIES</a></span>
                    </div>
                    <div class="col-md-6 text-right">
                        <span class="footer-meta"></span>
                        <a href="#content" class="footer-return-top">
                            <span class="fa fa-angle-up"></span>
                        </a>
                    </div>
                </div>
            </footer>
            <!-- -------------- /Page Footer -------------- -->
{{--        @endif--}}

    </section>

</div>
<!-- -------------- /Body Wrap  -------------- -->





<!-- -------------- Scripts -------------- -->

<!-- -------------- jQuery -------------- -->
<script src="/assets/js/jquery/jquery-1.11.3.min.js"></script>
{{--<script src="/assets/js/jquery/jquery-2.2.4.min.js"></script>--}}
<script src="/assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>

<!-- -------------- HighCharts Plugin -------------- -->
<script src="/assets/js/plugins/highcharts/highcharts.js"></script>
<script src="/assets/js/plugins/c3charts/d3.min.js"></script>
<script src="/assets/js/plugins/c3charts/c3.min.js"></script>

<!-- -------------- Simple Circles Plugin -------------- -->
<script src="/assets/js/plugins/circles/circles.js"></script>

<!-- -------------- Maps JSs -------------- -->
<script src="/assets/js/plugins/jvectormap/jquery.jvectormap.min.js"></script>
<script src="/assets/js/plugins/jvectormap/assets/jquery-jvectormap-us-lcc-en.js"></script>

<!-- -------------- FullCalendar Plugin -------------- -->
<script src="/assets/js/plugins/fullcalendar/lib/moment.min.js"></script>
<script src="/assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>

<!-- -------------- Date/Month - Pickers -------------- -->
<script src="/assets/allcp/forms/js/jquery-ui-monthpicker.min.js"></script>
<script src="/assets/allcp/forms/js/jquery-ui-datepicker.min.js"></script>

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


{{--@if(\Route::getFacadeRoot()->current()->uri() == 'edit-promotion/{id}')--}}
{{--    <script src="/assets/js/pages/forms-widgets.js"></script>--}}
{{--    <script src="/assets/js/custom.js"></script>--}}
{{--@endif--}}

<script>
    $('#datetimepicker2').datetimepicker();


    (function($) {
        $.fn.blink = function(options) {
            var defaults = {
                delay: 3000
            };
            var options = $.extend(defaults, options);

            return this.each(function() {
                var obj = $(this);
                setInterval(function() {
                    if ($(obj).css("visibility") == "visible") {
                        $(obj).css('visibility', 'hidden');
                    }
                    else {
                        $(obj).css('visibility', 'visible');
                    }
                }, options.delay);
            });
        }
    }(jQuery))

    /////////////////////////////////////////////

    $(document).ready(function() {
        $('.blink').blink(); // default is 500ms blink interval.
        $('.blink_second').blink({
            delay: 100
        }); // causes a 100ms blink interval.
        $('.blink_third').blink({
            delay: 1500
        }); // causes a 1500ms blink interval.
    });

    /////////////////////////////////////////////

</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108812473-2"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-108812473-2');
</script>


<script src="/assets/js/pages/allcp_forms-elements.js"></script>

@stack('scripts')
</body>
</html>

