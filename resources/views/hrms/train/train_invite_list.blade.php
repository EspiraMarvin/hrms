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
                        <a href=""> Training Program </a>
                    </li>
                    <li class="breadcrumb-current-item"> Training Programs List</li>
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
                                    <span class="panel-title hidden-xs"> Training Program Lists </span>
                                </div>
                                <div class="panel-body pn">
                                    @include('inc.messages')

                                    <div class="table-responsive">
                                        <table id="example" class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Employee</th>
                                                <th class="text-center">Training Program</th>
                                                <th class="text-center">Description</th>
                                                <th class="text-center">Date From</th>
                                                <th class="text-center">Date To</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php $i = 0;?>
                                            @if(count($invites) > 0)
                                                @foreach($invites as $invite)
                                                    <tr>
                                                        <td class="text-center">{{$i+=1}}</td>
                                                        <td class="text-center">{{$invite->employee->name}}</td>
                                                        <td class="text-center">{{$invite->training->training ?? ''}}</td>
                                                        <td class="text-center">{{$invite->description}}</td>
                                                        <td class="text-center">{{date_format(new DateTime($invite->datefrom), 'd-m-Y')}}</td>
                                                        <td class="text-center">{{date_format(new DateTime($invite->dateto), 'd-m-Y')}}</td>
                                                        <td class="text-center">
                                                            <div class="dropdown" role="group" aria-label="...">
                                                                <a href="/train_invite/{{$invite->id}}/edit">
                                                                <button type="button" class="btn btn-info br2 btn-xs fs12"
                                                                        data-toggle="modal" data-target="#edit">
                                                                    Edit
                                                                </button></a>
                                                                <button type="button" class="btn btn-danger br2 btn-xs fs12"
                                                                        data-trainingid={{$invite->id}} data-employee={{$invite->employee->name}}
                                                                        data-toggle="modal" data-target="#delete">Delete</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @else
                                            <div class="row text-center">
                                                <p>No training invites to show</p>
                                            </div>
                                        @endif
                                        <div class="row text-center">
{{--                                            {{$invites->links()}}--}}
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
                    {!! Form::open(['action' => ['TrainingsController@doDeleteInvite',isset($invite->id) ? $invite->id:'' ],'method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}

                    {{Form::hidden('id', isset($invite->id) ? $invite->id:'' ,['value' =>'','name' => 'id','id'=>'training_id'])}}
                    <h6>Are you sure you want to delete this ?<br><br>
                        <input style="border: 0" type="text" disabled class="form-control text-center" id="employee">
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
            var training_id = button.data('trainingid')
            var employee = button.data('employee')
            var modal = $(this)

            modal.find('.modal-body #training_id').val(training_id);
            modal.find('.modal-body #employee').val(employee);
        })
    </script>

@endsection
