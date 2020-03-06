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
                        <li class="breadcrumb-current-item"> Assign Assets </li>
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
                                <div class="panel-body pn">
                                    <div class="table-responsive">
                                        <div class="panel-body p25 pb10">
                                            @include('inc.messages')

                                            {!! Form::open(['action' => 'AssetAssignController@store','method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Region </label>
                                                <div class="col-md-6">
                                                    <select class="select2-multiple form-control select-primary"
                                                            name="region" required>
                                                        <option value="">Select One</option>
{{--                                                        @if(\Route::getFacadeRoot()->current()->uri() == 'asset_assign')--}}
{{--                                                            --}}{{----}}{{----}}
{{--                                                            @if($asset->region == 'North Rift')--}}
{{--                                                                <option value="North Rift" selected>North Rift</option>--}}
{{--                                                                <option value="South Rift">South Rift/option>--}}
{{--                                                                <option value="Nairobi">Nairobi</option>--}}
{{--                                                            @elseif($emps->employee->department == 'Social Media')--}}
{{--                                                                <option value="Marketplace">Marketplace</option>--}}
{{--                                                                <option value="Social Media" selected>Social Media</option>--}}
{{--                                                                <option value="IT">IT</option>--}}
{{--                                                            @else--}}
{{--                                                                <option value="Marketplace">Marketplace</option>--}}
{{--                                                                <option value="Social Media">Social Media</option>--}}
{{--                                                                <option value="IT" selected>IT</option>--}}
{{--                                                            @endif--}}
{{--                                                        @else--}}
                                                            <option value="North Rift">North Rift</option>
                                                            <option value="South Rift">South Rift</option>
                                                            <option value="Nairobi">Nairobi</option>
                                                            <option value="Coast">Coast</option>
                                                            <option value="Western">Western</option>
{{--                                                        @endif--}}
                                                    </select>
                                                </div>
                                            </div>

                         {{--                   <div class="form-group">
                                                <label class="col-md-3 control-label"> Select County/Region </label>
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

{{--                                            <div class="form-group">--}}
{{--                                                <label class="col-md-3 control-label"> Select Asset </label>--}}
{{--                                                <div class="col-md-6">--}}
{{--                                            <select class="select2-multiple form-control select-primary"--}}
{{--                                                    name="asset_id" required>--}}
{{--                                                @foreach($asset as $ass)--}}
{{--                                                    @if($ass->id == $assigns->user_id)--}}
{{--                                                        <option value="{{$ass->id}}" selected>{{$ass->name}}</option>--}}
{{--                                                    @else--}}
{{--                                                        <option value="{{$ass->id}}">{{$ass->name}}</option>--}}
{{--                                                    @endif--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Select Asset </label>
                                                <div class="col-md-6">
                                                    <select class="select2-multiple form-control select-primary"
                                                            name="name">
                                                        <option value="">Select One</option>
                                                        @if(!empty($asset) && count($asset) > 0)
                                                            @foreach($asset as $ass)
                                                                <option value="{{$ass->name}}">{{$ass->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Select Issuing Authority </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="typeahead form-control" placeholder="Search" style="height:40px" value="" autocomplete="off">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-3 control-label">  Date of Assignment </label>
                                                <div class="col-md-6">
                                                    {{Form::date('assigned_date', '',['class' => 'select2-single form-control','placeholder'=>' Date of Assignment','required'])}}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">  Date of Release </label>
                                                <div class="col-md-6">
                                                    {{Form::date('released_date', '',['class' => 'select2-single form-control','placeholder'=>' Date of Release','required'])}}
                                                </div>
                                            </div>

                                           {{-- <div class="form-group">
                                                <label for="datepicker1" class="col-md-3 control-label"> Date of Assignment </label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar text-alert pr11"></i>
                                                        </div>
                                                        @if(\Route::getFacadeRoot()->current()->uri() == 'edit-project-assignment/{id}')
                                                            <input type="text" id="datepicker1" class="select2-single form-control" name="doa" value="@if($emps && $emps->date_of_assignment){{$emps->date_of_assignment}}@endif" required>
                                                        @else
                                                            <input type="text" id="datepicker1" class="select2-single form-control" name="doa" required>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>--}}


                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-2">
                                                    {{Form::submit('Submit', ['class'=>'btn btn-bordered btn-info btn-block'])}}
                                                </div>
                                                <div class="col-md-2">
                                                        <input type="reset" class="btn btn-bordered btn-success btn-block"  value="Reset" />
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
            source:  function (query, process) {
                return $.get(path, { query: query }, function (data) {
                    return process(data);
                });
            }
        });
    </script>

    <script src="assets/js/pages/forms-widgets.js" type="text/javascript"></script>
@endsection
@push('scripts')
    <script src="/assets/js/pages/forms-widgets.js"></script>
    <script src="/assets/js/custom.js"></script>
@endpush
