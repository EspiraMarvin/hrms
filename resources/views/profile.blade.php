@extends('inc.base')

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 4px">
            <a style="margin-left: 5px" href="/dashboard" class="btn btn-danger col-4">Go Back</a>

            <a style="background-color: #1fad83;margin-left: 5px;color: white" href="/my_target_list" class="btn btn-success col-4">Check
                Targets</a>

            <a style="background-color: #06b6ef;margin-left: 5px;color: white" href="/my_leave_list" class="btn btn-default  col-4">Check
                Leaves</a>

            <a style="background-color: #5c2699;margin-left: 5px; color: white" href="/my_assigned_assets" class="btn btn-default col-4">Assets
                Assigned</a>

            <a style="background-color: darkmagenta;margin-left: 5px; color: white" href="/my_awards" class="btn btn-default col-4">Awards</a>

            <a style="background-color: #0c373c;margin-left: 5px; color: white" href="/my_train_invite" class="btn btn-default col-4">Program Invites</a>

        </div>
    </div>

    <section id="content" class="animated fadeIn">
        <div class="row">
            <div class="container">
                @include('inc.messages')
                @if(!empty($pending))
                        <div class="alert alert-danger text-center" role="alert">
                            Incomplete Profile
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading text-center">
                            <span style="color: black" class="panel-title">{{isset($employee->name)?$employee->name:''}} Profile &nbsp;&nbsp;</span>
                                <span>
                                    <i class="fa fa-cog" data-toggle="modal" data-target="#profile"
                                             style="font-size: 30px;color: green"
                                             data-proid="{{$employee->id}}" data-photo="{{$employee->photo}}"
                                             data-employeecode="{{$employee->code}}"
                                             data-pfnumber="{{isset($employee->pf_number) ? $employee->pf_number:''}}">
{{--                                          data-remarks="{{$app->remarks}}" data-status="{{$app->status}}"--}}
                                </i> Edit
                                </span>
                        </div>
                        <div class="panel-body pn pb5 text-center">
                            <hr class="short br-lighter">
                            {{--   <img style="width: 80px" height="80px" class="img-circle img-thumbnail" alt="User Image" src="{{isset($employee->photo) ? $employee->photo: '/public/photos/noimage.jpg'}}">--}}

                            @if(isset($employee->photo))
                                <img style="text-align: center" src="/storage/photos/{{$employee->photo}}" width="250px" height="120px" class="img-responsive center-block">
                            @else
                                <img src="/assets/img/avatars/noimage.png"  width="250px" height="50px" class="img-responsive center-block">
                            @endif

                  {{--          <img width="250px" height="50px" class="img-responsive center-block" alt="User Image"
                                 src="/storage/photos/{{$employee->photo}}">--}}

                            {{--   <img src="{{isset($employee->photo) ? $employee->photo : '/assets/img/avatars/profile_pic.png'}}" width="80px" height="80px" class="img-circle img-thumbnail" alt="User Image">--}}

                        </div>
                        {{--                        <hr style="margin-top: -3px;border: 1px solid">--}}
                        <div class="panel-body pn pb5">
                            <div class="box-body no-padding">
                                <table class="table" style="margin-top:-4px;text-align: center">
                                    <tbody>
                                    <tr>
                                        <td style="width: 10px" class="text-center"></td>
                                        <td><strong>Employee ID</strong></td>
                                        <td style="color: black">{{isset($employee->code) ? $employee->code:''}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width: 10px" class="text-center"></td>
                                        <td><strong>Personal File No</strong></td>
                                        <td style="color: black">{{isset($employee->pf_number) ? $employee->pf_number:''}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width: 10px" class="text-center"></td>
                                        <td><strong>Role</strong></td>
                                        <td style="color: black">{{isset($employee->userrole->role->role) ? $employee->userrole->role->role:''}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"></td>
                                        <td><strong>Department</strong></td>
                                        <td style="color: black">{{isset($employee->department) ? $employee->department:'' }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"></td>
                                        <td><strong>Supervisor</strong></td>
                                        <td style="color: black">{{isset($employee->supervisor) ? $employee->supervisor:'' }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"></td>
                                        <td><strong>Employment Type</strong></td>
                                        <td style="color: black">{{isset($employee->employment_type) ? $employee->employment_type:'' }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"></td>
                                        <td class="offset-2"><strong>Employee Status</strong></td>
                                        <td style="color: black">{{isset($employee->status) ? $employee->status:'' }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-heading text-center">
                                <span style="color: black" class="panel-title">Bank Details &nbsp;&nbsp;</span>
                                    <span>
                                        <i class="fa fa-cog" data-toggle="modal" data-target="#bank"
                                                 style="font-size: 30px;color: green"
                                                 data-id="{{$employee->id}}"
                                                 data-accountnumber="{{isset($employee->account_number) ? $employee->account_number:''}}"
                                                 data-bankname="{{isset($employee->bank_name) ? $employee->bank_name: ''}}">
                                        </i> Edit
                                    </span>
                            </div>
                        </div>
                        <div class="panel-body pn pb5">
                            <hr class="short br-lighter">

                            <div class="box-body no-padding">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-credit-card"></i>
                                        </td>
                                        <td><strong>Account Number</strong></td>
                                        <td>{{isset($employee->account_number) ? $employee->account_number:''}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-bank"></i></td>
                                        <td><strong>Bank Name</strong></td>
                                        <td>{{isset($employee->bank_name) ? $employee->bank_name: ''}}</td>
                                    </tr>

                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-tags"></i></td>
                                        <td><strong>KRA Pin</strong></td>
                                        <td>{{isset($employee->kra_pin) ? $employee->kra_pin:''}}</td>
                                    </tr>
                                  {{--  <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-tags"></i></td>
                                        <td><strong>PF Status</strong></td>
                                        <td>{{isset($employee->pf_status) ? $employee->pf_status:''}}</td>
                                    </tr>--}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-success">
                    <div class="panel">

                        <div class="panel-heading">
                            <div class="panel-heading text-center">
                                <span style="color: black" class="panel-title">Personal Details &nbsp;&nbsp;</span>
                                <span>
                                    <i class="fa fa-cog" data-toggle="modal" data-target="#personal"
                                                 style="font-size: 30px;color: green"
                                                 data-id="{{$employee->id}}"
                                                 data-email="{{isset($employee->email) ? $employee->email:''}}"
                                                 data-phone="{{isset($employee->phone_number) ? $employee->phone_number:''}}"
                                                 data-emergency="{{isset($employee->emergency_number) ? $employee->emergency_number:''}}"
                                                 data-birthday="{{isset($employee->date_of_birth) ? $employee->date_of_birth:''}}"
                                                 data-fathername="{{isset($employee->father_name) ? $employee->father_name: ''}}"
                                                 data-qualification="{{isset($employee->qualification) ? $employee->qualification:''}}"
                                                 data-currentaddress="{{isset($employee->current_address)? $employee->current_address:''}}"
                                                 data-permanentaddress="{{isset($employee->permanent_address) ? $employee->permanent_address:''}}"
                                    >
                                        {{-- data-remarks="{{$app->remarks}}" data-status="{{$app->status}}"--}}

                                    </i> Edit
                                </span>
                            </div>
                        </div>
                        <div class="panel-body pn pb5">
                            <hr class="short br-lighter">

                            <div class="box-body no-padding">

                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-birthday-cake"></i>
                                        </td>
                                        <td><strong>Birthday</strong></td>
                                        <td>{{date_format(new DateTime($employee->date_of_birth), 'm-d-Y')}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-genderless"></i>
                                        </td>
                                        <td><strong>Gender</strong></td>
                                        <td>{{$employee->gender}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-user"></i>
                                        </td>
                                        <td><strong>Father's Name</strong></td>
                                        <td>{{isset($employee->father_name)? $employee->father_name:''}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-envelope-o"></i>
                                        </td>
                                        <td><strong>Email Address</strong></td>
                                        <td>{{isset($employee->email)? $employee->email:''}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-mobile-phone"></i>
                                        </td>
                                        <td><strong>Cellphone</strong></td>
                                        <td>{{isset($employee->phone_number)? $employee->phone_number:''}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-mobile-phone"></i>
                                        </td>
                                        <td><strong>Emergency Contact</strong></td>
                                        <td>{{isset($employee->emergency_number)? $employee->emergency_number:''}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-graduation-cap"></i>
                                        </td>
                                        <td><strong>Qualification</strong></td>
                                        <td>{{isset($employee->qualification) ? $employee->qualification:''}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-map-marker"></i>
                                        </td>
                                        <td><strong>Current Address</strong></td>
                                        <td>{{isset($employee->current_address)? $employee->current_address:''}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-map-marker"></i>
                                        </td>
                                        <td><strong>Permanent Address</strong></td>
                                        <td>{{isset($employee->permanent_address) ? $employee->permanent_address:''}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-heading text-center">
                                <span style="color: black" class="panel-title">Employment Details&nbsp;&nbsp;</span>
                                <span>
                                              <i class="fa fa-cog" data-toggle="modal" data-target="#employment"
                                                 style="font-size: 30px;color: green"
                                                 data-id="{{$employee->id}}"
                                                 data-accountnumber="{{isset($employee->account_number) ? $employee->account_number:''}}"
                                                 data-bankname="{{isset($employee->bank_name) ? $employee->bank_name: ''}}">
                                        {{-- data-remarks="{{$app->remarks}}" data-status="{{$app->status}}"--}}

                                    </i> Edit
                                    </span>
                            </div>
                        </div>
                        <div class="panel-body pn pb5">
                            <hr class="short br-lighter">

                            <div class="box-body no-padding">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-key"></i></td>
                                        <td><strong>Employee ID</strong></td>
                                        <td>{{$employee->code}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-briefcase"></i></td>
                                        <td><strong>Department</strong></td>
                                        <td>{{$employee->department}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-cubes"></i></td>
                                        <td><strong>Role</strong></td>
                                        <td>{{$employee->userrole->role->role}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-calendar"></i></td>
                                        <td><strong>Date Joined</strong></td>

                                        <td>{{date_format(new DateTime($employee->date_of_joining), 'd-m-Y')}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-calendar"></i></td>
                                        <td><strong>Station Posted</strong></td>
                                        <td>{{$employee->duty_station}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-calendar"></i></td>
                                        <td><strong>Posted Date</strong></td>
                                        <td>{{date_format(new DateTime($employee->posted_date), 'd-m-Y')}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-group"></i></td>
                                        <td><strong>Job Group</strong></td>
                                        <td>{{$employee->job_group}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-credit-card"></i></td>
                                        <td><strong>Salary</strong></td>
                                        <td>{{$employee->salary}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-times"></i></td>
                                        <td><strong>Notice Period</strong></td>
                                        <td>{{$employee->notice_period}} Months</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-credit-card"></i></td>
                                        <td><strong>Date of Resignation</strong></td>
                                        <td>{{date_format(new DateTime($employee->date_of_resignation), 'd-m-Y')}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

        <!--Profile Modal -->
        <div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalCenter">
                            <div style="background-color: #67d3e0" class="modal-header">
                                <h5 class="modal-title text-center" id="exampleModalCenter">Edit Profile</h5>
                                <button style="font-size: 30px; margin-top: -30px" type="button" class="close mt-lg-3" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </h5>
                    </div>
                    <div class="modal-body">

{{--                        {!! Form::open(['action' => ['LeavesController@approveLeave', isset($app->id) ? $app->id:''],'method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data','class' => 'form-horizontal','id'=>"custom-form-wizard"]) !!}--}}
{{--                        {{Form::hidden('id', isset($app->id) ? $app->id:'' ,['value' =>'','name' => 'id','id'=>'app_id'])}}--}}
{{--                        {{Form::hidden('id', isset($app->employee_id) ? $app->employee_id:'' ,['value' =>'','name' => 'employee_id','id'=>'employee_id'])}}--}}
                        {{--                    <input type="hidden" name="id" id="app_id" value="">--}}

                    {{--    <div class="section">
                            <div class="section">
                                <label class="field-icon"><i class="fa fa-cloud-upload"></i></label>&nbsp;
                                {{Form::label('photo','Photo (.jpg only)',['class'=>'mb20 mt40','style'=>'color:black;font-weight:bold'])}}
                                {{Form::file('photo',['class' => 'gui-input fs13','placeholder'=>'choose file'])}}
                            </div>
                        </div><br>--}}
                        <div class="form-control" style="border: 0;margin-top: -16px">
                            <div class="col-xs-6 text-center"><h6>Profile Photo: </h6></div>
                            <div class="col-xs-6">
                                <input type="hidden" id="photo" name="photo">
                            </div>
                        </div><br>
                        <div class="form-control" style="border: 0;margin-top: -16px">
                            <div class="col-xs-6 text-center"><h6>Employee Code: </h6></div>
                            <div class="col-xs-6">
                                <input style="border: 0" type="text"  class="form-control text-center" id="employee_code">
                            </div>
                        </div><br>
                        <div class="form-control" style="border: 0;margin-top: -16px">
                            <div class="col-xs-6 text-center"><h6>Pf Number: </h6></div>
                            <div class="col-xs-6">
                                <input style="border: 0" type="text" class="form-control text-center" id="pf_number">
                            </div>
                        </div><br>
                        <div class="form-control" style="border: 0;margin-top: -16px">
                            <div class="col-xs-6 text-center"><h6>Department: </h6></div>
                            <div class="col-xs-6">
                                <input style="border: 0" type="text" disabled class="form-control text-center" id="department">
                            </div>
                        </div><br>
                        <div class="form-control" style="border: 0;margin-top: -16px">
                            <div class="col-xs-6 text-center"><h6>Job Group: </h6></div>
                            <div class="col-xs-6">
                                <input style="border: 0" type="text" disabled class="form-control text-center" id="jobgroup">
                            </div>
                        </div><br>
                        <div class="form-control" style="border: 0;margin-top: -16px">
                            <div class="col-xs-6 text-center"><h6>Phone No: </h6></div>
                            <div class="col-xs-6">
                                <input style="border: 0" type="text" disabled class="form-control text-center" id="phone">
                            </div>
                        </div><br>
                        <div class="form-control" style="border: 0;margin-top: -16px">
                            <div class="col-xs-6 text-center"><h6>Remarks: </h6></div>
                            <div class="col-xs-6">
                                <textarea rows="1" cols="10" id="remarks" name="remarks" class="form-control"></textarea>
                            </div>
                        </div><br>

                    </div>

                    <div class="modal-footer" style="margin-top: 10px">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input class="btn btn-primary" type="submit" name="SUBMIT" value="Submit" onclick="this.value='Submitting ..';this.disabled='disabled'; this.form.submit();" />
                    </div>
{{--                    {{Form::hidden('_method','PUT')}}--}}
{{--                    {!! Form::close() !!}--}}
                </div>
            </div>
        </div>
        {{--   <! -- /Modal -->--}}


    <!-- Bank Modal -->
    <div class="modal fade" id="bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalCenter">
                        <div style="background-color: #67d3e0" class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalCenter">Edit Bank Details</h5>
                            <button style="font-size: 30px; margin-top: -30px" type="button" class="close mt-lg-3" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </h5>
                </div>
                <div class="modal-body">

                    {!! Form::open(['action' => ['ProfileController@editBank', isset($employee->id) ? $employee->id:''],'method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data','class' => 'form-horizontal','id'=>"custom-form-wizard"]) !!}
                    {{Form::hidden('id', isset($employee->id) ? $employee->id:'' ,['value' =>'','name' => 'id','id'=>'employee_id'])}}
{{--                    <input type="hidden" name="id" id="id" value="">--}}
                    <div class="form-control" style="border: 0;margin-top: -16px">
                        <div class="col-xs-6 text-center"><h6>Account Number: </h6></div>
                        <div class="col-xs-6">
                            <input type="number" class="form-control text-center" id="account_number" name="account_number">
                        </div>
                    </div><br>
                    <div class="form-control" style="border: 0;margin-top: -16px">
                        <div class="col-xs-6 text-center"><h6>Bank Name: </h6></div>
                        <div class="col-xs-6">
                            <input type="text" name="bank_name" class="form-control text-center" id="bank_name">
                        </div>
                    </div><br>
                </div>

                <div class="modal-footer" style="margin-top: 10px">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input class="btn btn-primary" type="submit" name="SUBMIT" value="Submit" onclick="this.value='Submitting ..';this.disabled='disabled'; this.form.submit();" />
                </div>
                {{Form::hidden('_method','PUT')}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{--   <! -- /Modal -->--}}


    <!-- Personal Modal -->
    <div class="modal fade" id="personal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalCenter">
                        <div style="background-color: #67d3e0" class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalCenter">Edit Personal Details</h5>
                            <button style="font-size: 30px; margin-top: -30px" type="button" class="close mt-lg-3" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </h5>
                </div>
                <div class="modal-body">

                    {!! Form::open(['action' => ['ProfileController@editPersonal', isset($employee->id) ? $employee->id:''],'method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data','class' => 'form-horizontal','id'=>"custom-form-wizard"]) !!}
                    {{Form::hidden('id', isset($employee->id) ? $employee->id:'' ,['value' =>'','name' => 'id','id'=>'employee_id'])}}
                    {{--                    <input type="hidden" name="id" id="id" value="">--}}

                    <div class="form-control" style="border: 0;margin-top: -16px">
                        <div class="col-xs-6 text-center"><h6>Birthday: </h6></div>
                        <div class="col-xs-6">
                            <input type="date" name="date_of_birth" class="form-control text-center" id="date_of_birth">
                        </div>
                    </div><br>
                    <div class="form-control" style="border: 0;margin-top: -16px">
                        <div class="col-xs-6 text-center"><h6>Father's Name </h6></div>
                        <div class="col-xs-6">
                            <input type="text" class="form-control text-center" id="father_name" name="father_name">
                        </div>
                    </div><br>
                    <div class="form-control" style="border: 0;margin-top: -16px">
                        <div class="col-xs-6 text-center"><h6>Email Address: </h6></div>
                        <div class="col-xs-6">
                            <input type="email" class="form-control text-center" id="email" name="email">
                        </div>
                    </div><br>
                    <div class="form-control" style="border: 0;margin-top: -16px">
                        <div class="col-xs-6 text-center"><h6>Phone Number: </h6></div>
                        <div class="col-xs-6">
                            <input type="number" class="form-control text-center" id="phone" name="phone">
                        </div>
                    </div><br>
                    <div class="form-control" style="border: 0;margin-top: -16px">
                        <div class="col-xs-6 text-center"><h6>Emergency Contact: </h6></div>
                        <div class="col-xs-6">
                            <input type="number" class="form-control text-center" id="emergency" name="emergency">
                        </div>
                    </div><br>
                    <div class="form-control" style="border: 0;margin-top: -16px">
                        <div class="col-xs-6 text-center"><h6>Qualifications </h6></div>
                        <div class="col-xs-6">
                            <textarea rows="3" cols="10" class="form-control text-center" id="qualification" name="qualification"
                                      placeholder="i.e B.Sc Commerce, B.Tech, MBA,BCA, MCA, BBA, BBA+MBA, BCA+MCA">
                            </textarea>
                        </div>
                    </div><br>
                    <div class="form-control" style="border: 0;margin-top: 25px">
                        <div class="col-xs-6 text-center"><h6>Current Address </h6></div>
                        <div class="col-xs-6">
                            <input type="text" class="form-control text-center" id="current_address" name="current_address">
                        </div>
                    </div><br>
                    <div class="form-control" style="border: 0;margin-top: -16px">
                        <div class="col-xs-6 text-center"><h6>Permanent Address </h6></div>
                        <div class="col-xs-6">
                            <input type="text" class="form-control text-center" id="permanent_address" name="permanent_address">
                        </div>
                    </div><br>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input class="btn btn-primary" type="submit" name="SUBMIT" value="Submit" onclick="this.value='Submitting ..';this.disabled='disabled'; this.form.submit();" />
                </div>
                {{Form::hidden('_method','PUT')}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{--   <! -- /Modal -->--}}

    <!-- Employment Modal -->
    <div class="modal fade" id="employment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalCenter">
                        <div style="background-color: #67d3e0" class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalCenter">Edit Employment Details</h5>
                            <button style="font-size: 30px; margin-top: -30px" type="button" class="close mt-lg-3" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </h5>
                </div>
                <div class="modal-body">

                    {!! Form::open(['action' => ['ProfileController@editEmployment', isset($employee->id) ? $employee->id:''],'method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data','class' => 'form-horizontal','id'=>"custom-form-wizard"]) !!}
                    {{Form::hidden('id', isset($employee->id) ? $employee->id:'' ,['value' =>'','name' => 'id','id'=>'employee_id'])}}
                    {{--                    <input type="hidden" name="id" id="id" value="">--}}

                    <div class="form-control" style="border: 0;margin-top: -16px">
                        <div class="col-xs-6 text-center"><h6>Birthday: </h6></div>
                        <div class="col-xs-6">
                            <input type="date" name="date_of_birth" class="form-control text-center" id="date_of_birth">
                        </div>
                    </div><br>
                    <div class="form-control" style="border: 0;margin-top: -16px">
                        <div class="col-xs-6 text-center"><h6>Father's Name </h6></div>
                        <div class="col-xs-6">
                            <input type="text" class="form-control text-center" id="father_name" name="father_name">
                        </div>
                    </div><br>
                    <div class="form-control" style="border: 0;margin-top: -16px">
                        <div class="col-xs-6 text-center"><h6>Email Address: </h6></div>
                        <div class="col-xs-6">
                            <input type="email" class="form-control text-center" id="email" name="email">
                        </div>
                    </div><br>
                    <div class="form-control" style="border: 0;margin-top: -16px">
                        <div class="col-xs-6 text-center"><h6>Phone Number: </h6></div>
                        <div class="col-xs-6">
                            <input type="number" class="form-control text-center" id="phone" name="phone">
                        </div>
                    </div><br>
                    <div class="form-control" style="border: 0;margin-top: -16px">
                        <div class="col-xs-6 text-center"><h6>Emergency Contact: </h6></div>
                        <div class="col-xs-6">
                            <input type="number" class="form-control text-center" id="emergency" name="emergency">
                        </div>
                    </div><br>
                    <div class="form-control" style="border: 0;margin-top: -16px">
                        <div class="col-xs-6 text-center"><h6>Qualifications </h6></div>
                        <div class="col-xs-6">
                            <textarea rows="3" cols="10" class="form-control text-center" id="qualification" name="qualification"
                                      placeholder="i.e B.Sc Commerce, B.Tech, MBA,BCA, MCA, BBA, BBA+MBA, BCA+MCA">
                            </textarea>
                        </div>
                    </div><br>
                    <div class="form-control" style="border: 0;margin-top: 25px">
                        <div class="col-xs-6 text-center"><h6>Current Address </h6></div>
                        <div class="col-xs-6">
                            <input type="text" class="form-control text-center" id="current_address" name="current_address">
                        </div>
                    </div><br>
                    <div class="form-control" style="border: 0;margin-top: -16px">
                        <div class="col-xs-6 text-center"><h6>Permanent Address </h6></div>
                        <div class="col-xs-6">
                            <input type="text" class="form-control text-center" id="permanent_address" name="permanent_address">
                        </div>
                    </div><br>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input class="btn btn-primary" type="submit" name="SUBMIT" value="Submit" onclick="this.value='Submitting ..';this.disabled='disabled'; this.form.submit();" />
                </div>
                {{Form::hidden('_method','PUT')}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{--   <! -- /Modal -->--}}


    <script>
        $('#profile').on('show.bs.modal', function (event) {

            console.log('modal opened')

            var button = $(event.relatedTarget)

            var pro_id = button.data('proid')
            var photo = button.data('photo')
            var employee_code = button.data('employeecode')
            var pf_number = button.data('pfnumber')
            var modal = $(this)

            modal.find('.modal-body #apro_id').val(pro_id);
            modal.find('.modal-body #photo').val(photo);
            modal.find('.modal-body #employee_code').val(employee_code);
            modal.find('.modal-body #pf_number').val(pf_number);
        })
    </script>

    <script>
        $('#bank').on('show.bs.modal', function (event) {

            console.log('modal opened')

            var button = $(event.relatedTarget)

            var id = button.data('id')
            var account_number = button.data('accountnumber')
            var bank_name = button.data('bankname')
            var modal = $(this)

            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #account_number').val(account_number);
            modal.find('.modal-body #bank_name').val(bank_name);
        })
    </script>

    <script>
        $('#personal').on('show.bs.modal', function (event) {

            console.log('modal opened')

            var button = $(event.relatedTarget)

            var id = button.data('id')
            var birthday = button.data('birthday')
            var email = button.data('email')
            var phone = button.data('phone')
            var emergency = button.data('emergency')
            var father_name = button.data('fathername')
            var qualification = button.data('qualification')
            var current_address = button.data('currentaddress')
            var permanent_address = button.data('permanentaddress')
            var modal = $(this)

            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #date_of_birth').val(birthday);
            modal.find('.modal-body #email').val(email);
            modal.find('.modal-body #phone').val(phone);
            modal.find('.modal-body #emergency').val(emergency);
            modal.find('.modal-body #father_name').val(father_name);
            modal.find('.modal-body #qualification').val(qualification);
            modal.find('.modal-body #current_address').val(current_address);
            modal.find('.modal-body #permanent_address').val(permanent_address);
        })
    </script>

    <script>
        $('#employment').on('show.bs.modal', function (event) {

            console.log('modal opened')

            var button = $(event.relatedTarget)

            var id = button.data('id')
            var account_number = button.data('accountnumber')
            var bank_name = button.data('bankname')
            var modal = $(this)

            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #account_number').val(account_number);
            modal.find('.modal-body #bank_name').val(bank_name);
        })
    </script>

        <script>
            const alertHTML = '<div class="alert"></div>';
            document.body.insertAdjacentHTML('beforeend', alertHTML);
            setTimeout(() => document.querySelector('.alert').classList.add('hide'), 4000);
        </script>

@endsection


