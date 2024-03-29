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
                        <a href=""> Asset </a>
                    </li>
                    <li class="breadcrumb-current-item"> Add Asset</li>
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
                                    <span class="panel-title hidden-xs col-md-6"> Add Asset </span>
                                    <div class="col-md-6">
                                        <form action="{{ url('import-asset') }}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div style="border: 0px">
                                                <div class="col-sm-7">
                                                    <input type="file" class="gui-input fs13" name="import_file" id="import_file">
                                                </div>
                                                <div class="col-sm-5" >
                                                    <input class="btn btn-primary" type="submit" name="SUBMIT"
                                                           value="Import Assets" onclick="this.value='Importing ..';this.disabled='disabled'; this.form.submit();" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="panel-body pn mt70">
                                    <div class="table-responsive">
                                        <div class="panel-body p25 pb10">
                                            @include('inc.messages')
                                            {!! Form::open(['action' => 'AssetsController@store','method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}

                                            <div class="form-group {{ $errors->has('asset') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Asset </label>
                                                <div class="col-md-6">
                                                    {{Form::text('asset', '',['class' => 'select2-single form-control','placeholder'=>'Asset','required'])}}
                                                    <small class="text-danger">{{ $errors->first('asset') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('serial_number') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Serial Number </label>
                                                <div class="col-md-6">
                                                    {{Form::text('serial_number', '',['class' => 'select2-single form-control','placeholder'=>'Serial Number','required'])}}
                                                    <small class="text-danger">{{ $errors->first('serial_number') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Description </label>
                                                <div class="col-md-6">
                                                    {{Form::textarea('description', '',['class' => 'select2-single form-control','rows'=>'3','id'=>'textarea1','placeholder'=>'Asset Description','required'])}}
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
