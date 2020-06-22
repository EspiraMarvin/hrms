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
                                    <span class="panel-title hidden-xs"> Approve Leave Lists </span><br/>
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
                                                <input type="reset"
                                                       style="height: 40px"
                                                       value="Reset" name="button" class="btn btn-warning">
                                            </div>
                                        </form>


                                    </div>
                                </div>

                                <div class="panel-body pn">
                                    @include('inc.messages')

                                    @if($totalLeaves > 0 && $totalLeaves === 1)
                                        <div class="alert alert-danger text-center" role="alert">
                                            You have {{$totalLeaves}} Pending Leave
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        </div>
                                    @elseif($totalLeaves > 0 && $totalLeaves > 1)
                                        <div class="alert alert-danger text-center" role="alert">
                                            You have {{$totalLeaves}} Pending Leaves
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
                                                <th class="text-center">Sup1</th>
                                                <th class="text-center">Sup2</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0;?>
                                            @if(count($approve) > 0)
                                                @foreach($approve as $app)
                                                    <tr>
                                                        <td class="text-center">{{$i+=1}}</td>
                                                        <td class="text-center">{{$app->user->name}}</td>
                                                        <td class="text-center">{{$app->leaves->leave_type}}</td>
                                                        <td class="text-center">{{date_format(new DateTime($app->date_from),'d-m-Y')}}</td>
                                                        <td class="text-center">{{date_format(new DateTime($app->date_to),'d-m-Y')}}</td>
                                                        <td class="text-center">{{$app->number_of_days}}</td>
                                                        <td class="text-center">{{$app->reason}}</td>
                                                        <td class="text-center">{{$app->created_at}}</td>
                                                        @if($app->status1 === 0)
                                                            <td class="text-center">Pending</td>
                                                        @elseif($app->status1 === 1)
                                                            <td class="text-center">Approved</td>
                                                        @else
                                                            <td class="text-center">Declined</td>
                                                        @endif
                                                        @if($app->status2 === 0)
                                                            <td class="text-center">Pending</td>
                                                        @elseif($app->status2 === 1)
                                                            <td class="text-center">Approved</td>
                                                        @else
                                                            <td class="text-center">Declined</td>
                                                        @endif
                                                        <td class="text-center">
                                                            @if($totalLeaves > 0 && $app->status1 === 0 && $app->status2 === 0
                                                                || $totalLeaves > 0 && $app->status1 === 1 && $app->status2 === 0
                                                                || $totalLeaves > 0 && $app->status1 === 0 && $app->status2 === 1
                                                                || $totalLeaves > 0 && $app->status1 === 2 && $app->status2 === 0
                                                                || $totalLeaves > 0 && $app->status1 === 0 && $app->status2 === 2)
                                                                <button type="button" style="height: 30px;background-color: #06b6ef"
                                                                        data-appid="{{$app->id}}" data-userid="{{$app->user_id}}"
                                                                        data-phone="{{$app->user->employee->phone_number}}"
                                                                        data-remarks="{{$app->remarks}}" data-status="{{$app->status1}}"
                                                                        data-type="{{$app->leaves->leave_type}}" data-name="{{$app->employee_name}}"
                                                                        data-applied="{{date_format(new DateTime($app->created_at), 'd-m-Y H:i:s')}}"
                                                                        class="btn btn br2 btn-xs fs12" data-toggle="modal"
                                                                        data-target="#approve">
                                                                    <i class="fa fa-external-link" style="color: white">
                                                                        Pending </i>
                                                                </button>
                                                            @elseif($app->status1 === 1 && $app->status2 === 1)
                                                                <button type="button" disabled style="height: 30px;background-color: #03b25e"
                                                                        data-appid="{{$app->id}}" data-userid="{{$app->user_id}}"
                                                                        data-remarks="{{$app->remarks}}" data-status="{{$app->status}}"
                                                                        data-type="{{$app->leaves->leave_type}}" data-name="{{$app->employee_name}}"
                                                                        data-applied="{{date_format(new DateTime($app->created_at), 'd-m-Y H:i:s')}}"
                                                                        class="btn btn br2 btn-xs fs12" data-toggle="modal"
                                                                        data-target="#approve">
                                                                    <i style="color: white" class="fa fa-check" >
                                                                        Approved </i>
                                                                </button>
                                                            @elseif($totalLeaves === 0 &&  $app->status1 === 2 && $app->status2 === 2 || $totalLeaves > 0 && $app->status1 === 1 && $app->status2 === 2 || $totalLeaves > 0 && $app->status1 === 2 && $app->status2 === 1)
                                                                <button type="button" disabled style="height: 30px;background-color: #f5393d"
                                                                        data-appid="{{$app->id}}" data-userid="{{$app->user_id}}"
                                                                        data-remarks="{{$app->remarks}}" data-status="{{$app->status}}"
                                                                        data-type="{{$app->leaves->leave_type}}" data-name="{{$app->employee_name}}"
                                                                        data-applied="{{date_format(new DateTime($app->created_at), 'd-m-Y H:i:s')}}"
                                                                        class="btn btn br2 btn-xs fs12" data-toggle="modal"
                                                                        data-target="#approve">
                                                                    <i class="fa fa-times" style="color: white">
                                                                        Declined </i>
                                                                </button>
                                                            @elseif($app->status1 === 1 && $app->status2 === 2 || $app->status1 === 2 && $app->status2 === 1)
                                                                <button type="button" disabled style="height: 30px;background-color: #f5393d"
                                                                        class="btn btn br2 btn-xs fs12">
                                                                    <i class="fa fa-times" style="color: white">
                                                                        Conflict </i>
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
                                    {{Form::hidden('id', isset($app->user_id) ? $app->user_id:'' ,['value' =>'','name' => 'user_id','id'=>'user_id'])}}
                                    {{--                    <input type="hidden" name="id" id="app_id" value="">--}}
                                    <div class="form-control" style="border: 0;margin-top: -16px">
                                        <div class="col-xs-4 text-center"><h6>Leave Type: </h6></div>
                                        <div class="col-xs-8">
                                            <input style="border: 0" type="text" disabled class="form-control text-center" id="type">
                                        </div>
                                    </div><br>
                                    <div class="form-control" style="border: 0;">
                                        <div class="col-xs-4 text-center"><h6>Applied on: </h6></div>
                                        <div class="col-xs-8">
                                            <input style="border: 0" type="text" disabled class="form-control text-center" id="applied">
                                        </div>
                                    </div><br>
                                    <div class="form-control" style="border: 0;">
                                        <div class="col-xs-4 text-center"><h6>Phone No: </h6></div>
                                        <div class="col-xs-8">
                                            <input style="border: 0" type="number" disabled class="form-control text-center" id="phone_number">
                                        </div>
                                    </div><br>
                                    <div class="form-control" style="border: 0;">
                                        <div class="col-xs-4 text-center"><h6>Remarks: </h6></div>
                                        <div class="col-xs-8">
                                            <textarea rows="1" cols="10" id="remarks" name="remarks" class="form-control"></textarea>
                                        </div>
                                    </div><br>
                                    <div class="form-control text-center" style="border: 0;">
                                        <div class="col-xs-4 text-center"><h6>Status: </h6></div>
                                        <div class="col-xs-8">
                                            <select name="status" style="height: 30px; text-align: center" id="status"
                                                    class="btn btn-info br2 btn-xs fs14 dropdown-toggle form-control">
                                                    <option value="0" style="background-color: #67d3e0;">Pending</option>
                                                    <option value="1" style="background-color: seagreen">Approve</option>
                                                    <option value="2" style="background-color: red">Disapprove</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
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
            var user_id = button.data('userid')
            var type = button.data('type')
            var name = button.data('name')
            var applied = button.data('applied')
            var phone = button.data('phone')
            var remarks = button.data('remarks')
            var status = button.data('status')
            var modal = $(this)

            modal.find('.modal-header #name').val(name);
            modal.find('.modal-body #app_id').val(app_id);
            modal.find('.modal-body #user_id').val(user_id);
            modal.find('.modal-body #type').val(type);
            modal.find('.modal-body #applied').val(applied);
            modal.find('.modal-body #phone_number').val(phone);
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
@endsection

