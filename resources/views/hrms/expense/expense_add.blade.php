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
                    <li class="breadcrumb-current-item"> Assign Expense </li>
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

                                            {!! Form::open(['action' => 'ExpensesController@store','method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}

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
                                                        <option value="North rift">North Rift</option>
                                                        <option value="South rift">South Rift</option>
                                                        <option value="Nairobi">Nairobi</option>
                                                        <option value="Coast">Coast</option>
                                                        <option value="Western">Western</option>
                                                        {{--                                                        @endif--}}
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">  Items </label>
                                                <div class="col-md-6">
                                                    {{Form::text('item', '',['class' => 'select2-single form-control','placeholder'=>' Item(s)','required'])}}
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-3 control-label">  Expense(Amount) </label>
                                                <div class="col-md-6">
                                                    {{Form::number('expense', '',['class' => 'select2-single form-control','placeholder'=>' Expense','required'])}}
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-3 control-label">  Date of Assignment </label>
                                                <div class="col-md-6">
                                                    {{Form::date('assigned_date', '',['class' => 'select2-single form-control','placeholder'=>' Date of Assignment','required'])}}
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-2">
                                                    {{Form::submit('Submit', ['class'=>'btn btn-bordered btn-info btn-block'])}}
                                                </div>
                                                <div class="col-md-2"><a href="/assign-project" >
                                                        <input type="button" class="btn btn-bordered btn-success btn-block" value="Reset"></a></div>
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
