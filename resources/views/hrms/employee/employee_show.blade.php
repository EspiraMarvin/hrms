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

            <div class="col-md-6">
                <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading text-center">
                            <span class="panel-title">{{isset($employee->name)?$employee->name:''}} Profile</span>
                        </div>
                        <div class="panel-body pn pb5 text-center">
                            <hr class="short br-lighter">
                            {{--   <img style="width: 80px" height="80px" class="img-circle img-thumbnail" alt="User Image" src="{{isset($employee->photo) ? $employee->photo: '/public/photos/noimage.jpg'}}">--}}
                            <img width="50%" height="130" class="img-responsive center-block" alt="User Image"
                                 src="/storage/photos/{{$employee->photo}}">
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
                            <span class="panel-title">Bank Details</span>
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
                                          <td style="width: 10px" class="text-center"><i class="fa fa-code"></i></td>
                                          <td><strong>Ifsc Code</strong></td>
                                          <td>{{isset($employee->ifsc_code) ? $employee->ifsc_code: ''}} </td>
                                      </tr>--}}
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-tags"></i></td>
                                        <td><strong>PF Status</strong></td>
                                        <td>{{isset($employee->pf_status) ? $employee->pf_status:''}}</td>
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
                            <span class="panel-title">Personal Details</span>
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
                                        <td>{{date_format(new DateTime($employee->date_of_birth), 'd-m-Y')}}</td>
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
                                        <td><strong>Emergency Cellphone</strong></td>
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
                            <span class="panel-title">Employment Details</span>
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
                                        <td> {{date_format(new DateTime($employee->date_of_resignation), 'd-m-Y')}}</td>
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

@endsection

