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
                        <a href=""> Expense </a>
                    </li>
                    <li class="breadcrumb-current-item"> Edit details
                        of {{$expense->county->county}} {{$expense->item}} {{$expense->expense}}</li>
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

                                            {!! Form::open(['action' => ['ExpensesController@update',$expense->id],'method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}

                                            <div class="form-group {{ $errors->has('region_id') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Select Region </label>
                                                <div class="col-md-6">
                                                    <select class="selectpicker form-control" disabled
                                                            name="region">
                                                        <option
                                                            value="{{$expense->region_id}}">{{$expense->region->region}}</option>
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
                                                            disabled name="county">
                                                        <option
                                                            value="{{$expense->county_id}}">{{$expense->county->county}}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('item') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Item(s) </label>
                                                <div class="col-md-6">
                                                    {{Form::text('item', $expense->item,['class' => 'select2-single form-control','placeholder'=>' Item(s)','required'])}}
                                                    <small class="text-danger">{{ $errors->first('item') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('expense') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Expense(Amount) in KES</label>
                                                <div class="col-md-6">
                                                    {{Form::number('expense', $expense->expense,['class' => 'select2-single form-control','placeholder'=>' Expense','required'])}}
                                                    <small class="text-danger">{{ $errors->first('expense') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('assigned_date') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Date of Assignment </label>
                                                <div class="col-md-6">
                                                    {{Form::date('assigned_date', $expense->assigned_date,['class' => 'select2-single form-control','placeholder'=>' Date of Assignment','required'])}}
                                                    <small class="text-danger">{{ $errors->first('assigned_date') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-2">
                                                    <input class="btn btn-bordered btn-info btn-block" type="submit" name="SUBMIT" value="Submit" onclick="this.value='Submitting ..';this.disabled='disabled'; this.form.submit();" />
                                                    {{--                                                    {{Form::submit('Submit', ['class'=>'btn btn-bordered btn-info btn-block'])}}--}}
                                                </div>
                                                <div class="col-md-2"><a href="/assign-project">
                                                        <input type="button"
                                                               class="btn btn-bordered btn-success btn-block"
                                                               value="Reset"></a></div>
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
        jQuery(document).ready(function () {
            jQuery('select[name="region"]').on('change', function () {
                var regionID = jQuery(this).val();
                if (regionID) {
                    jQuery.ajax({
                        url: 'asset_assign/getcounties/' + regionID,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            jQuery('select[name="county"]').empty();
                            jQuery.each(data, function (key, value) {
                                $('select[name="county"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="county"]').empty();
                }
            });
        });
    </script>

@endsection

