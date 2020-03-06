@extends('inc.base')

@section('content')
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />--}}
{{--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>--}}
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
                        <a href=""> Employees </a>
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
                                    <span class="panel-title hidden-xs">Employee Lists</span><br />
                                </div><br />
                                @include('inc.messages')

                                <div class="panel-menu allcp-form theme-primary mtn">
                                    <div class="row">
                                        <form action="/employee_search" method="GET" role="search">
                                            {{ csrf_field() }}
                                            <div class="col-md-6">
                                                <input type="text" class="typeahead form-control" placeholder="Search any column" style="height:40px" value="" name="q" autocomplete="off">
                                            </div>

                                            <div class="col-md-2">
                                                <input type="submit" value="Search" name="button" class="btn btn-primary">
                                            </div>

                                            <div class="col-md-2">
                                                <input type="submit" value="Export" name="button" class="btn btn-success">
                                            </div>
                                        </form>

                                            <div class="col-md-2">
                                                <a href="/employee_manager"><input type="submit" value="Reset" class="btn btn-warning"></a>
                                            </div>
                                    </div>
                                </div>


                                <div class="panel-body pn">
                                    <div class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Code</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Role</th>
                                                <th class="text-center">Date Joined</th>
                                                <th class="text-center">Supervisor</th>
                                                <th class="text-center">Mobile Number</th>
                                                <th class="text-center">Department</th>
                                                <th class="text-center">Duty Station</th>
                                                <th class="text-center">Date Posted</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i =0;?>
                                            @if(count($employee ?? '') > 0)
                                                @foreach($employee ?? '' as $emp)
                                                <tr>
                                                    <td class="text-center">{{$i+=1}}</td>
                                                    <td class="text-center">{{$emp->code}}</td>
                                                    <td class="text-center"><a href="/employee/{{$emp->id}}"> {{$emp->name}}</a></td>
{{--                                                    <td class="text-center">{{convertStatusBack($emp->employee['status'])}}</td>--}}
                                                    <td class="text-center">{{$emp->role}}</td>
                                                    <td class="text-center">{{$emp->date_of_joining}}</td>
                                                    <td class="text-center">{{$emp->supervisor}}</td>
                                                    <td class="text-center">{{$emp->phone_number}}</td>
                                                    <td class="text-center">{{$emp->department}}</td>
                                                    <td class="text-center">{{$emp->duty_station}}</td>
                                                    <td class="text-center">{{$emp->posted_date}}</td>
                                                    <td class="text-center">
                                                        <div class="btn-group text-right">
                                                            <button type="button"
                                                                    class="btn btn-info br2 btn-xs fs12 dropdown-toggle"
                                                                    data-toggle="dropdown" aria-expanded="false"> Action
                                                                <span class="caret ml5"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                        <a href="/employee/{{$emp->id}}/edit">Edit</a>
                                                                </li>
                                                                <li>
                                                                    <a href="/delete-emp/{{$emp->id}}">Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
{{--                                                {{$emp->links}}--}}
                                            <tr><td colspan="12">
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


<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>


@endsection


