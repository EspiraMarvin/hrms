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
                    <li class="breadcrumb-current-item"> Edit details of {{$assetAssign->asset->asset}}
                        |{{$assetAssign->region->region}}|{{$assetAssign->county->county}}. Issued
                        To {{$assetAssign->employee->name}}</li>
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
                                <div class="panel-body pn">
                                    <div class="table-responsive">
                                        <div class="panel-body p25 pb10">

                                            @include('inc.messages')

                                            {!! Form::open(['action' => ['AssetAssignController@update',$assetAssign->id],'method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}

                                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Select Asset </label>
                                                <div class="col-md-6">
                                                    <select class="selectpicker form-control" disabled
                                                            name="name">
                                                        <option
                                                            value="{{$assetAssign->asset_id}}">{{$assetAssign->asset->asset}}</option>
                                                        @if(!empty($asset) && count($asset) > 0)
                                                            @foreach ($asset as $ass)
                                                                <option
                                                                    value="{{ $ass->asset_id }}">{{ $ass->asset_id}} </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('region_id') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Select Region </label>
                                                <div class="col-md-6">
                                                    <select class="selectpicker form-control" disabled
                                                            name="region_id">
                                                        <option
                                                            value="{{$assetAssign->region_id}}">{{$assetAssign->region->region}}</option>
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
                                                    <select class="selectpicker form-control" disabled name="county_id">
                                                        <option
                                                            value="{{$assetAssign->county_id}}">{{$assetAssign->county->county}}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('employee_id') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Issued To </label>
                                                <div class="col-md-6">
                                                    <select class="selectpicker form-control"
                                                            name="employee_id">
                                                        <option
                                                            value="{{$assetAssign->employee_id}}">{{$assetAssign->employee->name}}</option>
                                                        @if(!empty($employees) && count($employees) > 0)
                                                            @foreach ($employees as $employee)
                                                                <option
                                                                    value="{{ $employee->id }}">{{ $employee->name}}
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
                                                    <input type="text" name="authority"
                                                           value="{{$assetAssign->authority}}"
                                                           class="typeahead form-control" placeholder="Search"
                                                           style="height:40px" autocomplete="off">
                                                    <small class="text-danger">{{ $errors->first('authority') }}</small>

                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('assigned_date') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Date of Assignment </label>
                                                <div class="col-md-6">
                                                    {{Form::date('assigned_date', $assetAssign->assigned_date,['class' => 'select2-single form-control','placeholder'=>' Date of Assignment','required'])}}
                                                    <small class="text-danger">{{ $errors->first('assigned_date') }}</small>
                                                </div>
                                            </div>
                                            <div class="form-group {{ $errors->has('release_date') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Date of Release </label>
                                                <div class="col-md-6">
                                                    {{Form::date('released_date', $assetAssign->released_date,['class' => 'select2-single form-control','placeholder'=>' Date of Release','required'])}}
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
                                        {{Form::hidden('_method','PUT')}}
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
                        url: 'assetassign/{id}/edit/getcounties/' + regionID,
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

