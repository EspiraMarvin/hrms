@extends('inc.base')

@section('content')
    <!-- START CONTENT -->
    <div class="content">

        <header id="topbar" class="alt">

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
                    <a href=""> Awards </a>
                </li>
                <li class="breadcrumb-current-item"> Assign Awards</li>
            </ol>
        </header>
        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn">
            <!-- -------------- Column Center -------------- -->
            <div class="chute-aff" data-offset-top="200">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title hidden-xs"> Assign Award</span>
                                </div>

                                <div class="panel-body pn">
                                    <div class="table-responsive">
                                        <div class="panel-body p25 pb10">
                                            @include('inc.messages')

                                            {!! Form::open(['action' => 'AwardsController@storeAssignedAward','method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data']) !!}

                                            <div class="form-group {{ $errors->has('employee_id') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Search Employee </label>
                                                <div class="col-md-6">
                                                    {{--                                                    <input type="text" class="typeahead form-control" value="" name="employee" autocomplete="off">--}}
                                                    <select class="select2-multiple form-control select-primary"
                                                            name="employee_id" required>
                                                        <option value="" selected>Select One</option>
                                                        @foreach($employees as $emp)
                                                            <option value="{{$emp->id}}">{{$emp->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <small class="text-danger">{{ $errors->first('employee_id') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('award_id') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Select Award </label>
                                                <div class="col-md-6">
                                                    <select class="selectpicker form-control" name="award_id" required>
                                                        <option value="" selected>Select One</option>
                                                        @foreach($awards as $award)
                                                            <option value="{{$award->id}}">{{$award->award}}</option>
                                                        @endforeach
                                                    </select>
                                                    <small class="text-danger">{{ $errors->first('award_id') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
                                                <label for="datepicker1" class="col-md-3 control-label"> Date </label>
                                                <div class="col-md-6">
                                                    {{Form::date('date', '',['class' => 'select2-single form-control','placeholder'=>'Date','required'])}}
                                                    <small class="text-danger">{{ $errors->first('date') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('reason') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Reason </label>
                                                <div class="col-md-6">
                                                    {{Form::text('reason', '',['class' => 'select2-single form-control','placeholder'=>'Reason','required'])}}
                                                    <small class="text-danger">{{ $errors->first('reason') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-2">
                                                    <input class="btn btn-bordered btn-info btn-block" type="submit" name="SUBMIT" value="Submit" onclick="this.value='Submitting ..';this.disabled='disabled'; this.form.submit();" />
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

