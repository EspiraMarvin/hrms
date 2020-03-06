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
                    <li class="breadcrumb-current-item"> Edit Department </li>
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
                                            {!! Form::open(['action' => ['DepartmentsController@update',$department->id],'method' => 'POST','enctype'=>'multipart/form-data','class' => 'form-horizontal','id'=>"custom-form-wizard"]) !!}

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Select Directorate </label>
                                                <div class="col-md-6">
                                                    <select class="select2-multiple form-control select-primary"
                                                            name="directorate">
                                                        <option value="{{$department->directorate}}" selected>{{$department->directorate}}</option>
                                                        @if(!empty($directorate) && count($directorate) > 0)

                                                        @foreach($directorate as $dir)
                                                                <option value="{{$dir->name}}">{{$dir->name}}</option>
                                                            @endforeach
                                                        @endif

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Directorate Name </label>
                                                <div class="col-md-6">
                                                    {{Form::text('name',$department->name,['class' => 'select2-single form-control','placeholder'=>'Directorate','required'])}}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Description </label>
                                                <div class="col-md-6">
                                                    {{Form::textarea('description',$department->description,['class' => 'select2-single form-control','rows'=>'3','id'=>'textarea1','placeholder'=>'Directorate Description','required'])}}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-2">
                                                    {{Form::submit('Submit', ['class'=>'btn btn-bordered btn-info btn-block'])}}
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
