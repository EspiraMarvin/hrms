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
                        <a href=""> Awards </a>
                    </li>
                    <li class="breadcrumb-current-item"> Awards Listings </li>
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
                                    <span class="panel-title hidden-xs"> Role Lists </span>
                                </div>
                                <div class="panel-body pn">
                                    @include('inc.messages2')


                                    <div class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Award</th>
                                                <th class="text-center">Description</th>
                                                @if(Auth::user()->isAdmin())
                                                <th class="text-center">Actions</th>
                                                @endif
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php $i =0;?>
                                            <?php $modal =0;?>
                                            @if(count($awards) > 0)
                                                @foreach($awards as $award)
                                                    <tr>
                                                        <td class="text-center">{{$i+=1}}</td>
                                                        <td class="text-center">{{$award->award}}</td>
                                                        <td class="text-center">{{$award->description}}</td>
                                                        @if(Auth::user()->isAdmin())
                                                        <td class="text-center">
                                                            <div class="dropdown" role="group" aria-label="...">
                                                                <button type="button" class="btn btn-info br2 btn-xs fs12"
                                                                        data-myaward="{{$award->award}}" data-mydescription="{{$award->description}}"
                                                                        data-awardid="{{$award->id}}"
                                                                        data-toggle="modal" data-target="#edit">Edit</button>
                                                                <button type="button" class="btn btn-danger br2 btn-xs fs12"
                                                                        data-awardid={{$award->id}} data-myaward="{{$award->award}}"
                                                                        data-toggle="modal" data-target="#delete">Delete</button>
                                                            </div>

                                                        </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @else
                                            <div class="row text-center">
                                                <p>No awards to show</p>
                                            </div>
                                        @endif
                                        <div class="row text-center">
                                            {{$awards->links()}}
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


    <!-- Modal Edit -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div style="background-color: #67d3e0" class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalCenter">Edit Award Details</h5>
                    <button style="font-size: 30px; margin-top: -30px" type="button" class="close mt-lg-3" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['action' => ['AwardsController@update',isset($award->id) ? $award->id:'' ],'method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}
                <div class="modal-body">
                    {{Form::hidden('id', isset($award->id) ? $award->id:'' ,['value' =>'','name' => 'id','id'=>'award_id'])}}
                    {{--  <input type="hidden" name="id" id="award_id" value="">--}}
                        <div class="form-group {{ $errors->has('award') ? ' has-error' : '' }}">
                            <label class="control-label"> Award </label>
                            <input type="text" class="select2-single form-control" name="award" id="award">

                            <small class="text-danger">{{ $errors->first('award') }}</small>
                        </div>

                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="control-label">Description</label>
                            <textarea name="description" id="des" cols="20" rows="5" id='des' class="form-control"></textarea>

                            <small class="text-danger">{{ $errors->first('description') }}</small>
                        </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input class="btn btn-info" type="submit" name="SUBMIT" value="Submit" onclick="this.value='Submitting ..';this.disabled='disabled'; this.form.submit();" />
{{--                        <button type="submit" value="Submit" class="btn btn-info">Submit</button>--}}
                    </div>
                {{Form::hidden('_method','PUT')}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- /Modal -->

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
                    {!! Form::open(['action' => ['AwardsController@doDelete',isset($award->id) ? $award->id:'' ],'method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}

                    {{Form::hidden('id', isset($award->id) ? $award->id:'' ,['value' =>'','name' => 'id','id'=>'award_id'])}}
                    <h6>Are you sure you want to delete this ?<br><br>
                        <input style="border: 0" type="text" disabled class="form-control text-center" id="award">
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
        $('#edit').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)
            var award = button.data('myaward')
            var description = button.data('mydescription')
            var award_id = button.data('awardid')
            var modal = $(this)

            modal.find('.modal-body #award').val(award);
            modal.find('.modal-body #des').val(description);
            modal.find('.modal-body #award_id').val(award_id);
        })
    </script>

    <script>
        $('#delete').on('show.bs.modal', function (event) {

            console.log('modal opened')

            var button = $(event.relatedTarget)
            var award_id = button.data('awardid')
            var award = button.data('myaward')
            var modal = $(this)

            modal.find('.modal-body #award_id').val(award_id);
            modal.find('.modal-body #award').val(award);
        })
    </script>
@endsection
