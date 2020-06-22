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
                        <a href=""> Assets </a>
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
                                    <span class="panel-title hidden-xs"> Assets Listings </span>
                                </div>
                                <div class="panel-body pn">
                                    @include('inc.messages')
                                    <div class="table-responsive">
                                        <table id="example" class="table allcp-form theme-warning tc-checkbox-1 fs13" cellspacing="0" width="100%">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Region</th>
                                                <th class="text-center">County</th>
                                                <th class="text-center">Asset</th>
                                                <th class="text-center">Issued To</th>
                                                <th class="text-center">Issued By</th>
                                                <th class="text-center">Date of Assignment</th>
                                                <th class="text-center">Date of Release</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0;?>
                                            @if(count($assets) > 0)
                                                @foreach($assets as $ass)
                                                    <tr>
                                                        <td class="text-center">{{$i+=1}}</td>
                                                        <td class="text-center">{{$ass->region->region}}</td>
                                                        <td class="text-center">{{$ass->county->county}}</td>
                                                        <td class="text-center">{{$ass->asset->asset}}</td>
                                                        <td class="text-center">{{$ass->employee->name}}</td>
                                                        <td class="text-center">{{$ass->authority}}</td>
                                                        <td class="text-center">{{date_format(new DateTime($ass->assigned_date),'d-m-Y')}}</td>
                                                        <td class="text-center">{{date_format(new DateTime($ass->released_date), 'd-m-Y')}}</td>
                                                        <td class="text-center">
                                                            <div class="dropdown" role="group" aria-label="...">
                                                                <a href="/assetassign/{{$ass->id}}/edit">
                                                                    <button type="button" class="btn btn-info br2 btn-xs fs12"
                                                                            data-toggle="modal" data-target="#edit">
                                                                        Edit
                                                                    </button></a>
                                                                <button type="button" class="btn btn-danger br2 btn-xs fs12"
                                                                        data-assetid="{{$ass->id}}" data-asset="{{$ass->asset->asset}}"
                                                                        data-county="{{$ass->county->county}}" data-authority="{{$ass->authority}}"
                                                                        data-toggle="modal" data-target="#delete">Delete</button>
                                                            </div>
                                                        </td>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div style="text-align: center;">
                                            {{--                                            {!! $assets->links() !!}--}}
                                        </div>
                                        @else
                                            <div class="row text-center">
                                                <p>No Assigned Assets to show</p>
                                            </div>
                                        @endif
                                    </div>
                                    {!! Form::close() !!}
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
                    {!! Form::open(['action' => ['AssetAssignController@doDelete',isset($ass->id) ? $ass->id:'' ],'method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}

                    {{Form::hidden('id', isset($ass->id) ? $ass->id:'' ,['value' =>'','name' => 'id','id'=>'asset_id'])}}
                    <h6>Are you sure you want to delete this ?<br><br>
                        <input style="border: 0" type="text" disabled class="form-control text-center" id="asset"> Issued by
                        <input style="border: 0" type="text" disabled class="form-control text-center" id="authority"> For
                        <input style="border: 0" type="text" disabled class="form-control text-center" id="county">
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
            var county = button.data('county')
            var authority = button.data('authority')
            var modal = $(this)

            modal.find('.modal-body #asset_id').val(asset_id);
            modal.find('.modal-body #asset').val(asset);
            modal.find('.modal-body #county').val(county);
            modal.find('.modal-body #authority').val(authority);
        })
    </script>

    <script>
        // Basic example
        $(document).ready(function() {
            $('#example').DataTable();
        } );
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
