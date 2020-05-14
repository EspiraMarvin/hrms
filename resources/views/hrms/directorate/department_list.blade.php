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
                        <a href="/"> Department </a>
                    </li>
                    <li class="breadcrumb-current-item"> Department List</li>
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
                                    <span class="panel-title hidden-xs">Department List</span><br />
                                </div><br />
                                @include('inc.messages')

                                <div class="panel-body pn">
                                    <div class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Department</th>
                                                <th class="text-center">Directorate</th>
                                                <th class="text-center">Description</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i =0;?>
                                            @if(count($department) > 0)
                                                @foreach($department as $dep)
                                            <tr>
                                                <td class="text-center">{{$i+=1}}</td>
                                                <td class="text-center"><a style=" text-decoration: none"
                                                        href="/department/{{$dep->id}}"> {{$dep->name}}</a></td>
                                                <td class="text-center">{{$dep->directorate}}</td>
                                                <td class="text-center">{{$dep->description}}</td>
                                                <td class="text-center">
                                                    <div class="dropdown" role="group" aria-label="...">
                                                        <a href="/department/{{$dep->id}}/edit">
                                                            <button type="button" class="btn btn-info br2 btn-xs fs12"
                                                                    data-toggle="modal" data-target="#edit">
                                                                Edit
                                                            </button></a>
                                                        <button type="button" class="btn btn-danger br2 btn-xs fs12"
                                                                data-depid={{$dep->id}} data-dir={{$dep->directorate}}
                                                                    data-toggle="modal" data-target="#delete">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                                @endforeach

                                            <tr><td colspan="10">
                                                    {!! $department->render() !!}
{{--                                                    {{$department->links()}}--}}
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                        @else
                                        <div class="row text-center">
                                            <h2>No departments to show</h2>
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
                    {!! Form::open(['action' => ['DepartmentsController@doDelete',isset($dep->id) ? $dep->id:'' ],'method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}

                    {{Form::hidden('id', isset($dep->id) ? $dep->id:'' ,['value' =>'','name' => 'id','id'=>'dep_id'])}}
                    <h6>Are you sure you want to delete this ?<br><br>
                        <input style="border: 0" type="text" disabled class="form-control text-center" id="dir">
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
            var dep_id = button.data('depid')
            var dir = button.data('dir')
            var modal = $(this)

            modal.find('.modal-body #dep_id').val(dep_id);
            modal.find('.modal-body #dir').val(dir);
        })
    </script>
@endsection
