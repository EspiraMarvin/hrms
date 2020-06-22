@extends('inc.base')
@section('content')
    <!-- START CONTENT -->
    <div class="content">


        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn" >
            <!-- -------------- Column Center -------------- -->
            <div class="chute-affix"  data-offset-top="200">
                <div class="row">

                    <div class="col-xs-12">
                        <div class="panel">
                            <div class="panel-heading">

                                <span class="panel-title hidden-xs"> Change Password </span>
                            </div>

                            <div class="panel-body pn">
                                <div class="table-responsive">
                                    <div class="panel-body p25 pb10">
                                        <div class="container">
                                            @include('inc.messages')
                                        </div>

                                        {!! Form::open(['action' => ['AuthController@processChangePassword'],'method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data','class' => 'form-horizontal','id'=>"custom-form-wizard"]) !!}
                                        <div class="form-group {{ $errors->has('current') ? ' has-error' : '' }}">
                                            <label class="col-md-3 control-label"> Enter Old Password </label>
                                            <div class="col-md-6">
                                                <input type="password" name="old" id="old_password" class="select2-single form-control" placeholder="Old password">
                                            </div>
                                            <small class="text-danger">{{ $errors->first('current') }}</small>
                                        </div>

                                        <div class="form-group {{ $errors->has('new') ? ' has-error' : '' }}">
                                            <label class="col-md-3 control-label"> Enter New Password </label>
                                            <div class="col-md-6">
                                                <input type="password" name="new" id="newPassword" class="select2-single form-control" placeholder="New password">
                                            </div>
                                            <small class="text-danger">{{ $errors->first('new') }}</small>
                                        </div>
                                        <div class="form-group {{ $errors->has('confirm') ? ' has-error' : '' }}">
                                            <label class="col-md-3 control-label"> Confirm New Password </label>
                                            <div class="col-md-6">
                                                <input type="password" name="confirm" id="confirmPassword" class="select2-single form-control" placeholder="Confirm password">
                                            </div>
                                            <small class="text-danger">{{ $errors->first('confirm') }}</small>
                                        </div>

                                         <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-2">
                                                    {{Form::submit('Submit', ['class'=>'btn btn-bordered btn-info btn-block','id'=>'sub-btn'])}}
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="reset" class="btn btn-bordered btn-success btn-block"
                                                           value="Reset"/>
                                                </div>
                                         </div>
                                        {!! Form::close() !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>
    <script>
        $("#sub-btn").click(function(e) {
    var newPassword = document.getElementById('newPassword').value;
    var confirmPassword = document.getElementById("confirmPassword").value;

    if (newPassword != confirmPassword) {
    alert("Passwords Do Not Match");
    e.preventDefault();
    }
    });
    </script>

@endsection
