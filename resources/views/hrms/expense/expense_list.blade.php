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
                        <a href=""> Expenses </a>
                    </li>
                    <li class="breadcrumb-current-item"> Expense Listings</li>
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
                                    <span class="panel-title hidden-xs"> Expense Listings </span>
                                </div>
                                <div class="panel-body pn">
                                    @include('inc.messages')
                                    <div class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">County</th>
                                                <th class="text-center">Item</th>
                                                <th class="text-center">Expense</th>
                                                <th class="text-center">Date of Assignment</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0;?>
                                            @if(count($expense) > 0)
                                                @foreach($expense as $exp)
                                                    <tr>
                                                        <td class="text-center">{{$i+=1}}</td>
                                                        <td class="text-center">{{$exp->county->county}}</td>
                                                        <td class="text-center">{{$exp->item}}</td>
                                                        <td class="text-center">{{$exp->expense}}</td>
                                                        <td class="text-center">{{date_format(new DateTime($exp->assigned_date), 'd-m-Y')}}</td>
                                                        <td class="text-center">
                                                            <div class="dropdown" role="group" aria-label="...">
                                                                <a href="/expense/{{$exp->id}}/edit">
                                                                    <button type="button" class="btn btn-info br2 btn-xs fs12"
                                                                            data-toggle="modal" data-target="#edit">
                                                                        Edit
                                                                    </button></a>
                                                                <button type="button" class="btn btn-danger br2 btn-xs fs12"
                                                                        data-expid={{$exp->id}} data-item={{$exp->item}} data-county={{$exp->county->county}}
                                                                            data-toggle="modal" data-target="#delete">Delete</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @else
                                            <div class="row text-center">
                                                <p>No Assigned Expense to show</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row text-center">
                                        {{$expense->links()}}
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
                    {!! Form::open(['action' => ['ExpensesController@doDelete',isset($exp->id) ? $exp->id:'' ],'method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}

                    {{Form::hidden('id', isset($exp->id) ? $exp->id:'' ,['value' =>'','name' => 'id','id'=>'expense_id'])}}
                    <h6>Are you sure you want to delete this ?<br><br>
                        <input style="border: 0" type="text" disabled class="form-control text-center" id="item"> For
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
            var expense_id = button.data('expid')
            var item = button.data('item')
            var county = button.data('county')
            var modal = $(this)

            modal.find('.modal-body #expense_id').val(expense_id);
            modal.find('.modal-body #item').val(item);
            modal.find('.modal-body #county').val(county);
        })
    </script>
@endsection
