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
                    <li class="breadcrumb-current-item"> Employee Manager</li>
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
                                    <span class="panel-title hidden-xs">Employee Lists</span><br/>
                                </div>
                                <br/>
                                @include('inc.messages')

                                <div class="panel-menu allcp-form theme-primary mtn">
                                    <div class="row">
                                        <form action="/employee_promote" method="GET" role="search">
                                            <div class="col-md-8">
                                                <input type="text" class="typeahead form-control"
                                                       placeholder="Search any Column" style="height:40px" value=""
                                                       name="q" autocomplete="off">
                                            </div>

                                            <div class="col-md-2">
                                                <input type="submit" value="Search" name="button"
                                                       class="btn btn-primary">
                                            </div>

                                            <div class="col-md-2">
                                                <a href="/promote_add">
                                                    <input type="submit" value="Reset" class="btn btn-warning"></a>
                                            </div>

                                        </form>

                                    </div>
                                </div>

                                <div class="panel-body pn">

                                    <div class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Role</th>
                                                <th class="text-center">Salary</th>
                                                <th class="text-center">Supervisor</th>
                                                <th class="text-center">Department</th>
                                                <th class="text-center">Duty Station</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0;?>
                                            @if(count($data) > 0)

                                                @foreach($data as $emp)
                                                    <tr>
                                                        <td class="text-center">{{$i+=1}}</td>
                                                        <td class="text-center"><a
                                                                href="/employee/{{$emp->id}}"> {{$emp->name}}</a></td>
                                                        <td class="text-center">{{$emp->userrole->role->role}}</td>
                                                        <td class="text-center">{{$emp->salary}}</td>
                                                        <td class="text-center">{{$emp->supervisor}}</td>
                                                        <td class="text-center">{{$emp->department}}</td>
                                                        <td class="text-center">{{$emp->duty_station}}</td>
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
                                                                        <a href="/promote/{{$emp->id}}/edit">Promote</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="10">
                                                        {!! $data->render() !!}
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        @else
                                            <p style="text-align: center">No Employees Found</p>
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


