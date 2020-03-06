@extends('inc.base')


@section('content')


    <!-- -------------- Main Wrapper -------------- -->
    {{--        <section id="content_wrapper">--}}

    <!-- -------------- Topbar -------------- -->
    <header id="topbar" class="alt">

        @if(\Route::getFacadeRoot()->current()->uri() == 'employee_edit/{id}')

            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="breadcrumb-icon">
                        <a href="/dashboard">
                            <span class="fa fa-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-active">
                        <a href="#"> Edit Details</a>
                    </li>
                    <li class="breadcrumb-link">
                        <a href="/employee"> Employees </a>
                    </li>
                    <li class="breadcrumb-current-item"> Edit details of {{$emps->name}} </li>
                </ol>
            </div>

        @else

            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="breadcrumb-icon">
                        <a href="/dashboard">
                            <span class="fa fa-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-active">
                        <a href="/dashboard">Dashboard</a>
                    </li>
                    <li class="breadcrumb-link">
                        <a href="/employee_add"> Employees </a>
                    </li>
                    <li class="breadcrumb-current-item"> Add Details</li>
                </ol>
            </div>

        @endif
    </header>
    <!-- -------------- /Topbar -------------- -->

    <!-- -------------- Content -------------- -->

    <section id="content" class="animated fadeIn">

        <div class="mw1000 center-block">

        @include('inc.messages')

        <!-- -------------- Wizard -------------- -->
            <!-- -------------- Spec Form -------------- -->
            <div class="allcp-form">

                <div class="section">
                    <label for="input002"><h6 class="mb20 mt40"> Supervisor </h6></label>
                    <input type="text" class="typeahead form-control" placeholder="Search" style="height:40px" value="" autocomplete="off">
                </div>

                {!! Form::open(['action' => 'EmployeeController@store','method' => 'POST','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}

                <div class="wizard steps-bg steps-left">

                    <!-- -------------- step 1 -------------- -->
                    <h4 class="wizard-section-title">
                        <i class="fa fa-user pr5"></i> Personal Details</h4>
                    <section class="wizard-section">

                        <div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> Supervisor </h6></label>
                            <input type="text" class="typeahead form-control" placeholder="Search" style="height:40px" value="" autocomplete="off">
                        </div>

                        <div class="section">
                            <div class="section">
                                <label class="field-icon"><i class="fa fa-cloud-upload"></i></label>&nbsp;
                                {{Form::label('photo','Photo (.jpg only)',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                {{Form::file('photo',['class' => 'gui-input fs13','placeholder'=>'choose file'])}}
                            </div>
                        </div>

                        <!-- -------------- /section -------------- -->

                        <div class="section">
                            <div class="section">
                                <label class="field-icon"><i class="fa fa-barcode"></i></label>&nbsp;
                                {{Form::label('code','Employee Code',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                {{Form::text('code', '',['class' => 'gui-input fs13','placeholder'=>'Employee Code','required'])}}
                            </div>
                        </div>


                        <div class="section">
                            <label class="field-icon"><i class="fa fa-user"></i></label>&nbsp;
                            {{Form::label('Name','Employee Name',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            {{Form::text('name', '',['class' => 'gui-input fs13','placeholder'=>'Employee Name','required'])}}
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-envelope"></i></label>&nbsp;
                            {{Form::label('email','Email Address',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            {{Form::text('email', '',['class' => 'gui-input fs13','placeholder'=>'Email Address','required'])}}
                        </div>

                        <div class="section">
                            {{Form::label('status','Employment status',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                            {{Form::radio('status','Present', false, ['class'=>'radio','id'=>'status'])}} Present
                            {{Form::radio('status','Ex',false,['class'=>'radio','id'=>'status'])}} Ex
                        </div>

                        <div class="section">
                            {{Form::label('gender','Gender',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                            {{Form::radio('gender','Male', false, ['class'=>'radio','id'=>'gender'])}}Male
                            {{Form::radio('gender','Female',false,['class'=>'radio','id'=>'gender'])}} Female
                        </div>

                       {{-- <div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> Gender </h6></label>
                            <div class="option-group field">
                                <label class="field option mb5">
                                    <input type="radio" value="0" name="gender" id="gender"
                                           @if(isset($emps))@if($emps->employee->gender == '0')checked @endif @endif>
                                    <span class="radio"></span>Male</label>
                                <label class="field option mb5">
                                    <input type="radio" value="1" name="gender" id="gender"
                                           @if(isset($emps))@if($emps->employee->gender == '1')checked @endif @endif>
                                    <span class="radio"></span>Female</label>
                            </div>
                        </div>--}}


                        <div class="section">
                            <label class="field-icon"><i class="fa fa-calendar"></i></label>&nbsp;
                            {{Form::label('date_of_birth','Date of Birth',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                            {{Form::date('date_of_birth', '',['class' => 'gui-input fs13','placeholder'=>'Date of Joining','required'])}}
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-calendar"></i></label>&nbsp;
                                {{Form::label('date_of_joining','Date of Joining',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                                {{Form::date('date_of_joining', '',['class' => 'gui-input fs13','placeholder'=>'Date of Joining'])}}
                                {{--                                            {{Form::date('date of joining', \Carbon\Carbon::now(),['class'=>'gui-input fs13','id'=>'datepicker4','placeholder'=>'Date of Joining'])}}--}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-mobile-phone"></i></label>&nbsp;
                                {{Form::label('phone_number','Mobile Number',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                                {{Form::number('phone_number', '',['class' => 'gui-input fs13','placeholder'=>'Mobile Number','required'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-graduation-cap"></i></label>&nbsp;
                                {{Form::label('qualification','Qualification (Highest/Major)',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                                {{Form::text('qualification', '',['class' => 'gui-input fs13','placeholder'=>'qualification i.e  B.Sc, B.Tech, BCA, MBA, MCA, BBA, BBA+MBA, BCA+MCA, Engineering(B.Tech), Engineering(B.Tech+M.Tech) ','required'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-mobile-phone"></i></label>&nbsp;
                                {{Form::label('emergency_number','Emergency Number',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                                {{Form::number('emergency_number', '',['class' => 'gui-input fs13','placeholder'=>'Emergency Number','required'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class=""></i></label>&nbsp;
                                {{Form::label('kra_pin','kra_pin',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                                {{Form::text('kra_pin', '',['class' => 'gui-input fs13','placeholder'=>'KRA Pin Number','required'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class=""></i></label>&nbsp;
                                {{Form::label('father_name','Father`s Name',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                                {{Form::text('father_name', '',['class' => 'gui-input fs13','placeholder'=>'Father`s Name','required'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class=""></i></label>&nbsp;
                                {{Form::label('current_address','Current Address',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                                {{Form::text('current_address', '',['class' => 'gui-input fs13','placeholder'=>'Current Address','required'])}}
                            </div>
                        </div>


                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class=""></i></label>&nbsp;
                                {{Form::label('permanent_address','Permanent Address',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                                {{Form::text('permanent_address', '',['class' => 'gui-input fs13','placeholder'=>' Permanent Address','required'])}}
                            </div>
                        </div>

                        <!-- -------------- /section -------------- -->
                    </section>

                    <!-- -------------- step 2 -------------- -->
                    <h4 class="wizard-section-title">
                        <i class="fa fa-user-secret pr5"></i> Employment details</h4>
                    <section class="wizard-section">
                        <!-- -------------- /section -------------- -->

                        <div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> Role </h6></label>
                            <select class="select2-single form-control" name="role" id="role">
                                <option value="">Select Role</option>
                                @if(!empty($role) && count($role) > 0)
                                    @foreach($role as $rol)
                                        <option value="{{$rol->role}}">{{$rol->role}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> Department </h6></label>
                            <select class="select2-single form-control" name="department" id="department">
                                <option value="">Select Department</option>
                                @if(!empty($department) && count($department) > 0)
                                    @foreach($department as $dep)
                                        <option value="{{$dep->name}}">{{$dep->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                    {{--    <div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> Supervisor </h6></label>
                            <select class="select2-single form-control" name="supervisor" id="supervisor">
                                <option value="">Select Supervisor</option>
                                @if(!empty($employee) && count($employee) > 0)
                                    @foreach($employee as $emp)
                                        <option value="{{$emp->name}}">{{$emp->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>--}}
                        <div class="section">
                                <label for="input002"><h6 class="mb20 mt40"> Supervisor </h6></label>
                                <input type="text" class="typeahead form-control" placeholder="Search" style="height:40px" value="" autocomplete="off">
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class=""></i></label>&nbsp;
                            {{Form::label('duty_station','Duty Station',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            {{Form::text('duty_station', '',['class' => 'gui-input fs13','placeholder'=>'Duty Station','required'])}}
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-calendar"></i></label>&nbsp;
                            {{Form::label('posted_date','Posted Date',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                            {{Form::date('posted_date', '',['class' => 'gui-input fs13','placeholder'=>'Posted Date','required'])}}
                        </div>

                        <div class="section">
                            {{Form::label('employment_type','Employment Type',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                            {{Form::radio('employment_type','Permanent', false, ['class'=>'radio','id'=>''])}} Permanent
                            {{Form::radio('employment_type','Contract',false,['class'=>'radio','id'=>''])}} Contract
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-money"></i></label>&nbsp;
                            {{Form::label('salary','Salary on Confirmation',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                            {{Form::text('salary', '',['class' => 'gui-input fs13','placeholder'=>'KES. e.g 12000','required'])}}
                        </div>
                        <!-- -------------- /section -------------- -->


                    </section>

                    <!-- -------------- step 3 -------------- -->
                    <h4 class="wizard-section-title">
                        <i class="fa fa-file-text pr5"></i> Banking Details</h4>
                    <section class="wizard-section">


                        <!-- -------------- /section -------------- -->

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-list"></i></label>&nbsp;
                            {{Form::label('account_number','Bank Account Number',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                            {{Form::number('account_number', '',['class' => 'gui-input fs13','placeholder'=>'Bank Account Number'])}}
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-columns"></i></label>&nbsp;
                            {{Form::label('bank_name','Bank Name',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                            {{Form::text('bank_name', '',['class' => 'gui-input fs13','placeholder'=>'Bank Name'])}}
                        </div>


                        <div class="section">
                            <label class="field-icon"><i class="fa fa-list"></i></label>&nbsp;
                            {{Form::label('pf_account_number','PF Account Number',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                            {{Form::number('pf_account_number', '',['class' => 'gui-input fs13','placeholder'=>'PF Account Number'])}}
                        </div>

                        <div class="section">
                            {{Form::label('pf_status','PF Status',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                            {{Form::radio('pf_status','Active', false, ['class'=>'radio','id'=>'pf_status'])}} Active
                            {{Form::radio('pf_status','Inactive',false,['class'=>'radio','id'=>'pf_status'])}} Inactive
                        </div>

                        {{--             /section -------------- -->--}}

                    </section>


                    <h4 class="wizard-section-title">
                        <i class="fa fa-file-text pr5"></i> Ex Employment Details </h4>
                    <section class="wizard-section">


                        <div class="section">
                            <label class="field-icon"><i class="fa fa-calendar"></i></label>&nbsp;
                            {{Form::label('date_of_resignation','Date of Resignation',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                            {{Form::date('date_of_resignation', '',['class' => 'gui-input fs13','placeholder'=>'Date of Resignation','id'=>'datepicker6'])}}
                        </div>

                        <div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> Notice Period </h6></label>
                            <select class="select2-single form-control" name="notice_period" id="notice_period">
                                <option value="">Select notice period</option>
                                @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                    @if($emps->employee->notice_period == '1')
                                        <option value="1" selected>1 Month</option>
                                        <option value="2">2 Months</option>
                                    @else
                                        <option value="1">1 Month</option>
                                        <option value="2" selected>2 Months</option>
                                    @endif
                                @else
                                    <option value="1">1 Month</option>
                                    <option value="2">2 Months</option>
                                @endif
                            </select>
                        </div>


                        <div class="section">
                            <label class="field-icon"><i class="fa fa-calendar"></i></label>&nbsp;
                            {{Form::label('last_working_day','Last Working Day',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                            {{Form::date('last_working_day', '',['class' => 'gui-input fs13','placeholder'=>'Last Working Day','id'=>'datepicker7'])}}
                        </div>

                        <div class="section">
                            {{Form::label('full_final','Full & Final (Joining Formalities)',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                            {{Form::radio('full_final','Yes', false, ['class'=>'radio','id'=>'full_final'])}} Yes
                            {{Form::radio('full_final','No',false,['class'=>'radio','id'=>'full_final'])}} No
                        </div>
                    </section>
                </div>
                <!-- -------------- /Wizard -------------- -->

            {!! Form::close() !!}


            <!-- -------------- /Form -------------- -->

            </div>

        </div>

    </section>

    <!-- -------------- /Content -------------- -->


    </div>

    <!-- -------------- /Body Wrap  -------------- -->

    <!-- Notification modal -->

    <div class="modal fade" tabindex="-1" role="dialog" id="notification-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div id="modal-header" class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </body>

    <!-- /Notification Modal -->
    <style>
        /*page demo styles*/
        .wizard .steps .fa,
        .wizard .steps .glyphicon,
        .wizard .steps .glyphicon {
            display: none;
        }
    </style>


    <!-- -------------- Scripts -------------- -->
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

    <!-- -------------- jQuery -------------- -->

    {!! Html::script('/assets/js/jquery/jquery-1.11.3.min.js') !!}
    {!! Html::script('/assets/js/jquery/jquery_ui/jquery-ui.min.js') !!}

    <!-- -------------- HighCharts Plugin -------------- -->
{{--    {!! Html::script('/assets/js/plugins/highcharts/highcharts.js') !!}--}}

    <!-- -------------- MonthPicker JS -------------- -->
{{--    {!! Html::script('/assets/allcp/forms/js/jquery-ui-monthpicker.min.js') !!}
    {!! Html::script('/assets/allcp/forms/js/jquery-ui-datepicker.min.js') !!}--}}
    {!! Html::script('/assets/allcp/forms/js/jquery.spectrum.min.js') !!}
    {!! Html::script('/assets/allcp/forms/js/jquery.stepper.min.js') !!}


    <!-- -------------- Plugins -------------- -->
    {!! Html::script('/assets/allcp/forms/js/jquery.validate.min.js') !!}
    {!! Html::script('/assets/allcp/forms/js/jquery.steps.min.js') !!}

    <!-- -------------- Theme Scripts -------------- -->
    {!! Html::script('/assets/js/utility/utility.js') !!}
    {!! Html::script('/assets/js/demo/demo.js') !!}
    {!! Html::script('/assets/js/main.js') !!}
{{--    {!! Html::script('/assets/js/demo/widgets_sidebar.js') !!}--}}
    {!! Html::script('/assets/js/custom_form_wizard.js') !!}

    {!!  Html::script ('/assets/js/pages/forms-widgets.js')!!}
    @push('scripts')

        <script src="/assets/js/custom_form_wizard.js"></script>
    @endpush

    <!-- -------------- Select2 JS -------------- -->
    <script src="/assets/js/plugins/select2/select2.min.js"></script>
    <script src="/assets/js/function.js"></script>



    <!-- -------------- /Scripts -------------- -->


@endsection
