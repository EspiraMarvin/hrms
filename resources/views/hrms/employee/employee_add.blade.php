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


                {!! Form::open(['action' => 'EmployeeController@store','method' => 'POST','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}

                <div class="wizard steps-bg steps-left">

                    <!-- -------------- step 1 -------------- -->
                    <h4 class="wizard-section-title">
                        <i class="fa fa-user pr5"></i> Personal Details</h4>
                    <section class="wizard-section">

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
                                {{Form::label('code','Employee Code/ID',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                {{Form::text('code', '',['class' => 'gui-input fs13','placeholder'=>'Employee Code/ID','autocomplete'=>'off'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="section">
                                <label class="field-icon"><i class="fa fa-user-secret"></i></label>&nbsp;
                                {{Form::label('pf_number','Personal File Number',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                {{Form::text('pf_number', '',['class' => 'gui-input fs13','placeholder'=>'Personal File Number','autocomplete'=>'off'])}}
                            </div>
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-user"></i></label>&nbsp;
                            {{Form::label('Name','Employee Name',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            {{Form::text('name', '',['class' => 'gui-input fs13','placeholder'=>'Employee Name','autocomplete'=>'off'])}}
                        </div>

                      {{--  <div class="section">
                            <label class="field-icon"><i class="fa fa-envelope"></i></label>&nbsp;
                            {{Form::label('email','Email Address',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            {{Form::text('email', '',['class' => 'gui-input fs13','placeholder'=>'Email Address','autocomplete'=>'off'])}}
                        </div>--}}

                        <div class="section">
                            {{Form::label('status','Employment status',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            <br>
                            {{Form::radio('status','Present', false, ['class'=>'radio','id'=>'status'])}} Present
                            {{Form::radio('status','Ex',false,['class'=>'radio','id'=>'status'])}} Ex
                        </div>

                        <div class="section">
                            {{Form::label('gender','Gender',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            <br>
                            {{Form::radio('gender','Male', false, ['class'=>'radio','id'=>'gender'])}}Male
                            {{Form::radio('gender','Female',false,['class'=>'radio','id'=>'gender'])}} Female
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-calendar"></i></label>&nbsp;
                            {{Form::label('date_of_birth','Date of Birth',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            <br>
                            {{Form::date('date_of_birth', '',['class' => 'gui-input fs13','placeholder'=>'Date of Joining'])}}
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-calendar"></i></label>&nbsp;
                                {{Form::label('date_of_joining','Date of Joining',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::date('date_of_joining', '',['class' => 'gui-input fs13','placeholder'=>'Date of Joining'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-mobile-phone"></i></label>&nbsp;
                                {{Form::label('phone_number','Mobile Number',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::number('phone_number', '',['class' => 'gui-input fs13','placeholder'=>'Mobile Number','autocomplete'=>'off'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-graduation-cap"></i></label>&nbsp;
                                {{Form::label('qualification','Qualifications',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::text('qualification', '',['class' => 'gui-input fs13','placeholder'=>'qualification i.e  B.Sc, B.Tech, BCA,MBA, MCA, BBA, BBA+MBA, BCA+MCA, Engineering(B.Tech), Engineering(B.Tech+M.Tech)','autocomplete'=>'off'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-mobile-phone"></i></label>&nbsp;
                                {{Form::label('emergency_number','Emergency Number',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::number('emergency_number', '',['class' => 'gui-input fs13','placeholder'=>'Emergency Number','autocomplete'=>'off'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class=""></i></label>&nbsp;
                                {{Form::label('kra_pin','kra_pin',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::text('kra_pin', '',['class' => 'gui-input fs13','placeholder'=>'KRA Pin Number','autocomplete'=>'off'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class=""></i></label>&nbsp;
                                {{Form::label('father_name','Father`s Name',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::text('father_name', '',['class' => 'gui-input fs13','placeholder'=>'Father`s Name','autocomplete'=>'off'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class=""></i></label>&nbsp;
                                {{Form::label('current_address','Current Address',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::text('current_address', '',['class' => 'gui-input fs13','placeholder'=>'Current Address','autocomplete'=>'off'])}}
                            </div>
                        </div>


                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class=""></i></label>&nbsp;
                                {{Form::label('permanent_address','Permanent Address',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::text('permanent_address', '',['class' => 'gui-input fs13','placeholder'=>' Permanent Address','autocomplete'=>'off'])}}
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
                            <div class="form-group">
                                <label class="field-icon"><i class=""></i></label>&nbsp;
                                {{Form::label('role','Select Role(s)',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <select id="done" class="selectpicker form-control" multiple data-done-button="true" name="roles_id[]">
                                    @if(!empty($role) && count($role) > 0)
                                        @foreach($role as $rol)
                                            <option value="{{$rol->id}}">{{$rol->role}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> Employment Type </h6></label>
                            <select class="select2-single form-control probation_select" name="employment_type"
                                    id="probation_period">
                                <option value="">Select Employment Type</option>
                                <option value="Permanent">Permanent</option>
                                <option value="Other">Contract</option>
                            </select>
                            <input type="text" value="Contract (mm/dd/yyyy - mm/dd/yyyy)" name="employment_type"
                                   class="form-control probation_text hidden" id="probation_text">
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class=""></i></label>&nbsp;
                                {{Form::label('department','Select Department',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <select id="done" class="selectpicker form-control" name="department" id="department">
                                    <option value="">Select Department</option>
                                @if(!empty($department) && count($department) > 0)
                                        @foreach($department as $dep)
                                            <option value="{{$dep->id}}">{{$dep->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class=""></i></label>&nbsp;
                                {{Form::label('supervisor','Select Supervisor',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <select id="done" class="selectpicker form-control" name="supervisor_id" id="supervisor_id" required>
                                    <option value="">Select Supervisor</option>
                                    @if(!empty($supervisor))
                                        @foreach($supervisor as $sup)
                                            <option value="{{$sup->id}}">{{$sup->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>


                        <div class="section">
                            <label class="field-icon"><i class=""></i></label>&nbsp;
                            {{Form::label('duty_station','Duty Station',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            {{Form::text('duty_station', '',['class' => 'gui-input fs13','placeholder'=>'Duty Station'])}}
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-calendar"></i></label>&nbsp;
                            {{Form::label('posted_date','Posted Date',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            <br>
                            {{Form::date('posted_date', '',['class' => 'gui-input fs13','placeholder'=>'Posted Date'])}}
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-group"></i></label>&nbsp;
                                {{Form::label('job_group','Job Group',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::text('job_group', '',['class' => 'gui-input fs13','placeholder'=>' Job Group'])}}
                            </div>
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-money"></i></label>&nbsp;
                            {{Form::label('salary','Salary on Confirmation',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            <br>
                            {{Form::text('salary', '',['class' => 'gui-input fs13','placeholder'=>'KES. e.g 12000'])}}
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
                            {{Form::label('account_number','Bank Account Number',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            <br>
                            {{Form::number('account_number', '',['class' => 'gui-input fs13','placeholder'=>'Bank Account Number'])}}
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-columns"></i></label>&nbsp;
                            {{Form::label('bank_name','Bank Name',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            <br>
                            {{Form::text('bank_name', '',['class' => 'gui-input fs13','placeholder'=>'Bank Name'])}}
                        </div>


                        <div class="section">
                            <label class="field-icon"><i class="fa fa-list"></i></label>&nbsp;
                            {{Form::label('pf_account_number','PF Account Number',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            <br>
                            {{Form::number('pf_account_number', '',['class' => 'gui-input fs13','placeholder'=>'PF Account Number'])}}
                        </div>

                       {{-- <div class="section">
                            {{Form::label('pf_status','PF Status',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            <br>
                            {{Form::radio('pf_status','Active', false, ['class'=>'radio','id'=>'pf_status'])}} Active
                            {{Form::radio('pf_status','Inactive',false,['class'=>'radio','id'=>'pf_status'])}} Inactive
                        </div>--}}

                        {{--             /section -------------- -->--}}

                    </section>


                    <h4 class="wizard-section-title">
                        <i class="fa fa-file-text pr5"></i> Ex Employment Details </h4>
                    <section class="wizard-section">


                        <div class="section">
                            <label class="field-icon"><i class="fa fa-calendar"></i></label>&nbsp;
                            {{Form::label('date_of_resignation','Date of Resignation',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            <br>
                            {{Form::date('date_of_resignation', '',['class' => 'gui-input fs13','placeholder'=>'Date of Resignation'])}}
                        </div>

                        <div class="section">
                            {{Form::label('notice_period','Notice Period (Months[btn 1 & 3])',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            <br>
                            {{Form::number('notice_period', '',['class' => 'gui-input fs13','placeholder'=>'Notice Period'])}}
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-calendar"></i></label>&nbsp;
                            {{Form::label('last_working_day','Last Working Day',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            <br>
                            {{Form::date('last_working_day', '',['class' => 'gui-input fs13','placeholder'=>'Last Working Day'])}}
                        </div>

                        <div class="section">
                            {{Form::label('full_final','Full & Final (Joining Formalities)',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            <br>
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
            source: function (query, process) {
                return $.get(path, {query: query}, function (data) {
                    return process(data);
                });
            }
        });
    </script>

    <!-- -------------- jQuery -------------- -->

    {!! Html::script('/assets/js/jquery/jquery-1.11.3.min.js') !!}
    {!! Html::script('/assets/js/jquery/jquery_ui/jquery-ui.min.js') !!}


    {!! Html::script('/assets/allcp/forms/js/jquery.spectrum.min.js') !!}
    {!! Html::script('/assets/allcp/forms/js/jquery.stepper.min.js') !!}


    <!-- -------------- Plugins -------------- -->
    {!! Html::script('/assets/allcp/forms/js/jquery.validate.min.js') !!}
    {!! Html::script('/assets/allcp/forms/js/jquery.steps.min.js') !!}

    <!-- -------------- Theme Scripts -------------- -->
{{--    {!! Html::script('/assets/js/utility/utility.js') !!}--}}
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
    <script src="/assets/js/jquery/jquery-1.11.3.min.js"></script>

    <!-- -------------- /Scripts -------------- -->


@endsection
