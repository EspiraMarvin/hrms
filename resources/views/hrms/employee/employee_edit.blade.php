@extends('inc.base')


@section('content')

    {{--@include('inc.messages')--}}


    <!-- -------------- Main Wrapper -------------- -->
    {{--        <section id="content_wrapper">--}}

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
{{--            @if(session('message'))
                {{session('message')}}
            @endif
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ session::get('flash_message') }}
                </div>
        @endif--}}
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
                                {{Form::label('photo','Photo',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                {{Form::file('photo',['class' => 'gui-input fs13','placeholder'=>'choose file'])}}
                            </div>
                        </div>

                        <!-- -------------- /section -------------- -->

                        <div class="section">
                            <div class="section">
                                <label class="field-icon"><i class="fa fa-barcode"></i></label>&nbsp;
                                {{Form::label('code','Employee Code',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                {{Form::text('code', $employee->code,['class' => 'gui-input fs13','placeholder'=>'Employee Code','required'])}}
                            </div>
                        </div>


                        <div class="section">
                            <label class="field-icon"><i class="fa fa-user"></i></label>&nbsp;
                            {{Form::label('Name','Employee Name',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            {{Form::text('name', $employee->name,['class' => 'gui-input fs13','placeholder'=>'Employee Name','required'])}}
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-envelope"></i></label>&nbsp;
                            {{Form::label('email','Email Address',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            {{Form::text('email', $employee->email,['class' => 'gui-input fs13','placeholder'=>'Email Address','required'])}}
                        </div>

                        <div class="section">
                            {{Form::label('status','Employee Status',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
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


{{--                        <div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> Role </h6></label>
                            @if(\Route::getFacadeRoot()->current()->uri() == 'employee_edit/{id}')
                                <select class="select2-single form-control" name="role" id="role" readonly required>
                                    <option value="">Select role</option>
                                    @foreach($roles as $role)
                                        @if($emps->role->role->id == $role->id)
                                            <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                        @endif
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            @else
                                <select class="select2-single form-control" name="role" id="role">
                                    <option value="">Select role</option>
                                    --}}{{--                                            @foreach($roles as $role)--}}{{--
                                    --}}{{--                                                <option value="{{$role->id}}">{{$role->name}}</option>--}}{{--
                                    --}}{{--                                            @endforeach--}}{{--
                                </select>
                            @endif
                        </div>--}}

                        <div class="section">
                            {{Form::label('gender','Gender',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                            {{--                                        <input type="hidden" value="{!! csrf_token() !!}" id="token">--}}
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

                {{--        <div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> Gender </h6></label>
                            <div class="option-group field">
                                <label class="field option mb5">
                                    <input type="radio" value="0" name="gender" id="gender"
                                           @if(isset($emps))@if($emps->employee->gender == '1')checked @endif @endif>
                                    <span class="radio"></span>Male</label>
                                <label class="field option mb5">
                                    <input type="radio" value="1" name="gender" id="gender"
                                           @if(isset($emps))@if($employee->gender == '0')checked @endif @endif>
                                    <span class="radio"></span>Female</label>
                            </div>
                        </div>--}}


                        <div class="section">
                            <label class="field-icon"><i class="fa fa-calendar"></i></label>&nbsp;
                            {{Form::label('date_of_birth','Date of Birth',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                            {{Form::date('date_of_birth', $employee->date_of_birth,['class' => 'gui-input fs13','placeholder'=>'Date of Joining','id'=>'datepicker1','required'])}}
                        </div>


                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-mobile-phone"></i></label>&nbsp;
                                {{Form::label('phone_number','Mobile Number',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                                {{Form::number('phone_number', $employee->phone_number,['class' => 'gui-input fs13','placeholder'=>'Mobile Number','required'])}}
                            </div>
                        </div>


                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-graduation-cap"></i></label>&nbsp;
                                {{Form::label('qualification','Qualification (Highest)',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                                {{Form::text('qualification', $employee->qualification,['class' => 'gui-input fs13','placeholder'=>'qualification','required'])}}
                            </div>
                        </div>

                        {{--                    <div class="section">
                                                <label for="input002"><h6 class="mb20 mt40"> Qualification </h6></label>
                                                <label for="input002" class="field prepend-icon">
                                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')

                                                        {!! Form::select('qualification_list', qualification(),$emps->employee->qualification, ['class' => 'select2-single form-control qualification_select', 'id' => 'qualification']) !!}
                                                        <input type="text" id="qualification" class="gui-input form-control hidden qualification_text" placeholder="enter other qualification" value=""/>

                                                    @else
                                                        {!! Form::select('qualification_list', qualification(),'', ['class' => 'select2-single form-control qualification_select', 'id' => 'qualification']) !!}
                                                        <input type="text" id="qualification" class="gui-input form-control hidden qualification_text" placeholder="enter other qualification"/>
                                                    @endif
                                                </label>
                                            </div>--}}


                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-mobile-phone"></i></label>&nbsp;
                                {{Form::label('emergency_number','Emergency Number',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                                {{Form::number('emergency_number', $employee->emergency_number,['class' => 'gui-input fs13','placeholder'=>'Emergency Number','required'])}}
                            </div>
                        </div>


                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class=""></i></label>&nbsp;
                                {{Form::label('kra_pin','kra_pin',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                                {{Form::text('kra_pin', $employee->kra_pin,['class' => 'gui-input fs13','placeholder'=>'KRA Pin Number','required'])}}
                            </div>
                        </div>

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class=""></i></label>&nbsp;
                                {{Form::label('father_name','Father`s Name',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                                {{Form::text('father_name', $employee->father_name,['class' => 'gui-input fs13','placeholder'=>'Father`s Name','required'])}}
                            </div>
                        </div>

                        {{--                                    <div class="section">
                                                                <label for="input002"><h6 class="mb20 mt40"> Father's Name </h6></label>
                                                                <label for="input002" class="field prepend-icon">
                                                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                                        <input type="text" name="father_name" id="father_name" class="gui-input"
                                                                               value="@if($emps && $emps->employee->father_name){{$emps->employee->father_name}}@endif">

                                                                    @else
                                                                        <input type="text" placeholder="Employees' father name"
                                                                               name="father_name" id="father_name" class="gui-input">

                                                                    @endif
                                                                </label>
                                                            </div>--}}

                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-map-marker"></i></label>&nbsp;
                                {{Form::label('current_address','Current Address',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                                {{Form::text('current_address', $employee->current_address,['class' => 'gui-input fs13','placeholder'=>'Current Address','required'])}}
                            </div>
                        </div>


                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-map-marker"></i></label>&nbsp;
                                {{Form::label('permanent_address','Permanent Address',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                                {{Form::text('permanent_address', $employee->permanent_address,['class' => 'gui-input fs13','placeholder'=>' Permanent Address','required'])}}
                            </div>
                        </div>

                        <!-- -------------- /section -------------- -->
                    </section>

                    <!-- -------------- step 2 -------------- -->
                    <h4 class="wizard-section-title">
                        <i class="fa fa-user-secret pr5"></i> Employment details</h4>
                    <section class="wizard-section">
                        <!-- -------------- /section -------------- -->


                  {{--      <div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> Joining Formalities </h6></label>

                            <div class="option-group field">
                                <label class="field option mb5">
                                    <input type="radio" value="1" name="formalities"
                                           id="formalities"
                                           @if(isset($emps))@if($emps->employee->formalities == '1')checked @endif @endif>
                                    <span class="radio"></span>Completed</label>
                                <label class="field option mb5">
                                    <input type="radio" value="0" name="formalities" id="formalities"
                                           @if(isset($emps))@if($emps->employee->formalities == '0')checked @endif @endif>
                                    <span class="radio"></span>Pending</label>
                            </div>
                        </div>--}}

                        <div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> Role </h6></label>
                            <select class="select2-single form-control" name="role" id="role">
                                <option value="{{$employee->role}}" selected>{{$employee->role}}</option>
                                @if(!empty($role) && count($role) > 0)
                                    @foreach($role as $rol)
                                        <option value="{{$rol->role}}">{{$rol->role}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                       {{-- <div class="section">
                            <label for="input002"><h6 class="mb20 mt40">  Department </h6></label>
                            <select class="select2-single form-control" name="department_id">
                                @if(!empty($department ?? '') && count($department ?? '') > 0)
                                    @foreach($department as $dep)
                                        @if($dep->id == $department->user->id)
                                            <option value="{{$dep->id}}" selected>{{$dep->name}}</option>
                                        @else
                                            <option value="{{$dep->id}}">{{$dep->name}}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>--}}


                        <div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> Department </h6></label>
                            <select class="select2-single form-control" name="department" id="department">
                                <option value="{{$employee->department}}">{{$employee->department}}</option>
                                @if(!empty($department) && count($department) > 0)
                                    @foreach($department as $dep)
                                        <option value="{{$dep->name}}">{{$dep->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                   {{--     <div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> Supervisor </h6></label>
                            <select class="select2-single form-control" name="supervisor" id="supervisor">
                                @if(!empty($employee) > 0)
                                    @foreach($employee as $sup)
                                        <option value="{{$sup['supervisor']}}"  {{ $selectedvalue ?? '' }}>{{$sup['supervisor']}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>--}}

                         <div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> Supervisor </h6></label>
                             <input class="typeahead form-control" value="{{$employee->supervisor}}"  type="text">

                         </div>

                        <div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> Supervisor </h6></label>
                            <select class="select2-single form-control" name="supervisor" id="supervisor">
                                <option value="{{$employee->supervisor}}">{{$employee->supervisor}}</option>
                                    @if(!empty($employee) > 0)
                                            @foreach($employee as $emp)
                                                <option value="{{$emp['name']}}">{{$emp['name']}}</option>
                                            @endforeach
                                    @endif
                            </select>
                        </div>

                        {{--<div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> Department </h6></label>
                            <select class="select2-single form-control" name="department" id="department">
                                <option value="">Select department</option>
                                @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                    @if($emps->employee->department == 'Marketplace')
                                        <option value="Marketplace" selected>Marketplace</option>
                                        <option value="Social Media">Social Media</option>
                                        <option value="IT">IT</option>
                                    @elseif($emps->employee->department == 'Social Media')
                                        <option value="Marketplace">Marketplace</option>
                                        <option value="Social Media" selected>Social Media</option>
                                        <option value="IT">IT</option>
                                    @else
                                        <option value="Marketplace">Marketplace</option>
                                        <option value="Social Media">Social Media</option>
                                        <option value="IT" selected>IT</option>
                                    @endif
                                @else
                                    <option value="Marketplace">Marketplace</option>
                                    <option value="Social Media">Social Media</option>
                                    <option value="IT">IT</option>
                                @endif
                            </select>
                        </div>--}}


                        <div class="section">
                            <div class="form-group">
                                <label class="field-icon"><i class="fa fa-calendar"></i></label>&nbsp;
                                {{Form::label('date_of_joining','Date of Joining',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                                {{Form::date('date_of_joining', $employee->date_of_joining,['class' => 'gui-input fs13','placeholder'=>'Date of Joining'])}}
                            </div>
                        </div>


                        <div class="section">
                            <label class="field-icon"><i class="fa fa-map-marker"></i></label>&nbsp;
                            {{Form::label('duty_station','Duty Station',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            {{Form::text('duty_station', $employee->duty_station,['class' => 'gui-input fs13','placeholder'=>'Duty Station','required'])}}
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-calendar"></i></label>&nbsp;
                            {{Form::label('posted_date','Posted Date',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                            {{Form::date('posted_date', $employee->posted_date,['class' => 'gui-input fs13','placeholder'=>'Posted Date','required'])}}
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-user-plus"></i></label>&nbsp;
                            {{Form::label('status','Employment Type',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                            @if($employee->employment_type == 'Permanent')
                                {{Form::radio('employment_type','Permanent', true, ['class'=>'radio','id'=>''])}} Permanent
                                &nbsp; &nbsp;
                                {{Form::radio('employment_type','Contract',false,['class'=>'radio','id'=>''])}} Contract
                            @else
                                {{Form::radio('employment_type','Permanent', false,['class'=>'radio','id'=>''])}} Permanent
                                &nbsp;&nbsp;
                                {{Form::radio('employment_type','Contract',true,['class'=>'radio','id'=>''])}} Contract
                            @endif
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-money"></i></label>&nbsp;
                            {{Form::label('salary','Salary',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                            {{Form::text('salary', $employee->salary,['class' => 'gui-input fs13','placeholder'=>'Salary e.g KES. 12000','required'])}}
                        </div>


     {{--                   <div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> Salary on Confirmation </h6>
                            </label>
                            <label for="input002" class="field prepend-icon">
                                @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                    <input type="text" name="salary" id="salary" class="gui-input"
                                           value="@if($emps && $emps->employee->salary){{$emps->employee->salary}}@endif" readonly>
                                    <label for="input002" class="field-icon">
                                        KES.
                                    </label>
                                @else
                                    <input type="text" placeholder="e.g 12000" name="salary"
                                           id="salary" class="gui-input">
                                    <label for="input002" class="field-icon">
                                        KES.
                                    </label>
                                @endif
                            </label>
                        </div>--}}
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
                            {{Form::number('account_number', $employee->account_number,['class' => 'gui-input fs13','placeholder'=>'Bank Account Number','required'])}}
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-columns"></i></label>&nbsp;
                            {{Form::label('bank_name','Bank Name ',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                            {{Form::text('bank_name', $employee->bank_name,['class' => 'gui-input fs13','placeholder'=>'Bank Name','required'])}}
                        </div>

                        <div class="section">
                            <label class="field-icon"><i class="fa fa-list"></i></label>&nbsp;
                            {{Form::label('pf_account_number','PF Account Number ',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                            {{Form::text('pf_account_number', $employee->pf_account_number,['class' => 'gui-input fs13','placeholder'=>'PF Account Number','required'])}}
                        </div>

                        <div class="section">
                            {{Form::label('pf_status','PF Status',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                            @if($employee->pf_status == 'Active')
                                {{Form::radio('pf_status','Active', true, ['class'=>'radio','id'=>''])}} Active
                                &nbsp; &nbsp;
                                {{Form::radio('pf_status','Inactive',false,['class'=>'radio','id'=>''])}} Inactive
                            @else
                                {{Form::radio('pf_status','Active', false,['class'=>'radio','id'=>''])}} Active
                                &nbsp;&nbsp;
                                {{Form::radio('pf_status','Inactive',true,['class'=>'radio','id'=>''])}} Inactive
                            @endif
                        </div>

                  {{--      <div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> PF Status </h6></label>

                            <div class="option-group field">
                                <label class="field option mb5">
                                    <input type="radio" value="1" name="pf_status" id="pf_status"
                                           @if(isset($emps))@if($emps->employee->pf_status == '1')checked @endif @endif>
                                    <span class="radio"></span>Active</label>
                                <label class="field option mb5">
                                    <input type="radio" value="0" name="pf_status" id="pf_status"
                                           @if(isset($emps))@if($emps->employee->pf_status == '0')checked @endif @endif>
                                    <span class="radio"></span>Inactive</label>
                            </div>
                        </div>--}}
                        {{--                                     /section -------------- -->--}}

                    </section>


                    <h4 class="wizard-section-title">
                        <i class="fa fa-file-text pr5"></i> Ex Employment Details </h4>
                    <section class="wizard-section">


                        <div class="section">
                            <label class="field-icon"><i class="fa fa-calendar"></i></label>&nbsp;
                            {{Form::label('date_of_resignation','Date of Resignation',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}<br>
                            {{Form::date('date_of_resignation', $employee->date_of_resignation,['class' => 'gui-input fs13','placeholder'=>'Date of Resignation','id'=>'datepicker6'])}}
                        </div>



                        <div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> Notice Period </h6></label>
                            <select class="select2-single form-control" name="notice_period" id="notice_period">
                                <option value="">Select notice period</option>
                                @if(\Route::getFacadeRoot()->current()->uri() == 'employee/{id}/edit')
                                    @if($employee->notice_period == '1')
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
                            {{Form::date('last_working_day', $employee->last_working_day,['class' => 'gui-input fs13','placeholder'=>'Last Working Day','id'=>'datepicker7','required'])}}
                        </div>

                        <div class="section">
                            <label for="input002"><h6 class="mb20 mt40"> Full & Final (Joining Formalities) </h6></label>

                            <div class="option-group field">
                                <label class="field option mb5">
                                    <input type="hidden" value="{!! csrf_token() !!}" id="token">
                                    <input type="radio" value="1" name="full_final" id="full_final"
                                           @if(isset($emps))@if($emps->employee->full_final == '1')checked @endif @endif>
                                    <span class="radio"></span>Yes</label>
                                <label class="field option mb5">
                                    <input type="radio" value="0" name="full_final" id="full_final"
                                           @if(isset($emps))@if($emps->employee->full_final == '0')checked @endif @endif>
                                    <span class="radio"></span>No</label>
                            </div>
                        </div>
                        {{--                                    {!! Form::submit('Submit',['class' => 'btn btn-primary']) !!}--}}

                    </section>
                </div>
                <!-- -------------- /Wizard -------------- -->
            {{--                    {!! Form::submit('Submit',['class' => 'btn btn-primary']) !!}--}}

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
            source:  function (query, process) {
                return $.get(path, { query: query }, function (data) {
                    return process(data);
                });
            }
        });
    </script>
    <!-- -------------- Scripts -------------- -->

    <!-- -------------- jQuery -------------- -->

{{--    {!! Html::script('/assets/js/jquery/jquery-1.11.3.min.js') !!}--}}
{{--    {!! Html::script('/assets/js/jquery/jquery_ui/jquery-ui.min.js') !!}--}}

    <!-- -------------- HighCharts Plugin -------------- -->
    {!! Html::script('/assets/js/plugins/highcharts/highcharts.js') !!}

    <!-- -------------- MonthPicker JS -------------- -->
{{--    {!! Html::script('/assets/allcp/forms/js/jquery-ui-monthpicker.min.js') !!}--}}
{{--    {!! Html::script('/assets/allcp/forms/js/jquery-ui-datepicker.min.js') !!}--}}
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
{{--    {!! Html::script('/assets/js/custom_form_wizard.js') !!}--}}

{{--    {!!  Html::script ('/assets/js/pages/forms-widgets.js')!!}--}}
    @push('scripts')
{{--        <script src="/assets/js/custom_form_wizard.js"></script>--}}
    @endpush

    <!-- -------------- Select2 JS -------------- -->
    <script src="/assets/js/plugins/select2/select2.min.js"></script>
    <script src="/assets/js/function.js"></script>



    <!-- -------------- /Scripts -------------- -->


@endsection
