@extends('inc.base')
@section('content')
    <div class="content">
        <section id="content" class="pn animated fadeIn">

            <div class="center-block mt10 mw800 text-center p20">
            
                <h3 class="animated zoomIn"> Welcome &nbsp;{{Auth::user()->name}}<br></h3>

                    <h6 class="form-group" style="margin-top: 40px;font-size: 20px; background-color: black; color: white">
                        <!--script to display current time-->
                        <script>
                            function display_c(){
                                var refresh=1000; // Refresh rate in milli seconds
                                mytime=setTimeout('display_ct()',refresh)
                            }

                            function display_ct() {
                                var strcount
                                var x = new Date()
                                // var x1=x.toUTCString();
                                document.getElementById('ct').innerHTML = x;
                                tt=display_c();
                            }

                        </script>
                    <body onload=display_ct();>
                    <span id='ct' ></span></body>

                    </h6>


                <div>
                    <div class="col-md-6 animated slideInLeft">
                        <h2 class="mt20">
                            <a style="text-decoration: none" href="/dashboard"><i class="fa fa-arrow-circle-o-left">
                                    Dashboard </i></a></h2>
                    </div>
                    <div class="col-md-6 animated slideInRight">
                        <h2 class="mt20">
                            <a style="text-decoration: none" href="/profile">
                                Profile <i class="fa fa-arrow-circle-o-right"> </i></a></h2>
                    </div>
                </div>
                    <img src="/assets/img/HRMS.png" alt="" class="img-responsive mauto"/>
            </div>
        </section>
    </div>
    <script type="text/javascript">window.onload = date_time('date_time');</script>
@endsection

