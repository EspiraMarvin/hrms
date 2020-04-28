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
                    <li class="breadcrumb-current-item"> Edit Training Invite of {{$trainingInvite->employee->name}}
                        to {{$trainingInvite->training->training ?? ''}}
                    </li>
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

                                            {!! Form::open(['action' => ['TrainingsController@updateInvite',$trainingInvite->id],'method' => 'POST','enctype'=>'multipart/form-data','class' => 'form-horizontal','id'=>"custom-form-wizard"]) !!}

                                            <div class="form-group">
                                                <label for="multiselect2" class="col-md-3 control-label">
                                                    Employee </label>
                                                <div class="col-md-6">
                                                    <select id="done" class="selectpicker form-control" disabled
                                                            name="employee_id" required>
                                                        <option
                                                            value="{{$trainingInvite->employee_id}}">{{$trainingInvite->employee->name}}</option>
                                                        @if(!empty($employees) && count($employees) > 0 )
                                                            @foreach($employees as $emp)
                                                                <option value="{{$emp->id}}">{{$emp->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Select Programs </label>
                                                <div class="col-md-6">
                                                    <select class="selectpicker form-control"
                                                            name="training_id" required>
                                                        <option
                                                            value="{{$trainingInvite->id ?? ''}}">{{$trainingInvite->training->training ?? ''}}</option>
                                                        @if(!empty($programs) && count($programs) > 0 )
                                                            @foreach($programs as $program)
                                                                <option
                                                                    value="{{$program->id}}">{{$program->training}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Description </label>
                                                <div class="col-md-6">
                                                    {{Form::text('description', $trainingInvite->description,['class' => 'select2-single form-control','placeholder'=>'Description','required'])}}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="datepicker1" class="col-md-3 control-label"> Date
                                                    From </label>
                                                <div class="col-md-6">
                                                    {{Form::date('datefrom', $trainingInvite->datefrom,['class' => 'select2-single form-control','placeholder'=>'DateFrom','required'])}}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="datepicker4" class="col-md-3 control-label"> Date
                                                    To </label>
                                                <div class="col-md-6">
                                                    {{Form::date('dateto', $trainingInvite->dateto,['class' => 'select2-single form-control','placeholder'=>'DateTo','required'])}}
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
                                            {{Form::hidden('_method','PUT')}}
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


