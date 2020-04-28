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
                        <a href="/employee_manager"> Employees </a>
                    </li>
                    <li class="breadcrumb-current-item"> Employee Bank Details</li>
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
                                    <span class="panel-title hidden-xs">Employees Bank Details List</span><br/>
                                </div>
                                <br/>
                                @include('inc.messages')

                                <div class="panel-body pn">
                                    <div class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Employee</th>
                                                <th class="text-center">Bank Name</th>
                                                <th class="text-center">Account Number</th>
                                                <th class="text-center">PF Status</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0;?>
                                            @if(count($employee) > 0)
                                                @foreach($employee as $emp)
                                                    <tr>
                                                        <td class="text-center">{{$i+=1}}</td>
                                                        <td class="text-center">{{$emp->name}}</td>
                                                        <td class="text-center">{{$emp->bank_name}}</td>
                                                        <td class="text-center">{{$emp->account_number}}</td>
                                                        <td class="text-center">{{$emp->pf_status}}</td>
                                                        <td class="text-center">
                                                            <div class="btn-group text-right">
                                                                <button type="button"
                                                                        class="btn btn-info br2 btn-xs fs12 dropdown-toggle"
                                                                        data-toggle="dropdown" aria-expanded="false">
                                                                    Action
                                                                    <span class="caret ml5"></span>
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li>
                                                                        <a href="/employee/{{$emp->id}}/edit#steps-uid-0-h-2">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="/delete-emp/{{$emp->id}}">Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                <tr>
                                                    <td colspan="10">
                                                        {!! $employee->render() !!}
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
@endsection
