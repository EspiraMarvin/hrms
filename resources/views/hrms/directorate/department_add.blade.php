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
                            <a href=""> Department </a>
                        </li>
                        <li class="breadcrumb-current-item"> Add Department</li>
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
                                            @include('inc.messages')

                                            {!! Form::open(['action' => 'DepartmentsController@store','method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}

                                            <div class="form-group {{ $errors->has('directorate_id') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Select Directorate </label>
                                                <div class="col-md-6">
                                                    <select class="selectpicker form-control"
                                                            name="directorate_id" required>
                                                        <option value="" selected>Select One</option>
                                                          @if(!empty($directorate) && count($directorate) > 0)
                                                              @foreach($directorate as $dir)
                                                                  <option value="{{$dir->id}}">{{$dir->name}}</option>
                                                              @endforeach
                                                          @endif
                                                    </select>
                                                    <small class="text-danger">{{ $errors->first('directorate_id') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('department') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Department Name </label>
                                                <div class="col-md-6">
                                                    {{Form::text('department', '',['class' => 'select2-single form-control','placeholder'=>'Department'])}}
                                                    <small class="text-danger">{{ $errors->first('department') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Description </label>
                                                <div class="col-md-6">
                                                    {{Form::textarea('description', '',['class' => 'select2-single form-control','rows'=>'3','id'=>'textarea1','placeholder'=>'Department Description','required'])}}
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
                                                    <input type="reset" class="btn btn-bordered btn-success btn-block"  value="Reset" />
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
            </div>
        </section>
    </div>

@endsection
