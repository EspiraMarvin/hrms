@extends('inc.base')

@section('content')
    <!-- START CONTENT -->
    <div class="content">

        <header id="topbar" class="alt">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="breadcrumb-icon">
                        <a href="/dashboard">
                            <span class="fa fa-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-active">
                        <a href="/dashboard"> Dashboard </a>
                    </li>
                    <li class="breadcrumb-link">
                        <a href=""> Leaves </a>
                    </li>
                    <li class="breadcrumb-current-item"> My Leave List</li>
                </ol>
            </div>
        </header>


        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn">

            <!-- -------------- Column Center -------------- -->
            <div class="chute chute-center">

                <!-- -------------- Products Status Table -------------- -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title hidden-xs"> Approved Leave Lists </span>
                                </div>
                                <div class="panel-body pn">
                                    @include('inc.messages')
                                    {!! Form::open(['class' => 'form-horizontal']) !!}
                                    <div class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Employee</th>
                                                <th class="text-center">Leave Type</th>
                                                <th class="text-center">Date From</th>
                                                <th class="text-center">Date To</th>
                                                <th class="text-center">Days</th>
                                                <th class="text-center">Reason</th>
                                                <th class="text-center">Remarks</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0;?>
                                            @foreach($status as $app)
                                                <tr>
                                                    <td class="text-center">{{$i+=1}}</td>
                                                    <td class="text-center">{{$app->employee->name}}</td>
                                                    <td class="text-center">{{$app->leaves->leave_type}}</td>
                                                    <td class="text-center">{{date_format(new DateTime($app->date_from), 'd-m-Y')}}</td>
                                                    <td class="text-center">{{date_format(new DateTime($app->date_to), 'd-m-Y')}}</td>
                                                    <td class="text-center">{{$app->number_of_days}}</td>
                                                    <td class="text-center">{{$app->reason}}</td>
                                                    <td class="text-center">{{$app->remarks}}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    {!! Form::close() !!}
                                    <div style="text-align: center">
                                        {!! $status->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
