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
                        <a href="/employee_manager"> Directorate </a>
                    </li>
                    <li class="breadcrumb-current-item"> Directorate Lists</li>
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
                                    <span class="panel-title hidden-xs">Directorate Details List</span><br />
                                </div><br />
                                @include('inc.messages')

                                <div class="panel-body pn">
                                    <div class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Description</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i =0;?>
                                            @if(count($directorate) > 0)
                                                @foreach($directorate as $dir)
                                                    <tr>
                                                        <td class="text-center">{{$i+=1}}</td>
                                                        <td class="text-center">{{$dir->name}}</td>
                                                        <td class="text-center">{{$dir->description}}</td>
                                                        <td class="text-center">
                                                            <div class="dropdown" role="group" aria-label="...">
                                                                <a href="/directorate/{{$dir->id}}/edit">
                                                                    <button type="button" class="btn btn-info br2 btn-xs fs12"
                                                                            data-toggle="modal" data-target="#edit">
                                                                        Edit
                                                                    </button></a>
                                                                <button type="button" class="btn btn-danger br2 btn-xs fs12"
                                                                        data-dirid="{{$dir->id}}" data-name="{{$dir->name}}"
                                                                            data-toggle="modal" data-target="#delete">Delete</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr><td colspan="10">
                                                        {!! $directorate->render() !!}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @else
                                        <div class="row text-center">
                                            <h2>No directorates to show</h2>
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
                    {!! Form::open(['action' => ['DirectorateController@doDelete',isset($dir->id) ? $dir->id:'' ],'method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}

                    {{Form::hidden('id', isset($dir->id) ? $dir->id:'' ,['value' =>'','name' => 'id','id'=>'dir_id'])}}
                    <h6>Are you sure you want to delete this ?<br><br>
                        <input style="border: 0" type="text" disabled class="form-control text-center" id="name">
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
            var dir_id = button.data('dirid')
            var name = button.data('name')
            var modal = $(this)

            modal.find('.modal-body #dir_id').val(dir_id);
            modal.find('.modal-body #name').val(name);
        })
    </script>
@endsection
