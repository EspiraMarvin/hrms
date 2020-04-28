@extends('inc.base')


@section('content')

    <!-- -------------- Main Wrapper -------------- -->

    <!-- -------------- Topbar -------------- -->
    <header id="topbar" class="alt">


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
                    <a href="/employee_add"> Employees </a>
                </li>
                <li class="breadcrumb-current-item"> Edit details of {{$employee->name}} </li>
            </ol>
        </div>

    </header>
    <!-- -------------- /Topbar -------------- -->

    <!-- -------------- Content -------------- -->

    <section id="content" class="animated fadeIn">

        <div class="mw1000 center-block">
        @include('inc.messages')

        <!-- -------------- Wizard -------------- -->
            <!-- -------------- Spec Form -------------- -->
            <div class="allcp-form">

                {!! Form::open(['action' => ['EmployeeController@update',$employee->id],'method' => 'POST','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}
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
                                {{Form::text('code', $employee->code,['class' => 'gui-input fs13','placeholder'=>'Employee Code'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="section">
                                <label class="field-icon"><i class="fa fa-user-secret"></i></label>
                                {{Form::label('pf_number','Personal File Number',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                {{Form::text('pf_number', $employee->pf_number,['class' => 'gui-input fs13','placeholder'=>'Personal File Number'])}}
                            </div>
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-user"></i></label>&nbsp;
                            {{Form::label('Name','Employee Name',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            {{Form::text('name', $employee->name,['class' => 'gui-input fs13','placeholder'=>'Employee Name'])}}
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-envelope"></i></label>&nbsp;
                            {{Form::label('email','Email Address',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            {{Form::text('email', $employee->email,['class' => 'gui-input fs13','placeholder'=>'Email Address'])}}
                        </div>

                        <div class="section">
                            {{Form::label('status','Employee Status',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            <br>
                            @if($employee->status == 'Present')
                                {{Form::radio('status','Present', true, ['class'=>'radio','id'=>'status'])}}Present
                                &nbsp; &nbsp;
                                {{Form::radio('status','Ex',false,['class'=>'radio','id'=>'status'])}} Ex
                            @else
                                {{Form::radio('status','Present', false,['class'=>'radio','id'=>'status'])}} Present
                                &nbsp;&nbsp;
                                {{Form::radio('status','Ex',true,['class'=>'radio','id'=>'status'])}} Ex
                            @endif
                        </div>

                        <div class="section">
                            {{Form::label('gender','Gender',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            <br>
                            @if($employee->gender == 'Male')
                                {{Form::radio('gender','Male', true, ['class'=>'radio','id'=>'gender'])}}Male
                                &nbsp; &nbsp;
                                {{Form::radio('gender','Female',false,['class'=>'radio','id'=>'gender'])}} Female
                            @else
                                {{Form::radio('gender','Male', false,['class'=>'radio','id'=>'gender'])}} Male
                                &nbsp;&nbsp;
                                {{Form::radio('gender','Female',true,['class'=>'radio','id'=>'gender'])}} Female
                            @endif
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-calendar"></i></label>&nbsp;
                            {{Form::label('date_of_birth','Date of Birth',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            <br>
                            {{Form::date('date_of_birth', $employee->date_of_birth,['class' => 'gui-input fs13','placeholder'=>'Date of Joining','id'=>'datepicker1'])}}
                        </div>


                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-mobile-phone"></i></label>&nbsp;
                                {{Form::label('phone_number','Mobile Number',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::number('phone_number', $employee->phone_number,['class' => 'gui-input fs13','placeholder'=>'Mobile Number'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-graduation-cap"></i></label>&nbsp;
                                {{Form::label('qualification','Qualification',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::text('qualification', $employee->qualification,['class' => 'gui-input fs13','placeholder'=>'qualification i.e  B.Sc, B.Tech, BCA, MBA, MCA, BBA, BBA+MBA, BCA+MCA, Engineering(B.Tech), Engineering(B.Tech+M.Tech)'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-mobile-phone"></i></label>&nbsp;
                                {{Form::label('emergency_number','Emergency Number',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::number('emergency_number', $employee->emergency_number,['class' => 'gui-input fs13','placeholder'=>'Emergency Number'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class=""></i></label>&nbsp;
                                {{Form::label('kra_pin','kra_pin',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::text('kra_pin', $employee->kra_pin,['class' => 'gui-input fs13','placeholder'=>'KRA Pin Number'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class=""></i></label>&nbsp;
                                {{Form::label('father_name','Father`s Name',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::text('father_name', $employee->father_name,['class' => 'gui-input fs13','placeholder'=>'Father`s Name'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-map-marker"></i></label>&nbsp;
                                {{Form::label('current_address','Current Address',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::text('current_address', $employee->current_address,['class' => 'gui-input fs13','placeholder'=>'Current Address'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-map-marker"></i></label>&nbsp;
                                {{Form::label('permanent_address','Permanent Address',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::text('permanent_address', $employee->permanent_address,['class' => 'gui-input fs13','placeholder'=>' Permanent Address'])}}
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
                            <label for="input002"><h6 class="mb20 mt40"> Department </h6></label>
                            <select class="select2-single form-control" name="department" id="department">
                                @if(empty($employee->department))
                                    <option value="">Select Department</option>
                                @else
                                    <option value="{{$employee->department}}">{{$employee->department}}</option>
                                @endif
                                @if(!empty($department) && count($department) > 0)
                                    @foreach($department as $dep)
                                        <option value="{{$dep->name}}">{{$dep->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> Role </h6></label>
                            <select class="select2-single form-control" name="role_id" id="role_id">
{{--                                <option value="{{$employee->role_id}}">{{$employee->userrole->role->rolerole}}</option>--}}
                                @if(empty($employee->userrole->role->role))
                                    <option value="">Select Role</option>
                                @else
                                    <option value="{{$employee->userrole->role->id}}">{{$employee->userrole->role->role}}</option>
                                @endif
                                @if(!empty($roles) && count($roles) > 0)
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->role}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> Supervisor </h6></label>
                            <select class="select2-single form-control" name="supervisor_id" id="supervisor_id">
                                @if(empty($employee->supervisor))
                                    <option value="">Select Supervisor</option>
                                @else
                                    <option value="{{$employee->supervisor}}">{{$employee->supervisor}}</option>
                                @endif
                                @if(!empty($supervisor) && count($supervisor) > 0)
                                    @foreach($supervisor as $sup)
                                        <option value="{{$sup->id}}">{{$sup->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                       {{-- <div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> Supervisor</h6></label>
                            <input type="text" class="typeahead form-control" value="{{$employee->supervisor}}"
                                   name="supervisor" autocomplete="off">
                        </div>
--}}
                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-calendar"></i></label>&nbsp;
                                {{Form::label('date_of_joining','Date of Joining',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::date('date_of_joining', $employee->date_of_joining,['class' => 'gui-input fs13','placeholder'=>'Date of Joining'])}}
                            </div>
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-map-marker"></i></label>&nbsp;
                            {{Form::label('duty_station','Duty Station',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            {{Form::text('duty_station', $employee->duty_station,['class' => 'gui-input fs13','placeholder'=>'Duty Station'])}}
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-calendar"></i></label>&nbsp;
                            {{Form::label('posted_date','Posted Date',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            <br>
                            {{Form::date('posted_date', $employee->posted_date,['class' => 'gui-input fs13','placeholder'=>'Posted Date'])}}
                        </div>

                        <div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> Employment Type </h6></label>
                            <select class="select2-single form-control probation_select" name="employment_type"
                                    id="probation_period">
                                <option value="" name="employment_type">{{$employee->employment_type}}</option>
                                <option value="Permanent" name="employment_type">Permanent</option>
                                <option value="" name="employment_type">Contract<input
                                        class="select2-single form-control" type="text"
                                        value="{{$employee->employment_type}}" name="employment_type"></option>
                            </select>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-group"></i></label>&nbsp;
                                {{Form::label('job_group','Job Group',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::text('job_group', $employee->job_group,['class' => 'gui-input fs13','placeholder'=>' Job Group'])}}
                            </div>
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-money"></i></label>&nbsp;
                            {{Form::label('salary','Salary',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            {{Form::text('salary', $employee->salary,['class' => 'gui-input fs13','placeholder'=>'Salary e.g KES. 12000'])}}
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
                            {{Form::number('account_number', $employee->account_number,['class' => 'gui-input fs13','placeholder'=>'Bank Account Number'])}}
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-columns"></i></label>&nbsp;
                            {{Form::label('bank_name','Bank Name ',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            <br>
                            {{Form::text('bank_name', $employee->bank_name,['class' => 'gui-input fs13','placeholder'=>'Bank Name'])}}
                        </div>

                        {{--<div class="section">
                            {{Form::label('pf_status','PF Status',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            <br>
                            @if($employee->pf_status == 'Active')
                                {{Form::radio('pf_status','Active', true, ['class'=>'radio','id'=>''])}} Active
                                &nbsp; &nbsp;
                                {{Form::radio('pf_status','Inactive',false,['class'=>'radio','id'=>''])}} Inactive
                            @else
                                {{Form::radio('pf_status','Active', false,['class'=>'radio','id'=>''])}} Active
                                &nbsp;&nbsp;
                                {{Form::radio('pf_status','Inactive',true,['class'=>'radio','id'=>''])}} Inactive
                            @endif
                        </div>--}}

                        {{--              /section -------------- -->--}}

                    </section>


                    <h4 class="wizard-section-title">
                        <i class="fa fa-file-text pr5"></i> Ex Employment Details </h4>
                    <section class="wizard-section">

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-calendar"></i></label>&nbsp;
                            {{Form::label('date_of_resignation','Date of Resignation',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            <br>
                            {{Form::date('date_of_resignation', $employee->date_of_resignation,['class' => 'gui-input fs13','placeholder'=>'Date of Resignation','id'=>'datepicker6'])}}
                        </div>

                        <div class="section">
                            {{Form::label('notice_period','Notice Period (Months)',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            <br>
                            {{Form::number('notice_period', $employee->notice_period,['class' => 'gui-input fs13','placeholder'=>'Notice Period'])}}
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-calendar"></i></label>&nbsp;
                            {{Form::label('last_working_day','Last Working Day',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            <br>
                            {{Form::date('last_working_day', $employee->last_working_day,['class' => 'gui-input fs13','placeholder'=>'Last Working Day','id'=>'datepicker7'])}}
                        </div>

                        {{--<div class="section">
                            {{Form::label('full_final','Full & Final (Joining Formalities)',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            <br>
                            @if($employee->pf_status == 'Active')
                                {{Form::radio('full_final','Yes', true, ['class'=>'radio','id'=>''])}} Yes
                                &nbsp; &nbsp;
                                {{Form::radio('full_final','No',false,['class'=>'radio','id'=>''])}} No
                            @else
                                {{Form::radio('full_final','Yes', false,['class'=>'radio','id'=>''])}} Yes
                                &nbsp;&nbsp;
                                {{Form::radio('full_final','No',true,['class'=>'radio','id'=>''])}} No
                            @endif
                        </div>--}}
                        <div class="section">
                            <div class="" style="margin-right: 25px; text-align: right">
                                {!! Form::submit('Submit',['class' => 'btn btn-primary btn-lg']) !!}
                            </div>
                            <div class="modal-footer" style="margin-top: 10px;background-color: white">
                            </div>
                        </div>

                    </section>
                </div>
                <!-- -------------- /Wizard -------------- -->

            {{Form::hidden('_method','PUT')}}
            {!! Form::close() !!}

            <!-- -------------- /Form -------------- -->

            </div>
            <!-- -------------- /Spec Form -------------- -->

        </div>

    </section>
    <!-- -------------- /Content -------------- -->

    </section>


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

    <!-- -------------- Scripts -------------- -->

    <!-- -------------- jQuery -------------- -->

    {!! Html::script('/assets/allcp/forms/js/jquery.spectrum.min.js') !!}
    {!! Html::script('/assets/allcp/forms/js/jquery.stepper.min.js') !!}


    <!-- -------------- Plugins -------------- -->
    {!! Html::script('/assets/allcp/forms/js/jquery.validate.min.js') !!}
    {!! Html::script('/assets/allcp/forms/js/jquery.steps.min.js') !!}

    <!-- -------------- Theme Scripts -------------- -->
    {!! Html::script('/assets/js/utility/utility.js') !!}
    {!! Html::script('/assets/js/demo/demo.js') !!}
    {!! Html::script('/assets/js/main.js') !!}


    <!-- -------------- Select2 JS -------------- -->
    <script src="/assets/js/plugins/select2/select2.min.js"></script>
    <script src="/assets/js/function.js"></script>

    <!-- -------------- /Scripts -------------- -->


@endsection
