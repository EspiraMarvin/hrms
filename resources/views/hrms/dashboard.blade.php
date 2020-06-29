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
                                    <span style="font-size: 60px" class="fa fa-group"></span>
                                </div>
                                <div class="col-xs-7 pl5">
                                    <h3 class="text-muted"><a style=" text-decoration: none" href="/employee_manager"> EMPLOYEE <br>MANAGER</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="panel panel-tile">
                        <div class="panel-body">
                            <div class="row pv10">
                                <div class="col-xs-5 ph10">
                                    <span style="font-size: 60px" class="fa fa-envelope"></span>
                                </div>
                                <div class="col-xs-7 pl5">
                                    <h3 class="text-muted"><a style=" text-decoration: none" href="/total_leave_list"> LEAVE <br/> MANAGER </a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="panel panel-tile">
                        <div class="panel-body">
                            <div class="row pv10">
                                <div class="col-xs-5 ph10">
                                    <span style="font-size: 60px" class="fa fa fa-laptop"></span>
                                </div>
                                <div class="col-xs-7 pl5">
                                    <h3 class="text-muted"><a style=" text-decoration: none" href="/asset_assign_list/%7Bid%7D"> ASSET <br/> MANAGER
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
                                <div class="col-xs-5 ph10">
                                    <span  style="font-size: 60px" class="fa fa-money"></span>
                                </div>
                                <div class="col-xs-7 pl5">
                                    <h3 class="text-muted"><a style=" text-decoration: none" href="/expense_list"> EXPENSE <br/> MANAGER </a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="panel panel-tile">
                        <div class="panel-body">
                            <div class="row pv10">
                                <div class="col-xs-5 ph10">
                                    <span style="font-size: 60px" class="fa fa-gavel"></span>
                                </div>
                                <div class="col-xs-7 pl5">
                                    <h3 class="text-muted"><a style=" text-decoration: none" href="/target_assign_list"> TARGET <br/> MANAGER </a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="panel panel-tile">
                            <div class="panel-body">
                                <div class="row pv10">
                                    <div class="col-xs-5 ph10">
                                        <span style="font-size: 60px" class="fa fa-graduation-cap"></span>
                                    </div>
                                    <div class="col-xs-7 pl5">
                                        <h3 class="text-muted"><a style=" text-decoration: none" href="/train_invite_list"> TRAINING <br/> MANAGER </a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-xl-3">
                        <div class="panel panel-tile">
                            <div class="panel-body">
                                <div class="row pv10">
                                    <div class="col-xs-5 ph10">
                                        <span style="font-size: 60px" class="fa fa fa-trophy"></span>
                                    </div>
                                    <div class="col-xs-7 pl5">
                                        <h3 class="text-muted"><a style=" text-decoration: none" href="/awardees_listing"> AWARD <br> MANAGER </a></h3>
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
                                        <div class="col-xs-5 ph10">
                                            <span style="font-size: 60px" class="fa fa-envelope"></span>
                                        </div>
                                        <div class="col-xs-7 pl5">
                                            <h3 class="text-muted"><a style=" text-decoration: none" href="/my_leave_list"> LEAVE <br/> MANAGER </a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="panel panel-tile">
                                <div class="panel-body">
                                    <div class="row pv10">
                                        <div class="col-xs-5 ph10">
                                            <span style="font-size: 60px" class="fa fa fa-laptop"></span>
                                        </div>
                                        <div class="col-xs-7 pl5">
                                            <h3 class="text-muted"><a style=" text-decoration: none" href="/my_assigned_assets"> ASSET <br/> MANAGER
                                                </a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-xl-3">
                            <div class="panel panel-tile">
                                <div class="panel-body">
                                    <div class="row pv10">
                                        <div class="col-xs-5 ph10">
                                            <span style="font-size: 60px" class="fa fa-gavel"></span>
                                        </div>
                                        <div class="col-xs-7 pl5">
                                            <h3 class="text-muted"><a style=" text-decoration: none" href="/my_target_list"> TARGET <br> MANAGER </a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 col-xl-3">
                            <div class="panel panel-tile">
                                <div class="panel-body">
                                    <div class="row pv10">
                                        <div class="col-xs-5 ph10">
                                            <span style="font-size: 60px" class="fa fa-graduation-cap"></span>
                                        </div>
                                        <div class="col-xs-7 pl5">
                                            <h3 class="text-muted"><a style=" text-decoration: none" href="/my_train_invite"> TRAINING <br/> MANAGER </a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="panel panel-tile">
                                <div class="panel-body">
                                    <div class="row pv10">
                                        <div class="col-xs-5 ph10">
                                            <span style="font-size: 60px" class="fa fa fa-trophy"></span>
                                        </div>
                                        <div class="col-xs-7 pl5">
                                            <h3 class="text-muted"><a style=" text-decoration: none" href="/my_awards"> AWARD <br/> MANAGER </a></h3>
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
