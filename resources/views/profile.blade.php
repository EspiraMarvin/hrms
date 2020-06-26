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

                {{--      profile details--}}
                <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-heading text-center">
                                <span style="color: black" class="panel-title">{{isset($employee->name)?$employee->name:''}} Profile &nbsp;&nbsp;</span>
                                    <i class="fa fa-cog" data-toggle="modal" data-target="#profile"
                                       style="font-size: 26px;color: green"
                                       data-id="{{$employee->id}}"
                                       data-email="{{isset($employee->user->email) ? $employee->user->email:''}}">
                                        <span style="font-size: 11px">Edit</span></i>
                            </div>
                        </div>
                        <div class="panel-body pn pb5">
                            <hr class="short br-lighter">
                            <div class="content_img">

                                <img src="{{isset($employee->photo) ? $employee->photo : 'public/assets/noimage.png'}}" width="80px" height="80px"
                                     data-toggle="modal" data-target="#profilePic" class="img-responsive center-block"
                                     data-id="{{isset($employee->id)}}" data-photo="{{isset($employee->photo)}}"
                                >
                               {{-- @if(!isset($employee->photo))
                                    <imghr
                                        data-toggle="modal" data-target="#profilePic"
                                        data-id="{{$employee->id}}" data-photo="{{$employee->photo}}"
                                        style="text-align: center"
                                        src="/storage/photos/{{$employee->photo}}" width="70%" height="120x"
                                        class="img-responsive center-block">
                                @else
                                    <img src="/assets/noimage.png" width="70%" height="120px" class="img-responsive center-block">
                                @endif--}}
                                <div>Click Image To Change</div>

                                {{--<img
                                    data-toggle="modal" data-target="#profilePic"
                                    data-id="{{isset($employee->id)}}" data-photo="{{isset($employee->photo)}}"
                                    style="text-align: center"
                                    class="img-responsive center-block"
                                    src="{{isset($employee->photo) ? $employee->photo : '/assets/img/avatars/noimage.png'}}" height="80px" >
                                --}}{{--  @if(isset($employee->photo))
                                    <img
                                         data-toggle="modal" data-target="#profilePic"
                                         data-id="{{$employee->id}}" data-photo="{{$employee->photo}}"
                                         style="text-align: center"
                                          src="/storage/photos/{{$employee->photo}}" width="70%" height="120x"
                                          class="img-responsive center-block">
                                 @else
                                     <img src="assets/noimage.png" width="70%" height="120px" class="img-responsive center-block">
                                 @endif--}}{{--
                                    <div>Click Image To Change</div>--}}
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
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-sellsy"></i></td>
                                        <td><strong>Job Type</strong></td>
                                        <td style="color: black">{{isset($employee->employment_type) ? $employee->employment_type:'' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-group"></i></td>
                                        <td><strong>Job Group</strong></td>
                                        <td style="color: black">
                                            {{isset($employee->roles[1]->job_group) ? $employee->roles[1]->job_group: ''}} ||
                                            {{isset($employee->roles[0]->job_group) ? $employee->roles[0]->job_group: ''}}
                                        </td>
                                    </tr>
                                    @if($employee->employment_type != 'Permanent')
                                    <tr>
                                        <td class="text-center"><i class="fa fa-bell-o"></i></td>
                                        <td><strong>Contract Expires</strong></td>
                                        <td style="color: black">
                                            {{isset($diffInYears) ? $diffInYears: ''}} Yrs ({{isset($countableDiff) ? $countableDiff:''}} days from now)
                                        </td>
                                    </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{--      // profile details--}}


                {{--     bank details--}}
                <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-heading text-center">
                                <span style="color: black" class="panel-title">Bank Details &nbsp;&nbsp;</span>
                                    <span style="font-size: 11px">
                                      {{--  <i class="fa fa-cog" data-toggle="modal" data-target="#bank"
                                                 style="font-size: 26px;color: green"
                                                 data-id="{{$employee->id}}"
                                                 data-accountnumber="{{isset($employee->account_number) ? $employee->account_number:''}}"
                                                 data-bankname="{{isset($employee->bank_name) ? $employee->bank_name: ''}}">
                                            <span style="font-size: 11px">Edit</span>
                                        </i>--}}
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--   // bank details--}}


            {{--    personal details--}}
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-heading text-center">
                                <span style="color: black" class="panel-title">Personal Details &nbsp;&nbsp;</span>
                                <span style="font-size: 11px">
                                    <i class="fa fa-cog" data-toggle="modal" data-target="#personal"
                                                 style="font-size: 26px;color: green"
                                                 data-id="{{$employee->id}}"
                                                 data-phone="{{isset($employee->phone_number) ? $employee->phone_number:''}}"
                                                 data-emergency="{{isset($employee->emergency_number) ? $employee->emergency_number:''}}"
                                                 data-birthday="{{isset($employee->date_of_birth) ? $employee->date_of_birth:''}}"
                                                 data-kinname="{{isset($employee->kin_name) ? $employee->kin_name: ''}}"
                                                 data-qualification="{!! isset($employee->qualification) ? $employee->qualification:'' !!}"
                                                 data-currentaddress="{{isset($employee->current_address)? $employee->current_address:''}}"
                                                 data-permanentaddress="{{isset($employee->permanent_address) ? $employee->permanent_address:''}}">
                                        <span style="font-size: 11px">Edit</span>
                                    </i>
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
                                        <td>{{isset($employee->kin_name) ? $employee->kin_name:''}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-envelope-o"></i>
                                        </td>
                                        <td><strong>Email Address</strong></td>
                                        <td>{{isset($employee->user->email) ? $employee->user->email:''}}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-mobile-phone"></i>
                                        </td>
                                        <td><strong>Cellphone</strong></td>
                                        <td>{{isset($employee->phone_number) ? $employee->phone_number:''}}</td>
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
                                        <td>{{isset($employee->current_address) ? $employee->current_address:''}}</td>
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
            {{--      //personal details--}}

            {{--     employment details--}}
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-heading text-center">
                                <span style="color: black" class="panel-title">Employment Details&nbsp;&nbsp;</span>
                                <span style="font-size: 11px">
                                              <i class="fa fa-cog" data-toggle="modal" data-target="#employment"
                                                 style="font-size: 26px;color: green"
                                                 data-id="{{$employee->id}}"
                                                 data-joining="{{isset($employee->date_of_joining) ? $employee->date_of_joining:''}}"
                                                 data-station="{{isset($employee->duty_station) ? $employee->duty_station: ''}}"
                                                 data-posted="{{isset($employee->posted_date) ? $employee->posted_date: ''}}"
                                                 data-notice="{{isset($employee->notice_period) ? $employee->notice_period: ''}}"
                                                 data-resignation="{{isset($employee->date_of_resignation) ? $employee->date_of_resignation: ''}}"
                                                 data-last="{{isset($employee->last_working_day) ? $employee->last_working_day: ''}}">
                                      <span style="font-size: 11px">Edit</span>
                                    </i>
                                    </span>
                            </div>
                        </div>
                        <div class="panel-body pn pb5">
                            <hr class="short br-lighter">

                            <div class="box-body no-padding">
                                <table class="table">
                                    <tbody>
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
            {{--    // employment details--}}

            {{--      qualifications details--}}
            <div class="col-md-12">
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
            {{--     // qualifications details--}}

        </div>
    </section>

    <!--Profile User Modal -->
    <div class="modal fadeIn" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalCenter">
                        <div style="background-color: #67d3e0" class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalCenter">Edit Email Address</h5>
                            <button style="font-size: 30px; margin-top: -30px" type="button" class="close mt-lg-3" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </h5>
                </div>
                <div class="modal-body">

                    {!! Form::open(['action' => ['ProfileController@editProfile', isset($employee->id) ? $employee->id:''],'method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data','class' => 'form-horizontal','id'=>"custom-form-wizard"]) !!}
                    {{Form::hidden('id', isset($employee->id) ? $employee->id:'' ,['value' =>'','name' => 'id','id'=>'employee_id'])}}
                    <div class="form-control" style="border: 0;margin-top: -16px">
                        <div class="col-xs-4 text-center"><h6>Email Address: </h6></div>
                        <div class="col-xs-8">
                            <input type="email" name="email" class="form-control text-center" id="email">
                        </div>
                    </div><br>
                </div>

                <div class="modal-footer" style="margin-top: 15px">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input class="btn btn-primary" type="submit" name="SUBMIT" value="Submit" onclick="this.value='Submitting ..';this.disabled='disabled'; this.form.submit();" />
                </div>
                {{Form::hidden('_method','PUT')}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{--   <! -- /Modal -->--}}

        <!--Profile Photo Modal -->
        <div class="modal fadeIn" id="profilePic" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalCenter">
                            <div style="background-color: #67d3e0" class="modal-header">
                                <h5 class="modal-title text-center" id="exampleModalCenter">Change Profile Picture</h5>
                                <button style="font-size: 30px; margin-top: -30px" type="button" class="close mt-lg-3" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </h5>
                    </div>
                    <div class="modal-body">

                        {!! Form::open(['action' => ['ProfileController@editProfilePic', isset($employee->id) ? $employee->id:''],'method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data','class' => 'form-horizontal','id'=>"custom-form-wizard"]) !!}
                        {{Form::hidden('id', isset($employee->id) ? $employee->id:'' ,['value' =>'','name' => 'id','id'=>'employee_id'])}}
                        <div class="form-control" style="border: 0px">
                            <div style="margin-top: -10px" class="col-xs-4 text-center"><h6>Upload Profile Photo: </h6></div>
                            <div class="col-xs-8">
                                {{Form::file('photo',['id'=>'cover_image'])}}
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer" style="margin-top: 10px">
                        {{Form::submit('Submit', ['class'=>'btn btn-primary','id'=>'sub-btn'])}}
                    </div>
                    {{Form::hidden('_method','PUT')}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        {{--   <! -- /Modal -->--}}


    <!-- Bank Modal -->
    <div class="modal fadeIn" id="bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
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

                    <div class="form-control" style="border: 0;margin-top: -16px">
                        <div class="col-xs-4 text-center"><h6>Account Number: </h6></div>
                        <div class="col-xs-8">
                            <input type="number" class="form-control text-center" id="account_number" name="account_number">
                        </div>
                    </div><br>
                    <div class="form-control" style="border: 0;margin-top: -6px">
                        <div class="col-xs-4 text-center"><h6>Bank Name: </h6></div>
                        <div class="col-xs-8">
                            <input type="text" name="bank_name" class="form-control text-center" id="bank_name">
                        </div>
                    </div>
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


    <!-- Personal Modal -->
    <div class="modal fadeIn" id="personal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
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
                <div class="modal-body" style="height: 900px">

                    {!! Form::open(['action' => ['ProfileController@editPersonal', isset($employee->id) ? $employee->id:''],'method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data','class' => 'form-horizontal','id'=>"custom-form-wizard"]) !!}
                    {{Form::hidden('id', isset($employee->id) ? $employee->id:'' ,['value' =>'','name' => 'id','id'=>'employee_id'])}}
                    {{--                    <input type="hidden" name="id" id="id" value="">--}}

                    <div class="" style="margin-top: -5px; height: 60px">
                        <button type="button" class="btn btn-default col-xs-6" style="margin-top: -6px"data-dismiss="modal">Close</button>
                        <input class="btn btn-primary col-xs-6" type="submit" style="margin-top: -6px; text-align: center !Important" name="SUBMIT" value="Submit" onclick="this.value='Submitting ..';this.disabled='disabled'; this.form.submit();" />
                    </div>
                    <div class="form-control" style="border: 0;margin-top: -16px">
                        <div class="col-xs-4 text-center"><h6>Birthday: </h6></div>
                        <div class="col-xs-8">
                            <input type="date" name="date_of_birth" class="form-control text-center" id="date_of_birth">
                        </div>
                    </div><br>
                    <div class="form-control" style="border: 0;margin-top: -16px">
                        <div class="col-xs-4 text-center"><h6>Kin's Name </h6></div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control text-center" id="kin_name" name="kin_name">
                        </div>
                    </div><br>
                    <div class="form-control" style="border: 0;margin-top: -6px">
                        <div class="col-xs-4 text-center"><h6>Phone Number: </h6></div>
                        <div class="col-xs-8">
                            <input type="number" class="form-control text-center" id="phone" name="phone">
                        </div>
                    </div><br>

                    <div class="form-control" style="border: 0;margin-top: -7px">
                        <div class="col-xs-4 text-center"><h6>Emergency Contact: </h6></div>
                        <div class="col-xs-8">
                            <input type="number" class="form-control text-center" id="emergency" name="emergency">
                        </div>
                    </div><br>

                    <div class="form-control" style="border: 0;margin-top: -7px">
                        <div class="col-xs-4 text-center"><h6>Current Address </h6></div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control text-center" id="current_address" name="current_address">
                        </div>

                    </div><br>
                    <div class="form-control" style="border: 0;margin-top: -7px">
                        <div class="col-xs-4 text-center"><h6>Permanent Address </h6></div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control text-center" id="permanent_address" name="permanent_address">
                        </div>
                    </div><br>

                    <div class="col-xs-4 text-center" style="border: 0;margin-top: -4px"><h6>Qualifications </h6></div>
                    <div class="form-control" style="border: 0;margin-top: -4px">
                        <div class="col-xs-12">
                            {{Form::textarea('qualification', $employee->qualification,['class' => 'select2-single form-control','rows'=>'7','id'=>'editor1','required'])}}
                        </div>
                    </div>
                </div>

                {{Form::hidden('_method','PUT')}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{--   <! -- /Modal -->--}}

    <!-- Employment Modal -->
    <div class="modal fadeIn" id="employment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
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

                    <div class="form-control" style="border: 0;margin-top: -16px">
                        <div class="col-xs-4 text-center"><h6>Date Joined: </h6></div>
                        <div class="col-xs-8">
                            <input type="date" name="date_of_joining" class="form-control text-center" id="date_of_joining">
                        </div>
                    </div><br>
                    <div class="form-control" style="border: 0;margin-top: -6px">
                        <div class="col-xs-4 text-center"><h6>Station Posted</h6></div>
                        <div class="col-xs-8">
                            <input type="text" class="form-control text-center" id="duty_station" name="duty_station">
                        </div>
                    </div><br>
                    <div class="form-control" style="border: 0;margin-top: -6px">
                        <div class="col-xs-4 text-center"><h6>Date Posted: </h6></div>
                        <div class="col-xs-8">
                            <input type="date" name="posted_date" class="form-control text-center" id="posted_date">
                        </div>
                    </div><br>
                    <div class="form-control" style="border: 0">
                        <div class="col-xs-4 text-center"><h6>Resignation Date </h6></div>
                        <div class="col-xs-8">
                            <input type="date" name="date_of_resignation" class="form-control text-center" id="date_of_resignation">
                        </div>
                    </div><br>
                    <div class="form-control" style="border: 0">
                        <div class="col-xs-4 text-center"><h6>Notice Period: </h6></div>
                        <div class="col-xs-8">
                            <input type="number" placeholder="1-3 months" class="form-control text-center" id="notice_period" name="notice_period">
                        </div>
                    </div><br>
                    <div class="form-control" style="border: 0">
                        <div class="col-xs-4 text-center"><h6>Last Working Day </h6></div>
                        <div class="col-xs-8">
                            <input type="date" name="last_working_day" class="form-control text-center" id="last_working_day">
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

{{--    css to display text over profile picture--}}
<style>
    /* Parent Container */
    .content_img{

    }
    /* Child Text Container */
    .content_img div{
        background: black;
        color: white;
        margin-bottom: 1px;
        opacity: 0;
        font-family: sans-serif;
        visibility: hidden;
        -webkit-transition: visibility 0s, opacity 0.5s linear;
        transition: visibility 0s, opacity 0.5s linear;
    }

    /* Hover on Parent Container */
    .content_img:hover{
        cursor: pointer;
        opacity: 0.5;
    }

    .content_img:hover div{
        width: 180px;
        text-align: center;
        padding: 8px 15px;
        visibility: visible;
        opacity: 1;
    }
</style>
    {{--   // css to display text over profile picture--}}

    <script>
        $('#profile').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)

            var id = button.data('id')
            var email = button.data('email')

            var modal = $(this)

            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #email').val(email);
        })
    </script>

    <script>
        $('#profilePic').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)

            var id = button.data('id')
            var photo = button.data('photo')

            var modal = $(this)

            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #photo').val(photo);
        })
    </script>

    <script>
        $('#bank').on('show.bs.modal', function (event) {

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

            var button = $(event.relatedTarget)

            var id = button.data('id')
            var birthday = button.data('birthday')
            var phone = button.data('phone')
            var emergency = button.data('emergency')
            var kin_name = button.data('kinname')
            var qualification = button.data('qualification')
            var current_address = button.data('currentaddress')
            var permanent_address = button.data('permanentaddress')
            var modal = $(this)

            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #date_of_birth').val(birthday);
            modal.find('.modal-body #email').val(email);
            modal.find('.modal-body #phone').val(phone);
            modal.find('.modal-body #emergency').val(emergency);
            modal.find('.modal-body #kin_name').val(kin_name);
            modal.find('.modal-body #qualification').val(qualification);
            modal.find('.modal-body #current_address').val(current_address);
            modal.find('.modal-body #permanent_address').val(permanent_address);
        })
    </script>

    <script>
        $('#employment').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)

            var id = button.data('id')
            var date_of_joining = button.data('joining')
            var duty_station = button.data('station')
            var posted_date = button.data('posted')
            var notice_period = button.data('notice')
            var date_of_resignation = button.data('resignation')
            var last_working_day = button.data('last')
            var modal = $(this)

            modal.find('.modal-body #id').val(id);

            modal.find('.modal-body #date_of_joining').val(date_of_joining);
            modal.find('.modal-body #duty_station').val(duty_station);
            modal.find('.modal-body #posted_date').val(posted_date);
            modal.find('.modal-body #notice_period').val(notice_period);
            modal.find('.modal-body #date_of_resignation').val(date_of_resignation);
            modal.find('.modal-body #last_working_day').val(last_working_day);
        })
    </script>
    <script>
        $("#sub-btn").click(function(e) {
            var photo = document.getElementById("cover_image");

            let photoSize = photo.files[0].size;

            if (photoSize > 2000000) {
                alert("Profile Photo exceeds 2Mb");
                e.preventDefault();
            }
        });
    </script>

@endsection


