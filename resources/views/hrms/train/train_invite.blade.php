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
                        <a href=""> Training </a>
                    </li>
                    <li class="breadcrumb-current-item"> Training Invite</li>
                </ol>
            </div>
        </header>
        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn">
            <!-- -------------- Column Center -------------- -->
            <div class="chute-affix" data-offset-top="200">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title hidden-xs"> Training Invite </span>
                                </div>

                                <div class="panel-body pn">
                                    <div class="table-responsive">
                                        <div class="panel-body p25 pb10">
                                            @include('inc.messages')

                                            {!! Form::open(['action' => 'TrainingsController@storeTrainInvite','method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data']) !!}

                                            <div class="form-group">
                                                <label for="multiselect2" class="col-md-3 control-label"> Select
                                                    Employees </label>
                                                <div class="col-md-6">
                                                    <select id="done" class="selectpicker form-control" multiple
                                                            data-done-button="true"
                                                            name="members_id[]" required>
                                                        @foreach($employees as $emp)
                                                            <option value="{{$emp->id}}">{{$emp->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Select Programs </label>
                                                <div class="col-md-6">
                                                    <select class="selectpicker form-control"
                                                            name="training_id" required>
                                                        <option value="" selected>Select One</option>
                                                        @foreach($programs as $program)
                                                            <option
                                                                value="{{$program->id}}">{{$program->training}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Description </label>
                                                <div class="col-md-6">
                                                    {{Form::text('description', '',['class' => 'select2-single form-control','placeholder'=>'Description','required'])}}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="datepicker1" class="col-md-3 control-label"> Date
                                                    From </label>
                                                <div class="col-md-6">
                                                    {{Form::date('datefrom', '',['class' => 'select2-single form-control','placeholder'=>'DateFrom','required'])}}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="datepicker4" class="col-md-3 control-label"> Date
                                                    To </label>
                                                <div class="col-md-6">
                                                    {{Form::date('dateto', '',['class' => 'select2-single form-control','placeholder'=>'DateTo','required'])}}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-2">
                                                    {{Form::submit('Submit', ['class'=>'btn btn-bordered btn-info btn-block'])}}

                                                </div>
                                                <div class="col-md-2">
                                                    <input type="reset" class="btn btn-bordered btn-success btn-block"
                                                           value="Reset"/>
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
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

