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
                        <a href=""> Bank Details </a>
                    </li>
                    <li class="breadcrumb-current-item"> Employees Bank Details</li>
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
                                </div>
                                <br/>
                                <div class="panel-menu allcp-form theme-primary mtn">
                                    <div class="row">
                                        <form action="/employee_bank" method="GET" role="search">
                                            {{ csrf_field() }}
                                            <div class="col-md-8">
                                                <input type="text" class="typeahead form-control"
                                                       placeholder="Search any column" style="height:40px" value=""
                                                       name="m" autocomplete="off">
                                            </div>

                                            <div class="col-md-4" style="margin-top: 3px">
                                                <input type="submit" value="Search" name="button"
                                                       class="btn btn-primary">
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
                                                <th class="text-center">Employee</th>
                                                <th class="text-center">KRA Pin</th>
                                                <th class="text-center">Bank Name</th>
                                                <th class="text-center">Account Number</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0;?>
                                            @if(count($employee ?? '') > 0)
                                                @foreach($employee ?? '' as $emp)
                                                    <tr>
                                                        <td class="text-center">{{$i+=1}}</td>
                                                        <td class="text-center">{{$emp->name}}</td>
                                                        <td class="text-center">{{$emp->kra_pin}}</td>
                                                        <td class="text-center">{{$emp->bank_name}}</td>
                                                        <td class="text-center">{{$emp->account_number}}</td>
                                                        <td class="text-center">
                                                            <div class="dropdown" role="group" aria-label="...">
                                                                <button type="button" class="btn btn-info br2 btn-xs fs12"
                                                                        data-name="{{$emp->name}}" data-kra="{{$emp->kra_pin}}" data-bank="{{$emp->bank_name}}"
                                                                        data-account="{{$emp->account_number}}" data-empid="{{$emp->id}}"
                                                                        data-toggle="modal" data-target="#edit">Edit
                                                                </button>
                                                            </div>

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

    <!-- Modal Edit -->
    <div class="modal fadeIn" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div style="background-color: #67d3e0" class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalCenter">Edit Bank Details</h5>
                    <button style="font-size: 30px; margin-top: -30px" type="button" class="close mt-lg-3" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['action' => ['EmployeeController@editBank',isset($emp->id) ? $emp->id:'' ],'method' => 'POST','class' => 'form-horizontal','enctype'=>'multipart/form-data', 'id'=>"custom-form-wizard"]) !!}
                <div class="modal-body">
                    {{Form::hidden('id', isset($emp->id) ? $emp->id:'' ,['value' =>'','name' => 'id','id'=>'emp_id'])}}
                    <div class="form-group {{ $errors->has('kra_pin') ? ' has-error' : '' }}">
                        <label class="control-label"> Name </label>
                        <input type="text" class="select2-single form-control"  id="name" readonly>
                    </div>
                    <div class="form-group {{ $errors->has('kra_pin') ? ' has-error' : '' }}">
                        <label class="control-label"> KRA Pin </label>
                        <input type="text" class="select2-single form-control" name="kra_pin" id="kra_pin">

                        <small class="text-danger">{{ $errors->first('kra_pin') }}</small>
                    </div>
                    <div class="form-group {{ $errors->has('bank_name') ? ' has-error' : '' }}">
                        <label class="control-label"> Bank Name </label>
                        <input type="text" class="select2-single form-control" name="bank_name" id="bank_name">

                        <small class="text-danger">{{ $errors->first('bank_name') }}</small>
                    </div>
                    <div class="form-group {{ $errors->has('account_number') ? ' has-error' : '' }}">
                        <label class="control-label"> Account Number </label>
                        <input type="number" class="select2-single form-control" name="account_number" id="account_number">

                        <small class="text-danger">{{ $errors->first('account_name') }}</small>
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
    {{--    delete user--}}
    <script>
        $('#edit').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget)
            var name = button.data('name')
            var kra = button.data('kra')
            var bank = button.data('bank')
            var account = button.data('account')
            var emp_id = button.data('empid')
            var modal = $(this)

            modal.find('.modal-body #emp_id').val(emp_id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #kra_pin').val(kra);
            modal.find('.modal-body #bank_name').val(bank);
            modal.find('.modal-body #account_number').val(account);
        })
    </script>

    {{--    autocomplete script--}}

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
    {{--    print script--}}
    <script>
        $(document).ready(function () {
            $('.btnprn').printPage();
        })
    </script>
@endsection


