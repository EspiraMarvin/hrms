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
                        <a href=""> Leave </a>
                    </li>
                    <li class="breadcrumb-current-item"> Apply Leave</li>
                </ol>
            </div>
        </header>
        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn">
            <!-- -------------- Column Center -------------- -->
            <div class="chute-affix" data-offset-top="200">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-success">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title hidden-xs"> Apply for Leave</span>
                                </div>

                                <div class="text-center" id="show-leave-count"></div>
                                <div class="panel-body pn">
                                    <div class="table-responsive">
                                        <div class="panel-body p25 pb10">
                                            @include('inc.messages')

                                            {!! Form::open(['action' => 'LeavesController@apply','method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}
                                            @csrf
{{--name="getSupervisor_id"--}}
                                            {{Form::hidden('id', isset($getSupervisor_id) ? $getSupervisor_id:'' ,['value' =>'','name' => 'supervisor_id','id'=>'supervisor_id'])}}
                                            {{Form::hidden('id', isset($getSupervisor_id) ? $getSupervisor_id:'' ,['value' =>'','name' => 'supervisor_id','id'=>'supervisor_id'])}}

                                            <div class="form-group {{ $errors->has('leave_type_id') ? ' has-error' : '' }}">
                                                <label class="col-md-2 control-label"> Leave Type </label>
                                                <div class="col-md-10">
                                                    <select class="selectpicker form-control"
                                                            name="leave_type_id">
                                                        <option value="" selected>Select One</option>
                                                        @if(!empty($leave) && count($leave) > 0)
                                                            @foreach($leave as $lev)
                                                                <option
                                                                    value="{{$lev->id}}">{{$lev->leave_type}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <small class="text-danger">{{ $errors->first('leave_type_id') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('date_from') ? ' has-error' : '' }}">
                                                <label for="date_from" class="col-md-2 control-label"> Date
                                                    From </label>
                                                <div class="col-md-3">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar text-alert pr10"></i>
                                                        </div>
                                                        <input type="date" id="datepicker1"
                                                               class="select2-single form-control"
                                                               name="date_from"><br>
                                                        <small class="text-danger">{{ $errors->first('date_from') }}</small>

                                                    </div>
                                                </div>
                                                <label for="date_to" class="col-md-2 control-label"> Date To </label>
                                                <div class="col-md-3">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar text-alert pr10"></i>
                                                        </div>
                                                        <input type="date" id="datepicker4"
                                                               class="select2-single form-control"
                                                               name="date_to">
                                                        <small class="text-danger">{{ $errors->first('date_to') }}</small>

                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="time_from" class=" col-md-2 control-label"> Time
                                                    From </label>
                                                <div class="col-md-3">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="imoon imoon-clock text-alert pr10"></i>
                                                        </div>
                                                        <input type="text" id="" class="select2-single form-control"
                                                               value="08:00"
                                                               name="time_from">
                                                    </div>
                                                </div>
                                                <label for="time_to" class="col-md-2 control-label"> Time To </label>
                                                <div class="col-md-3">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="imoon imoon-clock text-alert pr10"></i>
                                                        </div>
                                                        <input type="text" id="" class="select2-single form-control"
                                                               value="17:00"
                                                               name="time_to">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="input002" class="col-md-2 control-label"> Days </label>
                                                <div class="col-md-10">
                                                    <input id="total_days" name="number_of_days"
                                                           readonly="readonly"
                                                           type="text" size="90" class="select2-single form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->has('reason') ? ' has-error' : '' }}">
                                                <label for="input002" class="col-md-2 control-label"> Reason </label>
                                                <div class="col-md-10">
                                                    <input type="text" id="textarea1"
                                                           class="select2-single form-control"
                                                           name="reason" required>
                                                    <small class="text-danger">{{ $errors->first('reason') }}</small>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label"></label>

                                                <div class="col-md-2">
                                                    <input class="btn btn-bordered btn-info btn-block" type="submit" name="SUBMIT" value="Submit" onclick="this.value='Submitting ..';this.disabled='disabled'; this.form.submit();" />
                                                </div>
                                                <div class="col-md-2" onclick="disable()">
                                                    <input type="reset" id="button" class="btn btn-bordered btn-success btn-block"
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
    </div>


    @push('scripts')
        <script src="/assets/js/function.js"></script>
    @endpush

@endsection

