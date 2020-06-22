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
                        <a href=""> Assets </a>
                    </li>
                    <li class="breadcrumb-current-item"> Assign Assets</li>
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
                                    <span class="panel-title hidden-xs"> Assign Assets </span>
                                </div>
                                <div class="panel-body pn">
                                    <div class="table-responsive">
                                        <div class="panel-body p25 pb10">

                                            @include('inc.messages')
                                            {!! Form::open(['action' => 'AssetAssignController@store','method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}

                                            <div class="form-group {{ $errors->has('asset_id') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Select Asset </label>
                                                <div class="col-md-6">
                                                    <select class="selectpicker form-control"
                                                            name="asset_id">
                                                        <option value="">Select Asset</option>
                                                        @if(!empty($asset) && count($asset) > 0)
                                                            @foreach ($asset as $ass)
                                                                <option value="{{ $ass->id }}">{{ $ass->asset }}
                                                                    S.No-{{$ass->serial_number}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <small class="text-danger">{{ $errors->first('asset_id') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('region_id') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Select Region </label>
                                                <div class="col-md-6">
                                                    <select class="selectpicker form-control"
                                                            name="region_id">
                                                        <option value="">--- Select Region ---</option>
                                                        @if(!empty($regions) && count($regions) > 0)
                                                            @foreach ($regions as $key => $value)
                                                                <option value="{{ $key }}">{{ $value }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('county_id') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Select County </label>
                                                <div class="col-md-6">
                                                    <select class="select2-multiple form-control select-primary"
                                                            name="county_id">
                                                        <option>--Select County--</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('employee_id') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Issued To </label>
                                                <div class="col-md-6">
                                                    <select class="selectpicker form-control"
                                                            name="employee_id">
                                                        <option value="">Select Employee</option>
                                                        @if(!empty($employees) && count($employees) > 0)
                                                            @foreach ($employees as $employee)
                                                                <option
                                                                    value="{{ $employee->id }}">{{ $employee->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('authority') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Issued By (Issuing
                                                    Authority) </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="typeahead form-control" name="authority"
                                                           placeholder="Search" style="height:40px"
                                                           value="{{$employee_id ?? ''}}" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('assigned_date') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Date of Assignment </label>
                                                <div class="col-md-6">
                                                    {{Form::date('assigned_date', '',['class' => 'select2-single form-control','placeholder'=>' Date of Assignment','required'])}}
                                                    <small class="text-danger">{{ $errors->first('assigned_date') }}</small>
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->has('released_date') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Date of Release </label>
                                                <div class="col-md-6">
                                                    {{Form::date('released_date', '',['class' => 'select2-single form-control','placeholder'=>' Date of Release','required'])}}
                                                    <small class="text-danger">{{ $errors->first('released_date') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-2">
                                                    <input class="btn btn-bordered btn-info btn-block" type="submit" name="SUBMIT" value="Submit" onclick="this.value='Submitting ..';this.disabled='disabled'; this.form.submit();" />
                                                    {{--                                                    {{Form::submit('Submit', ['class'=>'btn btn-bordered btn-info btn-block'])}}--}}
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="reset" class="btn btn-bordered btn-success btn-block"
                                                           value="Reset"/>
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
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('select[name="region_id"]').on('change', function () {
                var regionID = jQuery(this).val();
                if (regionID) {
                    jQuery.ajax({
                        url: 'asset_assign/getcounties/' + regionID,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            jQuery('select[name="county_id"]').empty();
                            jQuery.each(data, function (key, value) {
                                $('select[name="county_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="county_id"]').empty();
                }
            });
        });
    </script>
@endsection

