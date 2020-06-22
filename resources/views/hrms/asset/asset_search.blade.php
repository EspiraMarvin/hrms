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
                <li class="breadcrumb-current-item"> Asset Listings</li>
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
                                <span class="panel-title hidden-xs"> Assets List </span>
                            </div><br>

                            <div class="panel-menu allcp-form theme-primary mtn">
                                <div class="row">
                                    <form action="/asset_search" method="GET" role="search">
                                        {{ csrf_field() }}
                                        <div class="col-md-6">
                                            <input type="text" class="typeahead form-control"
                                                   placeholder="Search any column" style="height:40px" value=""
                                                   name="r" autocomplete="off">
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
                                            <th class="text-center">Asset</th>
                                            <th class="text-center">Serial Number</th>
                                            <th class="text-center">Description</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                        </thead>
                                        <body>
                                        <?php $i = 0;?>
                                        @if(count($data) > 0)
                                        @foreach($data as $ass)
                                        <tr>
                                            <td class="text-center">{{$i+=1}}</td>

                                            <td class="text-center">{{$ass->asset}}</td>
                                            <td class="text-center">{{$ass->serial_number}}</td>
                                            <td class="text-center">{{$ass->description}}</td>
                                            <td class="text-center">
                                                <div class="dropdown" role="group" aria-label="...">
                                                    <a href="/asset/{{ $ass->id }}/edit">
                                                        <button type="button" class="btn btn-info br2 btn-xs fs12"
                                                                data-toggle="modal" data-target="#edit">
                                                            Edit
                                                        </button></a>
                                                    <button type="button" class="btn btn-danger br2 btn-xs fs12"
                                                            data-assid={{$ass->id}} data-asset={{$ass->asset}}
                                                        data-serial={{$ass->serial_number}}
                                                        data-toggle="modal" data-target="#delete">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                        </tr>
                                        </body>
                                    </table>
                                </div>
                                @else
                                <p style="text-align: center">No assets found</p>
                                @endif
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
                {!! Form::open(['action' => ['AssetsController@doDelete',isset($ass->id) ? $ass->id:'' ],'method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}

                {{Form::hidden('id', isset($ass->id) ? $ass->id:'' ,['value' =>'','name' => 'id','id'=>'asset_id'])}}
                <h6>Are you sure you want to delete this ?<br><br>
                    With serial number
                    <input style="border: 0" type="text" disabled class="form-control text-center" id="serial">
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
        var asset_id = button.data('assetid')
        var asset = button.data('asset')
        var serial = button.data('serial')
        var modal = $(this)

        modal.find('.modal-body #expense_id').val(asset_id);
        modal.find('.modal-body #asset').val(asset);
        modal.find('.modal-body #serial').val(serial);
    })
</script>

@endsection
