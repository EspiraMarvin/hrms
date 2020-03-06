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
                            <a href=""> Targets </a>
                        </li>
                        <li class="breadcrumb-current-item"> Assign Targets </li>
                    </ol>
            </div>
        </header>
        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn" >
            <!-- -------------- Column Center -------------- -->
            <div class="chute-affix" data-offset-top="200">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                            <div class="panel">
                                <div class="panel-heading">
                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-project-assignment/{id}')
                                        <span class="panel-title hidden-xs"> Edit Project Assignment </span>
                                    @else
                                        <span class="panel-title hidden-xs"> Assign Target (Annual)</span>
                                    @endif
                                </div>

                                <div class="panel-body pn">
                                    <div class="table-responsive">
                                        <div class="panel-body p25 pb10">
                                            @include('inc.messages')

                                            {!! Form::open(['action' => 'TargetsController@store','method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Select Employee </label>
                                                <div class="col-md-6">
                                                    <select class="select2-multiple form-control select-primary"
                                                            name="employee" required>
                                                        <option value="">Select One</option>
                                                        @if(!empty($employee) && count($employee) > 0)
                                                            @foreach($employee as $emp)
                                                                <option value="{{$emp->name}}">{{$emp->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                          {{--  <div class="form-group">
                                                <label class="col-md-3 control-label"> Select Employee </label>
                                                <div class="col-md-6">
                                                    <select class="select2-multiple form-control select-primary"
                                                            name="emp_id" required>
                                                        <option value="" selected>Select One</option>
                                                        --}}{{--                                                        @foreach($emps as $emp)--}}{{--
                                                        --}}{{--                                                            <option value="{{$emp->id}}">{{$emp->name}}</option>--}}{{--
                                                        --}}{{--                                                        @endforeach--}}{{--
                                                    </select>
                                                </div>
                                            </div>--}}


                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Targets </label>
                                                <div class="col-md-6">
                                                    {{Form::textarea('targets', '',['class' => 'select2-single form-control','rows'=>'7','id'=>'textarea1','placeholder'=>'Assign Targets','required'])}}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Select Issuing Authority </label>
                                                <div class="col-md-6">
                                                    <select class="select2-multiple form-control select-primary"
                                                            name="authority" required>
                                                        <option value="" selected>Select One</option>
                                                        @if(!empty($employee) && count($employee) > 0)
                                                            @foreach($employee as $emp)
                                                                <option value="{{$emp->name}}">{{$emp->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                        {{--    <div class="form-group">
                                                <label class="col-md-3 control-label"> Supervisor </label>
                                                <div class="col-md-6">
                                                    <select class="select2-multiple form-control select-primary"
                                                            name="authority_id" required>
                                                        <option value="" selected>Select One</option>
                                                        --}}{{--                                                        @foreach($emps as $emp)--}}{{--
                                                        --}}{{--                                                            <option value="{{$emp->id}}">{{$emp->name}}</option>--}}{{--
                                                        --}}{{--                                                        @endforeach--}}{{--
                                                    </select>
                                                </div>
                                            </div>--}}


                                            <div class="form-group">
                                                <label for="datepicker1" class="col-md-3 control-label"> Date of Assignment </label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar text-alert pr11"></i>
                                                        </div>
                                                        {{Form::date('assigned_date', '',['class' => 'select2-single form-control','placeholder'=>'Date of Assignment','required'])}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="datepicker1" class="col-md-3 control-label"> Expected Review Date </label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar text-alert pr11"></i>
                                                        </div>
                                                            {{Form::date('review_date', '',['class' => 'select2-single form-control','placeholder'=>'Expected Review Date','required'])}}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-2">

                                                    <input type="submit" class="btn btn-bordered btn-info btn-block" value="Submit">
                                                </div>
                                                <div class="col-md-2">
                                                        <input type="button" class="btn btn-bordered btn-success btn-block" value="Reset">
                                                </div>
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

        </section>
    </div>

    <script src="assets/js/pages/forms-widgets.js" type="text/javascript"></script>
@endsection
@push('scripts')
    <script src="/assets/js/pages/forms-widgets.js"></script>
    <script src="/assets/js/custom.js"></script>
@endpush
