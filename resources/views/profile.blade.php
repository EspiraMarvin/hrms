@extends('inc.base')

@section('content')
    <a href="/employee_manager" class="btn btn-danger">Go Back</a>

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
                            {{--                            <img style="width: 80px" height="80px" class="img-circle img-thumbnail" alt="User Image" src="{{isset($employee->photo) ? $employee->photo: '/public/photos/noimage.jpg'}}">--}}
                            <img style="width: 50%" height="50%" class="img-responsive center-block" alt="User Image" src="/storage/photos/{{$employee->photo}}">
                            {{--                            <img src="{{isset($employee->photo) ? $employee->photo : '/assets/img/avatars/profile_pic.png'}}" width="80px" height="80px" class="img-circle img-thumbnail" alt="User Image">--}}

                        </div>
                        <p class="small text-center no-margin"><span class="text-muted">Employee ID:</span> {{isset($employee->code) ? $employee->code:''}}</p>
                        <p class="text-center no-margin"><span class="text-muted">Designation:</span>{{isset($employee->userrole->role->name)?$details->userrole->role->name:''}}</p>
                        <p class="small text-center no-margin"><span class="text-muted">Department:</span> {{isset($employee->department) ? $employee->department:'' }}</p>
                        <p class="small text-center no-margin"><span class="text-muted">Employment Type:</span> {{isset($employee->employment_type) ? $employee->employment_type:'' }}</p>

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
                                        <td style="width: 10px" class="text-center"><i class="fa fa-credit-card"></i></td>
                                        <td><strong>Account Number</strong></td>
                                        <td>{{isset($employee->account_number) ? $employee->account_number:''}}</td>

                                    </tr>
                                    <tr>

                                        <td style="width: 10px" class="text-center"><i class="fa fa-tags"></i></td>
                                        <td><strong>Pf Account Number</strong></td>
                                        <td>{{isset($employee->pf_account_number) ? $employee->pf_account_number:''}}</td>
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
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-code"></i></td>
                                        <td><strong>Ifsc Code</strong></td>
                                        <td>{{isset($employee->ifsc_code) ? $employee->ifsc_code: ''}} </td>
                                    </tr>
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
                                        <td>{{isset($employee->date_of_birth) ? $employee->date_of_birth:'' }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-genderless"></i>
                                        </td>
                                        <td><strong>Gender</strong></td>
                                        <td>{{$employee->gender}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-envelope-o"></i>
                                        </td>
                                        <td><strong>Father's Name</strong></td>
                                        <td>{{isset($employee->father_name)? $employee->father_name:''}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-mobile-phone"></i>
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
                                        <td><strong>Designation</strong></td>
                                        <td>{{$employee->role}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-calendar"></i></td>
                                        <td><strong>Date Joined</strong></td>
                                        <td>{{$employee->date_of_joining}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-calendar"></i></td>
                                        <td><strong>Station Posted</strong></td>
                                        <td>{{$employee->duty_station}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-calendar"></i></td>
                                        <td><strong>Posted Date</strong></td>
                                        <td>{{$employee->posted_date}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-credit-card"></i></td>
                                        <td><strong>Salary</strong></td>
                                        <td>{{$employee->salary}}</td>
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

