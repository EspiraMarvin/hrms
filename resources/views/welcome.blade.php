<!DOCTYPE html>
<html>

<head>
    <!-- -------------- Meta and Title -------------- -->
    <meta charset="utf-8">
    <title>ICTA - Human Resource Management System</title>
    <meta name="keywords" content=""/>
{{--    <meta name="csrf-tokem" content="{{ csrf_token() }}">--}}
    <meta name="description" content="HUMAN RESOURCE MANAGEMENT SYSTEM -ICT-AUTHORITY">
    <meta name="author" content="ThemeREX">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- -------------- Fonts -------------- -->
    <link rel='stylesheet' type='text/css' href='assets/font.css'>


    <!-- -------------- CSS - theme -------------- -->
    <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">

    <!-- -------------- CSS - allcp forms -------------- -->
    <link rel="stylesheet" type="text/css" href="assets/allcp/forms/css/forms.css">

    <!-- -------------- Favicon -------------- -->
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/img/favicon-96x96.png">

    <!-- -------------- IE8 HTML5 support  -------------- -->
    <!--[if lt IE 9]>
    <![endif]-->
</head>

<body class="utility-page sb-l-c sb-r-c">

<!-- -------------- Body Wrap  -------------- -->
<div id="main" class="animated fadeIn">


    <!-- -------------- Main Wrapper -------------- -->
    <section  id="content_wrapper">

        <div id="canvas-wrapper">
            <canvas id="demo-canvas"></canvas>
        </div>
        <!-- -------------- Content -------------- -->
        <section id="content">

            <div class="container">

            <!-- -------------- Login Form -------------- -->
            <div class="allcp-form theme-primary mw320 animated zoomIn" id="login" style="margin-top: 24px">

                <div class="text-center mb20">
                    <div class="bg-primary text-center mb20 br3 pv15">
                        <p style="text-align: center;color: black;font-size: 28px">
                            <img src="/assets/img/favicon-96x96.png" height="25" width="25"> &nbsp; &nbsp;
                            <b>ICT AUTHORITY</b>
                        </p>
                    </div>
                    <p style="text-align: center;color: black;font-size: 15px"><b>HUMAN RESOURCE MANAGEMENT SYSTEM</b>
                    </p>

                </div>

                <div class="panel mw320">

                    <div class="card-body animated zoomIn">
                        <form method="POST" action="{{ route('login') }}">
{{--                        {!! Form::open(['action' => 'AuthController@doLogin','method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}--}}
                            @csrf
                            <div class="panel-body pn mv10">
                                <div class="col-6">
{{--                                    @include('inc.messages')--}}
                                </div>
                                <div class="section">
                                    <label for="email" class="field prepend-icon">
                                        <input type="text" name="email" id="email"
                                               class="gui-input @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" autocomplete="off" autofocus
                                               placeholder="Email Address ">
                                        <small class="text-danger">{{ $errors->first('email') }}</small>

                                        <label for="email" class="field-icon">
                                            <i class="fa fa-user"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>

                            <div class="panel-body pn mv10">
                                <div class="section">
                                    <label for="password" class="field prepend-icon">
                                        <input type="password" name="password" id="password"
                                               class="gui-input @error('password') is-invalid @enderror" name="password"
                                               autocomplete="off" autofocus placeholder="Password">
                                        <small class="text-danger">{{ $errors->first('password') }}</small>

                                        <label for="password" class="field-icon">
                                            <i class="fa fa-lock"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8 offset-md-4">
                                    <div class="form-check">
                                        <input style="color: green !important" class="form-check-input" type="checkbox"
                                               name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>&nbsp;&nbsp; {{ __('Remember Me') }}

                                    </div>
                                </div>
                                <div style="float: right; margin-right: 20px">
{{--                                    <input class="btn btn-bordered btn-primary btn-block" type="submit" name="SUBMIT" value="Submit" onclick="this.value='Submitting ..';this.disabled='disabled'; this.form.submit();" />--}}
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </div>

                          {{--  <div class="form-group row mb-0">

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
--}}
                        </form>
{{--                        {!! Form::close() !!}--}}
                    </div>
                </div>

                <!-- -------------- /Panel -------------- -->
            </div>

            </div>
            <!-- -------------- /Spec Form -------------- -->
        </section>
        <!-- -------------- /Content -------------- -->

    </section>
    <!-- -------------- /Main Wrapper -------------- -->

</div>
<!-- -------------- /Body Wrap  -------------- -->

<!-- -------------- Scripts -------------- -->

<!-- -------------- jQuery -------------- -->
<script src="assets/js/jquery/jquery-1.11.3.min.js"></script>
<script src="assets/js/jquery/jquery_ui/jquery-ui.min.js"></script>

<!-- -------------- CanvasBG JS -------------- -->
<script src="assets/js/plugins/canvasbg/canvasbg.js"></script>

<!-- -------------- Theme Scripts -------------- -->
<script src="assets/js/utility/utility.js"></script>
<script src="assets/js/demo/demo.js"></script>
<script src="assets/js/main.js"></script>

<!-- -------------- Page JS -------------- -->

<script type="text/javascript">
    jQuery(document).ready(function () {

        "use strict";

        // Init Theme Core
        Core.init();

        // Init Demo JS
        Demo.init();

        // Init CanvasBG
        CanvasBG.init({
            Loc: {
                x: window.innerWidth / 3,
                y: window.innerHeight / 10
            }
        });

    });

</script>

<!-- -------------- /Scripts -------------- -->

</body>

</html>
