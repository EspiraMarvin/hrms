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
                        <a href=""> Leaves </a>
                    </li>
                    <li class="breadcrumb-current-item"> Approve Leave Requests</li>
                </ol>
            </div>
        </header>


        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn">

            <!-- -------------- Column Center -------------- -->
            <div class="chute chute-center">

                <!-- -------------- Products Status Table -------------- -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title hidden-xs"> Total Leave Lists </span><br/>
                                </div>
                                <br/>

                                <div class="panel-menu allcp-form theme-primary mtn">
                                    <div class="row">
                                        <form action="/leave_search" method="GET" role="search">
                                            {{ csrf_field() }}
                                            <div class="col-md-6">
                                                <input type="text" class="typeahead form-control"
                                                       placeholder="Search any column" style="height:40px" value=""
                                                       name="p" autocomplete="off">
                                            </div>

                                            <div class="col-md-2">
                                                <input type="submit" value="Search" name="button"
                                                       class="btn btn-primary">
                                            </div>

                                            <div class="col-md-2">
                                                <input type="submit" value="Export" name="button"
                                                       class="btn btn-success">
                                            </div>
                                        </form>

                                        <div class="col-md-2">
                                            <a href="/total_leave_list"><input type="submit" value="Reset"
                                                                               class="btn btn-warning"></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel-body pn">
                                    @include('inc.messages')
                                    @if(count($pending ?? '') > 0 && count($pending) == 1)
                                        <div class="alert alert-danger text-center" role="alert">
                                            You have <?php echo count($pending);?> Pending Leave
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        </div>
                                     @elseif(count($pending ?? '') > 0 && count($pending) > 1)
                                        <div class="alert alert-danger text-center" role="alert">
                                            You have <?php echo count($pending);?> Pending Leaves
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        </div>
                                    @endif

                                    <div class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Employee</th>
                                                <th class="text-center">Leave Type</th>
                                                <th class="text-center">Date From</th>
                                                <th class="text-center">Date To</th>
                                                <th class="text-center">Days</th>
                                                <th class="text-center">Reason</th>
                                                <th class="text-center">Applied</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0;?>
                                            @if(count($approve) > 0)
                                                @foreach($approve as $app)
                                                    <tr>
                                                        <td class="text-center">{{$i+=1}}</td>
                                                        <td class="text-center">{{$app->employee_name}}</td>
                                                        <td class="text-center">{{$app->leaves->leave_type}}</td>
                                                        <td class="text-center">{{date_format(new DateTime($app->date_from),'d-m-Y')}}</td>
                                                        <td class="text-center">{{date_format(new DateTime($app->date_to),'d-m-Y')}}</td>
                                                        <td class="text-center">{{$app->number_of_days}}</td>
                                                        <td class="text-center">{{$app->reason}}</td>
                                                        <td class="text-center">{{$app->created_at}}</td>
                                                        <td class="text-center">
                                                            @if($app->status === 0)
                                                                <button type="button" style="height: 30px;background-color: #06b6ef"
                                                                        data-appid="{{$app->id}}" data-employeeid="{{$app->employee_id}}"
                                                                        data-remarks="{{$app->remarks}}" data-status="{{$app->status}}"
                                                                        data-type="{{$app->leaves->leave_type}}" data-name="{{$app->employee_name}}"
                                                                        data-applied="{{date_format(new DateTime($app->created_at), 'd-m-Y H:i:s')}}"
                                                                        data-department="{{$app->employee->department}}"
                                                                        data-jobgroup="{{$app->employee->job_group}}"
                                                                        data-phone="{{$app->employee->phone_number}}"
                                                                        class="btn btn br2 btn-xs fs12" data-toggle="modal"
                                                                        data-target="#approve">
                                                                    <i class="fa fa-external-link" style="color: white">
                                                                        Pending </i>
                                                                </button>
                                                            @elseif($app->status === 1)
                                                                <button type="button" disabled style="height: 30px;background-color: #03b25e"
                                                                        data-appid="{{$app->id}}" data-employeeid="{{$app->employee_id}}"
                                                                        data-remarks="{{$app->remarks}}" data-status="{{$app->status}}"
                                                                        data-type="{{$app->leaves->leave_type}}" data-name="{{$app->employee_name}}"
                                                                        data-applied="{{date_format(new DateTime($app->created_at), 'd-m-Y H:i:s')}}"
                                                                        data-department="{{$app->employee->department}}"
                                                                        data-jobgroup="{{$app->employee->job_group}}"
                                                                        data-phone="{{$app->employee->phone_number}}"
                                                                        class="btn btn br2 btn-xs fs12" data-toggle="modal"
                                                                        data-target="#approve">
                                                                    <i style="color: white" class="fa fa-check" >
                                                                        Approved </i>
                                                                </button>
                                                            @elseif($app->status === 2)
                                                                <button type="button" disabled style="height: 30px;background-color: #f5393d"
                                                                        data-appid="{{$app->id}}" data-employeeid="{{$app->employee_id}}"
                                                                        data-remarks="{{$app->remarks}}" data-status="{{$app->status}}"
                                                                        data-type="{{$app->leaves->leave_type}}" data-name="{{$app->employee_name}}"
                                                                        data-applied="{{date_format(new DateTime($app->created_at), 'd-m-Y H:i:s')}}"
                                                                        data-department="{{$app->employee->department}}"
                                                                        data-jobgroup="{{$app->employee->job_group}}"
                                                                        data-phone="{{$app->employee->phone_number}}"
                                                                        class="btn btn br2 btn-xs fs12" data-toggle="modal"
                                                                        data-target="#approve">
                                                                    <i class="fa fa-times" style="color: white">
                                                                        Disapproved </i>
                                                                </button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="12">
                                                        {!! $approve->links() !!}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    @else
                                        <div class="row text-center">
                                            <p>No leaves to approve</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center" id="exampleModalCenter">
                                        <div style="background-color: #67d3e0; height: 100px" class="modal-header">
                                            <h5 class="modal-title text-center" id="exampleModalCenter">Approve Leave for</h5>
                                            <div class="col-xs-3 offset-6"></div>
                                            <div class="col-xs-6">
                                                <input style="border: 0; background-color: #67d3e0; font-size: 20px"
                                                       type="text" disabled class="form-control text-center" id="name"><br>
                                            </div>
                                            <button style="font-size: 30px; margin-top: -30px" type="button" class="close mt-lg-3" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </h5>
                                </div>
                                <div class="modal-body" style="height: 300px">

                                    {!! Form::open(['action' => ['LeavesController@approveLeave', isset($app->id) ? $app->id:''],'method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data','class' => 'form-horizontal','id'=>"custom-form-wizard"]) !!}
                                    {{Form::hidden('id', isset($app->id) ? $app->id:'' ,['value' =>'','name' => 'id','id'=>'app_id'])}}
                                    {{Form::hidden('id', isset($app->employee_id) ? $app->employee_id:'' ,['value' =>'','name' => 'employee_id','id'=>'employee_id'])}}
                                    {{--                    <input type="hidden" name="id" id="app_id" value="">--}}
                                    <div class="form-control" style="border: 0;margin-top: -16px">
                                        <div class="col-xs-6 text-center"><h6>Leave Type: </h6></div>
                                        <div class="col-xs-6">
                                            <input style="border: 0" type="text" disabled class="form-control text-center" id="type">
                                        </div>
                                    </div><br>
                                    <div class="form-control" style="border: 0;margin-top: -16px">
                                        <div class="col-xs-6 text-center"><h6>Applied on: </h6></div>
                                        <div class="col-xs-6">
                                            <input style="border: 0" type="text" disabled class="form-control text-center" id="applied">
                                        </div>
                                    </div><br>
                                    <div class="form-control" style="border: 0;margin-top: -16px">
                                        <div class="col-xs-6 text-center"><h6>Department: </h6></div>
                                        <div class="col-xs-6">
                                            <input style="border: 0" type="text" disabled class="form-control text-center" id="department">
                                        </div>
                                    </div><br>
                                    <div class="form-control" style="border: 0;margin-top: -16px">
                                        <div class="col-xs-6 text-center"><h6>Job Group: </h6></div>
                                        <div class="col-xs-6">
                                            <input style="border: 0" type="text" disabled class="form-control text-center" id="jobgroup">
                                        </div>
                                    </div><br>
                                    <div class="form-control" style="border: 0;margin-top: -16px">
                                        <div class="col-xs-6 text-center"><h6>Phone No: </h6></div>
                                        <div class="col-xs-6">
                                            <input style="border: 0" type="text" disabled class="form-control text-center" id="phone">
                                        </div>
                                    </div><br>
                                    <div class="form-control" style="border: 0;margin-top: -16px">
                                        <div class="col-xs-6 text-center"><h6>Remarks: </h6></div>
                                        <div class="col-xs-6">
                                            <textarea rows="1" cols="10" id="remarks" name="remarks" class="form-control"></textarea>
                                        </div>
                                    </div><br>
                                    <div class="form-control" style="border: 0;margin-top: -16px">
                                        <div class="col-xs-6 text-center"><h6>Status: </h6></div>
                                        <div class="col-xs-6">
                                            <select name="status" style="height: 30px; text-align: center" id="status"
                                                    class="btn btn-info br2 btn-xs fs14 dropdown-toggle form-control">
                                                @if($app->status === 0)
                                                    <option value="0" style="background-color: #67d3e0">Pending</option>
                                                    <option value="1" style="background-color: seagreen">Approve</option>
                                                    <option value="2" style="background-color: red">Disapprove</option>
                                                @elseif($app->status === 1)
                                                    <option value="1" id="status" style="background-color: seagreen">Approved</option>
                                                @elseif($app->status === 2)
                                                    <option value="2" id="status" style="background-color: red">Disapproved</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer" style="margin-top: 10px">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
                                </div>
                                {{Form::hidden('_method','PUT')}}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    {{--   <! -- /Modal -->--}}
                </div>
            </div>
        </section>
    </div>

    <script>
        $('#approve').on('show.bs.modal', function (event) {

            console.log('modal opened')

            var button = $(event.relatedTarget)

            var app_id = button.data('appid')
            var employee_id = button.data('employeeid')
            var type = button.data('type')
            var name = button.data('name')
            var applied = button.data('applied')
            var department = button.data('department')
            var jobgroup = button.data('jobgroup')
            var phone = button.data('phone')
            var remarks = button.data('remarks')
            var status = button.data('status')
            var modal = $(this)

            modal.find('.modal-header #name').val(name);
            modal.find('.modal-body #app_id').val(app_id);
            modal.find('.modal-body #employee_id').val(employee_id);
            modal.find('.modal-body #type').val(type);
            modal.find('.modal-body #applied').val(applied);
            modal.find('.modal-body #department').val(department);
            modal.find('.modal-body #jobgroup').val(jobgroup);
            modal.find('.modal-body #phone').val(phone);
            modal.find('.modal-body #remarks').val(remarks);
            modal.find('.modal-body #status').val(status);
        })
    </script>

    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";
        $('input.typeahead').typeahead({
            source: function (query, process) {
                return $.get(path, {query: query}, function (data) {
                    return process(data);
                });
            }
        });
    </script>
    <script>
        const alertHTML = '<div class="alert"></div>';
        document.body.insertAdjacentHTML('beforeend', alertHTML);
        setTimeout(() => document.querySelector('.alert').classList.add('hide'), 4000);
    </script>
@endsection

