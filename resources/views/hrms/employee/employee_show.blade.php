@extends('inc.base')

@section('content')
    <section id="content" class="animated fadeIn">
        <div class="row">
            <div class="container">
                @include('inc.messages')
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-heading text-center">
                                <span style="color: black" class="panel-title">{{isset($employee->name)?$employee->name:''}} Profile &nbsp;&nbsp;</span>
                            </div>
                        </div>
                        <div class="panel-body pn pb5">
                            <hr class="short br-lighter">
                            <div>
                                @if(isset($employee->photo))
                                    <img
                                        data-id="{{$employee->id}}" data-photo="{{$employee->photo}}"
                                        style="text-align: center"
                                        src="/storage/photos/{{$employee->photo}}" width="70%" height="140x"
                                        class="img-responsive center-block">
                                @else
                                    <img src="/assets/img/avatars/noimage.png"  width="70%" height="120px" class="img-responsive center-block">
                                @endif
                            </div>

                            <hr style="margin-top: 1px;border: 1px">

                            <div class="box-body no-padding">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-diamond"></i></td>
                                        <td><strong>Personal File No.</strong></td>
                                        <td style="color: black">{{isset($employee->pf_number) ? $employee->pf_number:''}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-cubes"></i></td>
                                        <td><strong>Role</strong></td>
                                        <td style="color: black">
{{--                                            {{isset($employee->roles[2]->role) ? $employee->roles[2]->role:''}} ||--}}
                                            {{isset($employee->roles[1]->role) ? $employee->roles[1]->role:''}} ||
                                            {{isset($employee->roles[0]->role) ? $employee->roles[0]->role:''}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-briefcase"></i></td>
                                        <td><strong>Department</strong></td>
                                        <td style="color: black">{{isset($employee->department->department) ? $employee->department->department:'' }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px;background-color: transparent" class="text-center"><i class="fa fa-user"></i> </td>
                                        <td><strong>Supervisors</strong></td>
                                        <td style="color:black">
                                            {{isset($employee->user->supervisedBy[0]->name) ? $employee->user->supervisedBy[0]->name:'' }} ||
                                            {{isset($employee->user->supervisedBy[1]->name) ? $employee->user->supervisedBy[1]->name:'' }}
                                        </td>
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
                            </div>
                        </div>
                        <div class="panel-body pn pb5">
                            <hr class="short br-lighter">

                            <div class="box-body no-padding">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-sellsy"></i></td>
                                        <td><strong>Job Type</strong></td>
                                        <td>{{isset($employee->employment_type) ? $employee->employment_type:'' }}</td>
                                    </tr>
                                    @if($employee->employment_type != 'Permanent')
                                        <tr>
                                            <td class="text-center"><i class="fa fa-bell-o"></i></td>
                                            <td><strong>Contract Expires</strong></td>
                                            <td>
                                                {{isset($diffInYears) ? $diffInYears: ''}} Yrs ({{isset($countableDiff) ? $countableDiff:''}} days from now)
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td class="text-center"><i class="fa fa-group"></i></td>
                                        <td><strong>Job Group</strong></td>
                                        <td>
                                            {{isset($employee->roles[1]->job_group) ? $employee->roles[1]->job_group: ''}} ||
                                            {{isset($employee->roles[0]->job_group) ? $employee->roles[0]->job_group: ''}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-shield"></i></td>
                                        <td class="offset-2"><strong>Employee Status</strong></td>
                                        <td>{{isset($employee->status) ? $employee->status:'' }}</td>
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
                                        <td class="text-center"><i class="fa fa-money"></i></td>
                                        <td><strong>Salary</strong></td>
                                        <td>{{$employee->salary}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-trophy"></i></td>
                                        <td><strong>Awards</strong></td>
                                        <td>{{isset($awards) ? $awards:''}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-credit-card"></i></td>
                                        <td><strong>Date of Resignation</strong></td>
                                        <td>{{date_format(new DateTime($employee->date_of_resignation), 'd-m-Y')}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-times"></i></td>
                                        <td><strong>Notice Period</strong></td>
                                        <td>{{$employee->notice_period}} Months</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-user-times"></i></td>
                                        <td><strong>Last Working Day</strong></td>
                                        <td>{{date_format(new DateTime($employee->last_working_day), 'd-m-Y')}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-heading text-center">
                                <span style="color: black" class="panel-title">Personal Details &nbsp;&nbsp;</span>
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
                                        <td>{{isset($employee->code) ? $employee->code:''}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-birthday-cake"></i>
                                        </td>
                                        <td><strong>Birthday</strong></td>
                                        <td>{{date_format(new DateTime($employee->date_of_birth), 'd-m-Y')}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-sort-numeric-asc"></i>
                                        </td>
                                        <td><strong>Age</strong></td>
                                        <td>{{$howOldAmI  ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-genderless"></i>
                                        </td>
                                        <td><strong>Gender</strong></td>
                                        <td>{{$employee->gender}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-user-secret"></i>
                                        </td>
                                        <td><strong>Kin's Name</strong></td>
                                        <td>{{isset($employee->kin_name)? $employee->kin_name:''}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-envelope-o"></i>
                                        </td>
                                        <td><strong>Email Address</strong></td>
                                        <td>{{isset($employee->user->email)? $employee->user->email:''}}</td>
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
                                        <td style="width: 10px" class="text-center"><i class="fa fa-location-arrow"></i></td>
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


{{--            qualification--}}
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-heading text-center">
                                <span style="color: black" class="panel-title">
                                <i style="font-size: 25px" class="fa fa-graduation-cap"></i>&nbsp;
                                Qualifications &nbsp;&nbsp;</span>
                                </span>
                            </div>
                        </div>
                        <div class="panel-body pn pb5">
                            <hr class="short br-lighter">

                            <div class="box-body no-padding">

                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>{!! isset($employee->qualification) ? $employee->qualification:'' !!}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--           // qualification--}}

        </div>

    </section>

@endsection


