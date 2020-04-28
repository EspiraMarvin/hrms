@extends('inc.base')

@section('content')
    <!-- START CONTENT -->
    <div class="content">

        <header id="topbar" class="alt">

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
                    <a href=""> Awards </a>
                </li>
                <li class="breadcrumb-current-item"> Edit Assigned Award details of {{$awardAssign->employee->name}} {{$awardAssign->award->award}} </li>
            </ol>
        </header>
        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn" >
            <!-- -------------- Column Center -------------- -->
            <div class="chute-affix"  data-offset-top="200">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title hidden-xs"> Assign Award</span>
                                </div>

                                <div class="panel-body pn">
                                    <div class="table-responsive">
                                        <div class="panel-body p25 pb10">
                                            @include('inc.messages')

                                            {!! Form::open(['action' => ['AwardsController@updateAssigned',$awardAssign->id],'method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data']) !!}

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Employee </label>
                                                <div class="col-md-6">
                                                    <input type="text" disabled class="typeahead form-control" value="{{$awardAssign->employee->name}}" name="employee" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('award_id') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Select Award </label>
                                                <div class="col-md-6">
                                                    <select disabled class="selectpicker form-control" name="award_id" required>
                                                        <option value="{{$awardAssign->award->id}}" >{{$awardAssign->award->award}}</option>
                                                        @if(!empty($awards) && count($awards) > 0)
                                                            @foreach($awards as $award)
                                                                <option value="{{$award->id}}">{{$award->award}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <small class="text-danger">{{ $errors->first('award_id') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
                                                <label for="datepicker1" class="col-md-3 control-label"> Date </label>
                                                <div class="col-md-6">
                                                    {{Form::date('date', $awardAssign->date, ['class' => 'select2-single form-control','placeholder'=>'Date','required'])}}
                                                    <small class="text-danger">{{ $errors->first('date') }}</small>
                                                </div>
                                            </div>

                                            <div class="form-group {{ $errors->has('reason') ? ' has-error' : '' }}">
                                                <label class="col-md-3 control-label"> Reason </label>
                                                <div class="col-md-6">
                                                    {{Form::text('reason', $awardAssign->reason, ['class' => 'select2-single form-control','placeholder'=>'Reason','required'])}}
                                                    <small class="text-danger">{{ $errors->first('reason') }}</small>
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

    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";
        $('input.typeahead').typeahead({
            source:  function (query, process) {
                return $.get(path, { query: query }, function (data) {
                    return process(data);
                });
            }
        });
    </script>
@endsection


