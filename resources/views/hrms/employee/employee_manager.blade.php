@extends('inc.base')

@section('content')
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
                        <a href=""> Employees </a>
                    </li>
                    <li class="breadcrumb-current-item"> Employee Manager</li>
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
                                    <span class="panel-title hidden-xs">Employee Lists (No. {{$totalEmployee}})</span>
                                </div>
                                <br/>

                                <div class="panel-menu allcp-form theme-primary mtn">
                                    <div class="row">
                                        <form action="/employee_search" method="GET" role="search">
                                            {{ csrf_field() }}
                                            <div class="col-md-6">
                                                <input type="text" class="typeahead form-control"
                                                       placeholder="Search any column" style="height:40px" value=""
                                                       name="q" autocomplete="off">
                                            </div>

                                            <div class="col-md-2">
                                                <input type="submit" value="Search" name="button"
                                                       class="btn btn-primary">
                                            </div>

                                            <div class="col-md-2 mt-4">
                                                <input type="reset" value="Reset" class="btn btn-warning">
                                            </div>

                                            <div class="col-md-2">
                                                <a class="btn btn-success" href="employee_manager/export">EXPORT</a>
                                            </div>
                                        </form>

                                    </div>
                                </div>


                                <div class="panel-body pn">
                                    @include('inc.messages')

                                    <div class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Code</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Role</th>
                                                <th class="text-center">Supervisor</th>
                                                <th class="text-center">Mobile Number</th>
                                                <th class="text-center">Department</th>
                                                <th class="text-center">Duty Station</th>
                                                <th class="text-center">Date Posted</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0;?>
                                            @if(count($employee ?? '') > 0)
                                                @foreach($employee ?? '' as $emp)
                                                    <tr>
                                                        <td class="text-center">{{$i+=1}}</td>
                                                        <td class="text-center">{{$emp->code}}</td>
                                                        <td class="text-center"><a style=" text-decoration: none"
                                                                href="/employee/{{$emp->id}}"> {{$emp->name}}</a></td>
                                                        <td class="text-center">{{$emp->roles[0]->role}}</td>
                                                        <td class="text-center">{{$emp->user->supervisedBy[0]->name}}</td>
                                                        <td class="text-center">{{$emp->phone_number}}</td>
                                                        <td class="text-center">{{$emp->department}}</td>
                                                        <td class="text-center">{{$emp->duty_station}}</td>
                                                        <td class="text-center">{{date_format(new DateTime($emp->posted_date), 'd-m-Y')}}</td>
                                                        <td class="text-center">
                                                                    <a href="/employee/{{$emp->id}}/edit">
                                                                        <button type="button" class="btn btn-info br2 btn-xs fs12"
                                                                                 data-toggle="modal" data-target="#edit">Edit
                                                                         </button></a>
                                                                          <button type="button" class="btn btn-danger br2 btn-xs fs12"
                                                                                  data-empid={{$emp->id}} data-name={{$emp->name}} data-code={{$emp->code}}
                                                                                      data-toggle="modal" data-target="#delete">Delete
                                                                          </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="12">
                                                        {!! $employee->links() !!}
                                                    </td>
                                                </tr>
                                            @else
                                                <p style="text-align: center">No Employees Found</p>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal Delete-->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div style="background-color: lightpink" class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalCenter">
                        Delete Confirmation
                    </h5>
                    <button style="font-size: 30px; margin-top: -30px" type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div style="text-align: center" class="modal-body">
                    {!! Form::open(['action' => ['EmployeeController@doDelete',isset($emp->id) ? $emp->id:'' ],'method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}

                    {{Form::hidden('id', isset($emp->id) ? $emp->id:'' ,['value' =>'','name' => 'id','id'=>'emp_id'])}}
                    <h6>Are you sure you want to delete this ?<br><br>
                        <input style="border: 0" type="text" disabled class="form-control text-center" name="name" id="name">Code
                        <input style="border: 0" type="text" disabled class="form-control text-center" id="code">
                    </h6>

                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button> &nbsp;&nbsp;
                        <input class="btn btn-danger" type="submit" name="SUBMIT" value="Yes Delete" onclick="this.value='Deleting ..';this.disabled='disabled'; this.form.submit();" />
                    </div>
                    {{Form::hidden('_method','PUT')}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal -->

    <script>
        $('#delete').on('show.bs.modal', function (event) {

            console.log('modal opened')

            var button = $(event.relatedTarget)
            var employee_id = button.data('empid')
            var name = button.data('name')
            var code = button.data('code')
            var modal = $(this)

            modal.find('.modal-body #emp_id').val(employee_id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #code').val(code);
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


