@extends('inc.base')

@section('content')

    <!-- -------------- Topbar -------------- -->
    <header id="topbar" class="alt">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="breadcrumb-icon">
                    <a href="/dashboard">
                        <span class="fa fa-home"></span>
                    </a>
                </li>
                <li class="breadcrumb-active">
                    <a href="/dashboard">Dashboard</a>
                </li>
                <li class="breadcrumb-link">
                    <a href="/home">Home</a>
                </li>
                <li class="breadcrumb-current-item">Dashboard</li>
            </ol>
        </div>

    </header>
    <!-- -------------- /Topbar -------------- -->

    <!-- -------------- Content -------------- -->
    <section id="content" class="table-layout animated fadeIn">

        <!-- -------------- Column Center -------------- -->
        <div class="chute chute-center">

            <!-- -------------- Quick Links -------------- -->
            <div class="row">
                @if(Auth::user()->isAdmin())
                <div class="col-sm-6 col-xl-3">
                    <div class="panel panel-tile">
                        <div class="panel-body">
                            <div class="row pv10">
                                <div class="col-xs-5 ph10">
                                    <img src="/assets/img/pages/clipart2.png" class="img-responsive mauto" alt=""/>
                                </div>
                                <div class="col-xs-7 pl5">
                                    <h3 class="text-muted"><a href="/employee_manager"> EMPLOYEE MANAGER</a></h3>
                                    {{--<h2 class="fs50 mt5 mbn">385</h2>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="panel panel-tile">
                        <div class="panel-body">
                            <div class="row pv10">
                                <div class="col-xs-5 ph10"><img src="/assets/img/pages/clipart0.png"
                                                                class="img-responsive mauto" alt=""/></div>
                                <div class="col-xs-7 pl5">
                                    <h3 class="text-muted"><a href="/total_leave_list"> LEAVE <br/> MANAGER </a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="panel panel-tile">
                        <div class="panel-body">
                            <div class="row pv10">
                                <div class="col-xs-5 ph10"><img src="/assets/img/pages/Laptop Sketch-64x64"
                                                                class="img-responsive mauto"
                                                                style="height: 100px; width: 100px;" alt=""/></div>
                                <div class="col-xs-7 pl5">
                                    <h3 class="text-muted"><a href="/asset_assign_list/%7Bid%7D"> ASSET <br/> MANAGER
                                        </a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="panel panel-tile">
                        <div class="panel-body">
                            <div class="row pv10">
                                <div class="col-xs-5 ph10"><img src="/assets/img/pages/dollar.jpg"
                                                                class="img-responsive mauto"
                                                                style="height: 100px; width: 100px;" alt=""/></div>
                                <div class="col-xs-7 pl5">
                                    <h3 class="text-muted"><a href="/expense_list"> EXPENSE <br/> MANAGER </a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-xl-3">
                    <div class="panel panel-tile">
                        <div class="panel-body">
                            <div class="row pv10">
                                <div class="col-xs-5 ph10"><img src="/assets/img/pages/clipart6.png"
                                                                class="img-responsive mauto" alt=""/></div>
                                <div class="col-xs-7 pl5">
                                    <h3 class="text-muted"><a href="/target_assign_list"> TARGET MANAGER </a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if(!Auth::user()->isAdmin())
                        <div class="col-sm-6 col-xl-3">
                            <div class="panel panel-tile">
                                <div class="panel-body">
                                    <div class="row pv10">
                                        <div class="col-xs-5 ph10"><img src="/assets/img/pages/clipart0.png"
                                                                        class="img-responsive mauto" alt=""/></div>
                                        <div class="col-xs-7 pl5">
                                            <h3 class="text-muted"><a href="/my_leave_list"> LEAVE <br/> MANAGER </a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="panel panel-tile">
                                <div class="panel-body">
                                    <div class="row pv10">
                                        <div class="col-xs-5 ph10"><img src="/assets/img/pages/clipart6.png"
                                                                        class="img-responsive mauto" alt=""/></div>
                                        <div class="col-xs-7 pl5">
                                            <h3 class="text-muted"><a href="/my_target_list"> TARGET MANAGER </a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-xl-3">
                            <div class="panel panel-tile">
                                <div class="panel-body">
                                    <div class="row pv10">
                                        <div class="col-xs-5 ph10"><img src="/assets/img/pages/Laptop Sketch-64x64"
                                                                        class="img-responsive mauto"
                                                                        style="height: 100px; width: 100px;" alt=""/></div>
                                        <div class="col-xs-7 pl5">
                                            <h3 class="text-muted"><a href="/my_assigned_assets"> ASSET <br/> MANAGER
                                                </a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                @endif


            </div>
        </div>
    </section>
@endsection
