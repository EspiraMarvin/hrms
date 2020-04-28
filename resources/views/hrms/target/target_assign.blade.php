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
                    <li class="breadcrumb-current-item"> Assign Targets</li>
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
                                    <span class="panel-title hidden-xs"> Assign Target (Annual)</span>
                                </div>

                                <div class="panel-body pn">
                                    <div class="table-responsive">
                                        <div class="panel-body p25 pb10">
                                            @include('inc.messages')

                                            {!! Form::open(['action' => 'TargetsController@store','method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}

                                            <div class="form-group {{ $errors->has('employee_id') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Select Employee </label>
                                                <div class="col-md-6">
                                                    <select id="employee_id" size="2" class=" form-control"
                                                            name="employee_id" required>
                                                        <option value="">Select One Employee</option>
                                                        @if(!empty($employee) && count($employee) > 0)
                                                            @foreach($employee as $emp)
                                                                <option value="{{$emp->id}}">{{$emp->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <small class="text-danger">{{ $errors->first('employee') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('targets') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Targets </label>
                                                <div class="col-md-6">
                                                    {{Form::textarea('targets', '',['class' => 'select2-single form-control','rows'=>'7','id'=>'textarea1','placeholder'=>'Assign Targets eg.(1. Do this.., 2.Do that..)','required'])}}
                                                    <small class="text-danger">{{ $errors->first('targets') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('assigned_date') ? ' has-error' : '' }}">
                                                <label for="datepicker1" class="col-md-3 control-label"> Date of
                                                    Assignment </label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar text-alert pr11"></i>
                                                        </div>
                                                        {{Form::date('assigned_date', '',['class' => 'select2-single form-control','placeholder'=>'Date of Assignment','required'])}}
                                                        <small class="text-danger">{{ $errors->first('assigned_date') }}</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('review_date') ? ' has-error' : '' }}">
                                                <label for="datepicker1" class="col-md-3 control-label"> Expected Review
                                                    Date </label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar text-alert pr11"></i>
                                                        </div>
                                                        {{Form::date('review_date', '',['class' => 'select2-single form-control','placeholder'=>'Expected Review Date','required'])}}
                                                        <small class="text-danger">{{ $errors->first('review_date') }}</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-2">
                                                    <input class="btn btn-bordered btn-info btn-block" type="submit" name="SUBMIT" value="Submit" onclick="this.value='Submitting ..';this.disabled='disabled'; this.form.submit();" />
{{--                                                    <input type="submit" class="btn btn-bordered btn-info btn-block" value="Submit">--}}
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="button" class="btn btn-bordered btn-success btn-block"
                                                           value="Reset">
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

    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";
        $('input.typeahead').typeahead({
            source: function (query, process) {
                return $.get(path, {query: query}, function (data) {
                    return process(data);
                });
            }
        });
    </script>

@endsection
