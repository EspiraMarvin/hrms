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
                        <a href=""> Role </a>
                    </li>
                    <li class="breadcrumb-current-item"> Edit details of {{$role->role}} </li>
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
                                <div class="panel-body pn">

                                    <div class="table-responsive">
                                        <div class="panel-body p25 pb10">
                                            @include('inc.messages')

                                            {!! Form::open(['action' => ['RolesController@update',$role->id],'method' => 'POST','enctype'=>'multipart/form-data','class' => 'form-horizontal','id'=>"custom-form-wizard"]) !!}

                                            <div class="form-group {{ $errors->has('role') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Role </label>
                                                <div class="col-md-6">
                                                    {{Form::text('role', $role->role,['class' => 'select2-single form-control','placeholder'=>'Role','required'])}}
                                                    <small class="text-danger">{{ $errors->first('role') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Job Group </label>
                                                <div class="col-md-6">
                                                <select class="selectpicker form-control" name="job_group">
                                                    <option value="{{$role->job_group}}" name="employment_type">{{$role->job_group}}</option>
                                                    <option value="ICTA 1">ICTA 1</option>
                                                    <option value="ICTA 2">ICTA 2</option>
                                                    <option value="ICTA 3">ICTA 3</option>
                                                    <option value="ICTA 4">ICTA 4</option>
                                                    <option value="ICTA 5">ICTA 5</option>
                                                    <option value="ICTA 6">ICTA 6</option>
                                                    <option value="ICTA 7">ICTA 7</option>
                                                    <option value="ICTA 8">ICTA 8</option>
                                                    <option value="ICTA 9">ICTA 9</option>
                                                    <option value="ICTA 10">ICTA 10</option>
{{--                                                    <option value="ICTA 11">ICTA 11</option>--}}
{{--                                                    <option value="ICTA 12">ICTA 12</option>--}}
                                                </select>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Description </label>
                                                <div class="col-md-6">
                                                    {{Form::textarea('description', $role->description,['class' => 'select2-single form-control','rows'=>'3','id'=>'textarea1','placeholder'=>'Role Description','required'])}}
                                                    <small class="text-danger">{{ $errors->first('description') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-2">
                                                    <input class="btn btn-bordered btn-info btn-block" type="submit" name="SUBMIT" value="Submit" onclick="this.value='Submitting ..';this.disabled='disabled'; this.form.submit();" />
{{--                                                    {{Form::submit('Submit', ['class'=>'btn btn-bordered btn-info btn-block'])}}--}}

                                                </div>
                                                <div class="col-md-2">
                                                    <input type="reset" class="btn btn-bordered btn-success btn-block"
                                                           value="Reset"/>
                                                </div>
                                            </div>
                                            {{Form::hidden('_method','PUT')}}
                                            {!! Form::close() !!}
                                        </div>
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
