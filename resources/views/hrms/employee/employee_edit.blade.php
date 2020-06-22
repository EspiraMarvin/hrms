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

                {!! Form::open(['action' => ['EmployeeController@update',$employee->id],'method' => 'POST','enctype'=>'multipart/form-data','id'=>'live_form']) !!}
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
                                {{Form::text('code', isset($employee->code) ? $employee->code:'',['class' => 'gui-input fs13','placeholder'=>'Employee Code'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="section">
                                <label class="field-icon"><i class="fa fa-user-secret"></i></label>
                                {{Form::label('pf_number','Personal File Number',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                {{Form::text('pf_number', isset($employee->pf_number) ? $employee->pf_number:'',['class' => 'gui-input fs13','placeholder'=>'Personal File Number'])}}
                            </div>
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-user"></i></label>&nbsp;
                            {{Form::label('Name','Employee Name',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            {{Form::text('name', isset($employee->name) ? $employee->name:'',['class' => 'gui-input fs13','placeholder'=>'Employee Name'])}}
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
                            {{Form::date('date_of_birth', isset($employee->date_of_birth) ? $employee->date_of_birth:'',['class' => 'gui-input fs13','placeholder'=>'Date of Joining','id'=>'datepicker1'])}}
                        </div>


                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-mobile-phone"></i></label>&nbsp;
                                {{Form::label('phone_number','Mobile Number',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::number('phone_number', isset($employee->phone_number) ? $employee->phone_number:'',['class' => 'gui-input fs13','placeholder'=>'Mobile Number'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-graduation-cap"></i></label>&nbsp;
                                {{Form::label('qualification','Qualification',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::textarea('qualification', $employee->qualification,['class' => 'select2-single form-control','rows'=>'7','id'=>'editor1','required'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-mobile-phone"></i></label>&nbsp;
                                {{Form::label('emergency_number','Emergency Number',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::number('emergency_number', isset($employee->emergency_number) ? $employee->emergency_number:'',['class' => 'gui-input fs13','placeholder'=>'Emergency Number'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class=""></i></label>&nbsp;
                                {{Form::label('kin_name','Kin`s Name',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::text('kin_name', isset($employee->kin_name) ? $employee->kin_name: '',['class' => 'gui-input fs13','placeholder'=>'Kin`s Name'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-map-marker"></i></label>&nbsp;
                                {{Form::label('current_address','Current Address',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::text('current_address', isset($employee->current_address) ? $employee->current_address:'',['class' => 'gui-input fs13','placeholder'=>'Current Address'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-map-marker"></i></label>&nbsp;
                                {{Form::label('permanent_address','Permanent Address',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <br>
                                {{Form::text('permanent_address', isset($employee->permanent_address) ? $employee->permanent_address:'',['class' => 'gui-input fs13','placeholder'=>' Permanent Address'])}}
                            </div>
{{--                            <small class="text-danger">{{ $errors->first('permanent_address') }}</small>--}}
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
                                {{Form::label('department','Department',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <select id="done" class="selectpicker form-control" name="department_id" id="department_id">
                                    @if(isset($employee->roles[0]->role) && $employee->roles[0]->role === 'CEO' || isset($employee->roles[1]->role) && $employee->roles[1]->role === 'CEO')
                                        <option value="">NULL</option>
                                    @endif
                                    @if(empty($employee->department->department))
                                        <option value="">Select Department</option>
                                    @else
                                        <option value="{{$employee->department->id}}">{{$employee->department->department}}</option>
                                    @endif
                                    @if(!empty($department) && count($department) > 0)
                                        @foreach($department as $dep)
                                            <option value="{{$dep->id}}">{{$dep->department}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class=""></i></label>&nbsp;
                                {{Form::label('role','Select Role(s)',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <select id="done" class="selectpicker form-control" multiple data-done-button="true"
                                        name="roles_id[]"   title="{{isset($employee->roles[0]->role) ? $employee->roles[0]->role:''}}
                                    {{isset($employee->roles[1]->role) ? $employee->roles[1]->role:''}}"
                                        title="{{isset($employee->roles[0]->role) ? $employee->roles[0]->role:''}},
                                    {{isset($employee->roles[1]->role) ? $employee->roles[1]->role:''}}">
                                @if(!empty($roles) && count($roles) > 0)
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->role}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>


                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class=""></i></label>&nbsp;
                                {{Form::label('supervisor','Select Supervisors(2)',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                <select id="done" class="selectpicker form-control" multiple data-done-button="true" name="supervisors_id[]"
                                        title="@if(isset($employee->user->supervisedBy[0]->name)  ? $employee->user->supervisedBy[0]->name:'') {{$employee->user->supervisedBy[0]->name}}, @endif
                                        @if(isset($employee->user->supervisedBy[1]->name)  ? $employee->user->supervisedBy[1]->name:'') {{$employee->user->supervisedBy[1]->name}} @endif">
                                    @if(!empty($supervisor))
                                        @foreach($supervisor as $sup)
                                            <option value="{{$sup->id}}">{{$sup->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

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
                                <option value="" name="employment_type">Contract
                                    <input class="select2-single form-control" type="text"
                                        value="{{$employee->employment_type}}" placeholder="i.e Contract (05/06/2020 - 08/12/2024)  OR Permanent" name="employment_type">
                                </option>
                            </select>
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-money"></i></label>&nbsp;
                            {{Form::label('salary','Salary',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            {{Form::text('salary', $employee->salary,['class' => 'gui-input fs13','placeholder'=>'Salary e.g KES. 12000'])}}
                        </div>

                        <!-- -------------- /section -------------- -->
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
                            {{Form::date('last_working_day', $employee->last_working_day,['class' => 'gui-input fs13','placeholder'=>'Last Working Day'])}}
                        </div>

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


    <!-- -------------- Select2 JS -------------- -->
    <script src="/assets/js/plugins/select2/select2.min.js"></script>
    <script src="/assets/js/function.js"></script>

    <!-- -------------- /Scripts -------------- -->
@endsection
