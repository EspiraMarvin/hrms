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
                        <a href=""> Supervisors </a>
                    </li>
                    <li class="breadcrumb-current-item"> Supervisors Listings</li>
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
                                    <span class="panel-title hidden-xs"> Supervisor Lists </span>
                                </div>
                                <div class="panel-body pn">
                                    @include('inc.messages')

                                    <div class="table-responsive">
                                        <table id="example" class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Supervisor</th>
                                                <th class="text-center">Supervisees</th>
                                                <th class="text-center">Email Address</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php $i = 0;?>
                                            @if(count($supervisor) > 0)
                                                @foreach($supervisor as $sup)
                                                    <tr>
                                                        <td class="text-center">{{$i+=1}}</td>
                                                        <td class="text-center">{{isset($sup->name) ? $sup->name: ''}}</td>
                                                        <td class="text-center">
                                                            <a style="text-decoration: none"
                                                               href="/supervisedBy_list/{{isset($sup->id) ? $sup->id:''}}">Supervisees
                                                            </a>
                                                        </td>
                                                        <td class="text-center">{{isset($sup->email) ? $sup->email:''}}</td>
                                                        <td class="text-center">
                                                            <div class="dropdown" role="group" aria-label="...">
                                                                <button type="button" class="btn btn-danger br2 btn-xs fs12"
                                                                        data-userid="{{isset($sup->id) ? $sup->id:''}}"
                                                                        data-name="{{isset($sup->name) ? $sup->name:''}}"
                                                                        data-roleid="{{isset($sup->roles[0]->id) ? $sup->roles[0]->id:''}}"
                                                                        data-supervisorid="{{isset($sup->supervisedBy[0]->id) ? $sup->supervisedBy[0]->id:''}}"
                                                                        data-role="{{isset($sup->roles[0]->role) ? $sup->roles[0]->role:''}}"
                                                                            data-toggle="modal" data-target="#delete">Delete</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @else
                                            <div class="row text-center">
                                                <p>No supervisors to show</p>
                                            </div>
                                        @endif
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
                    {!! Form::open(['action' => ['EmployeeController@doDeleteSup',isset($sup->id) ? $sup->id:'' ],'method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}

                    {{Form::hidden('id', isset($sup->id) ? $sup->id:'' ,['value' =>'','name' => 'id','id'=>'user_id'])}}
                    {{Form::hidden('id', isset($sup->roles[0]->id) ? $sup->roles[0]->id:'' ,['value' =>'','name' => 'role_id','id'=>'role_id'])}}
{{--                    {{Form::hidden('id', isset($sup->roles[0]->role) ? $sup->roles[0]->role:'' ,['value' =>'','name' => 'role_id','id'=>'role_id'])}}--}}

                    <h6>Are you sure you want to delete this user as Supervisor ? </h6>
                    <input style="border: 0" type="text" disabled class="form-control text-center" name="name" id="name"><br>
                {{--    role
                    <input style="border: 0" type="text" disabled class="form-control text-center" name="role" id="role">
                    user_id
                    <input style="border: 0" type="text" disabled class="form-control text-center" name="user_id" id="user_id">
                    role_id
                    <input style="border: 0" type="text" disabled class="form-control text-center" name="role_id" id="role_id">
--}}
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
            var user_id = button.data('userid')
            var role_id = button.data('roleid')
            var supervisor_id = button.data('supervisorid')
            var role = button.data('role')
            var name = button.data('name')
            var modal = $(this)

            modal.find('.modal-body #user_id').val(user_id);
            modal.find('.modal-body #role_id').val(role_id);
            modal.find('.modal-body #supervisor_id').val(supervisor_id);
            modal.find('.modal-body #role').val(role);
            modal.find('.modal-body #name').val(name);
        })
    </script>
    <script>
        // Basic example
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection
