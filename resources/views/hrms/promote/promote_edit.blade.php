@extends('inc.base')

@section('content')
    <!-- START CONTENT -->
    <div class="content">

        <header id="topbar" class="alt">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="breadcrumb-icon">
                        <a href="/dashboard">
                            <span class="fa fa-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-active">
                        <a href="/dashboard"> Dashboard </a>
                    </li>
                    <li class="breadcrumb-link">
                        <a href=""> Promotion </a>
                    </li>
                    <li class="breadcrumb-current-item"> Promote</li>
                    <li class="breadcrumb-current-item"> Promotion Details of {{$user->name}} </li>
                </ol>
            </div>
        </header>
        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn">
            <!-- -------------- Column Center -------------- -->
            <div class="chute-affix" data-offset-top="200">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title hidden-xs"> Promote </span>
                                </div>

                                <div class="panel-body pn">
                                    <div class="table-responsive">
                                        <div class="panel-body p25 pb10">
                                            @include('inc.messages')

                                            {!! Form::open(['action' => ['PromoteController@storePromotion',$user->id],'method' => 'POST','enctype'=>'multipart/form-data','class' => 'form-horizontal','id'=>"custom-form-wizard"]) !!}

                                            <div class="form-group {{ $errors->has('user_id') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Employee Name </label>
                                                <div class="col-md-6">
                                                    <select class="select2-single form-control select-primary"
                                                            name="user_id" readonly required>
                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                    </select>
                                                    <small class="text-danger">{{ $errors->first('user_id') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Old Designation </label>
                                                <div class="col-md-6">
                                                    <?php
                                                    if (isset($user->roles[0]->role)){

                                                    if ($user->roles[0]->role != "Supervisor"){?>

                                                        <input type="text" id="old_designation"
                                                               value="{{$user->roles[0]->role ? $user->roles[0]->role:''}}"
                                                               class="form-control" name="old_designation" readonly required>

                                                    <?php  }else{    ?>
                                                        <input type="text" id="old_designation"
                                                               value="{{$user->roles[1]->role ? $user->roles[1]->role:''}}"
                                                               class="form-control" name="old_designation" readonly required>
{{--                                                    {{isset($emp->roles[1]->role) ? $emp->roles[1]->role:''}}--}}
                                                    <?php }
                                                    } ?>

                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('new_designation') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Select New Role </label>
                                                <div class="col-md-6">
                                                    <select class="selectpicker form-control"
                                                            name="new_designation" required>
                                                        <option value="" selected>Select New Role</option>
                                                        @foreach($roles as $role)
                                                            <option value="{{$role->id}}">{{$role->role}}</option>
                                                        @endforeach
                                                    </select>
                                                    <small class="text-danger">{{ $errors->first('new_designation') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="datepicker1" class="col-md-3 control-label"> Old
                                                    Salary </label>
                                                <div class="col-md-6">
                                                    <input type="text" id="old_salary" value="{{$user->salary}}"
                                                           class="form-control" name="old_salary" readonly required>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('new_salary') ? ' has-error' : '' }}">
                                                <label for="datepicker1" class="col-md-3 control-label">Enter New
                                                    Salary </label>
                                                <div class="col-md-6">
                                                    <input type="text" id="new_salary" class="form-control" name="new_salary" required>
                                                    <small class="text-danger">{{ $errors->first('new_salary') }}</small>
                                                </div>
                                            </div>


                                            <div class="form-group {{ $errors->has('promotion_date') ? ' has-error' : '' }}">
                                                <label for="datepicker1" class="col-md-3 control-label"> Promotion
                                                    Date</label>
                                                <div class="col-md-6">
                                                    {{Form::date('promotion_date', '',['class' => 'form-control','placeholder'=>'Date of Promotion','required'])}}
                                                    <small class="text-danger">{{ $errors->first('promotion_date') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-2">
                                                    <input class="btn btn-bordered btn-info btn-block" type="submit" name="SUBMIT" value="Submit" onclick="this.value='Submitting ..';this.disabled='disabled'; this.form.submit();" />
{{--                                                    <input type="submit" class="btn btn-bordered btn-info btn-block" value="Submit">--}}
                                                </div>
                                                <div class="col-md-2"><a href="/promote_add">
                                                        <input type="button"
                                                               class="btn btn-bordered btn-success btn-block"
                                                               value="Reset"></a></div>
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
@endsection

