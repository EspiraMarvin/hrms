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
                        <a href=""> Directorate </a>
                    </li>
                    <li class="breadcrumb-current-item"> Edit details of {{$directorate->name}} </li>
                </ol>
            </div>
        </header>
        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn" >
            <!-- -------------- Column Center -------------- -->
            <div class="chute-affix" data-offset-top="200">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                            <div class="panel">
                                <div class="panel-body pn">

                                    <div class="table-responsive">
                                        <div class="panel-body p25 pb10">
                                            <div style="text-align: center">
                                                @include('inc.messages')
                                            </div>
                                            {!! Form::open(['action' => ['DirectorateController@update',$directorate->id],'method' => 'POST','enctype'=>'multipart/form-data','class' => 'form-horizontal','id'=>"custom-form-wizard"]) !!}

                                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Directorate Name </label>
                                                <div class="col-md-6">
                                                    {{Form::text('name', $directorate->name,['class' => 'select2-single form-control','placeholder'=>'Directorate','required'])}}
                                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Description </label>
                                                <div class="col-md-6">
                                                    {{Form::textarea('description', $directorate->description,['class' => 'select2-single form-control','rows'=>'3','id'=>'textarea1','placeholder'=>'Directorate Description','required'])}}
                                                    <small class="text-danger">{{ $errors->first('description') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-2">
                                                    <input class="btn btn-bordered btn-info btn-block" type="submit" name="SUBMIT" value="Submit" onclick="this.value='Submitting ..';this.disabled='disabled'; this.form.submit();" />
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="reset" class="btn btn-bordered btn-success btn-block" value="Reset" />
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