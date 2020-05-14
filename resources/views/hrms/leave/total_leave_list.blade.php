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
                        <a href=""> Leaves </a>
                    </li>
                    <li class="breadcrumb-current-item"> Total Leave List</li>
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
                                    <div class="float-left col-md-8">
                                        <span class="panel-title"> Total Leave Lists (No. {{$totalLeave}})</span>
                                    </div>
                                    <div class="float-right">
                                        <a  style="background-color: #06b6ef;color: white"  href="/leave_pending" class="btn btn-default"><i class="fa fa-external-link"> Pending </i></a>
                                        <a style="background-color: #03b25e;color: white" href="/leave_approved" class="btn btn-success"><i class="fa fa-check"> Approved </i></a>
                                        <a style="background-color: red;color: white" href="/leave_deny" class="btn btn-danger"><i class="fa fa-times"> Disapproved </i></a>
                                    </div>
                                </div><br>

                                <div class="panel-menu allcp-form theme-primary mtn">
                                    <div class="row">
                                        <form action="/leave_search" method="GET" role="search">
                                            {{ csrf_field() }}
                                            <div class="col-md-6">
                                                <input type="text" class="typeahead form-control"
                                                       placeholder="Search any column" style="height:40px" value=""
                                                       name="p" autocomplete="off">
                                            </div>

                                            <div class="col-md-2">
                                                <input type="submit" value="Search" name="button"
                                                       class="btn btn-primary">
                                            </div>

                                            <div class="col-md-2">
                                                <input type="submit" value="Export" name="button"
                                                       class="btn btn-success">
                                            </div>
                                        </form>

                                        <div class="col-md-2">
                                            <a href="/total_leave_list"><input type="submit" value="Reset"
                                                                               class="btn btn-warning"></a>
                                        </div>
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
                                                <th class="text-center">Leave Type</th>
                                                <th class="text-center">Date From</th>
                                                <th class="text-center">Date To</th>
                                                <th class="text-center">Days</th>
                                                <th class="text-center">Applied</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0;?>
                                            @if(count($apply ?? '') > 0)
                                                @foreach($apply ?? '' as $app)
                                                    <tr>
                                                        <td class="text-center">{{$i+=1}}</td>
                                                        <td class="text-center">{{$app->user->name}}</td>
                                                        <td class="text-center">{{$app->leaves->leave_type}}</td>
                                                        <td class="text-center">{{date_format(new DateTime($app->date_from), 'd-m-Y')}}</td>
                                                        <td class="text-center">{{date_format(new DateTime($app->date_to), 'd-m-Y')}}</td>
                                                        <td class="text-center">{{$app->number_of_days}}</td>
                                                        <td class="text-center">{{date_format(new DateTime($app->created_at), 'd-m-Y')}}</td>
                                                        <td class="text-center">
                                                            <div class="btn-group text-right">
                                                                @if($app->status==0)
                                                                    <button type="button" style="background-color: #06b6ef"
                                                                            class="btn btn br2 btn-xs fs12"
                                                                            aria-expanded="false"><i style="color: white"
                                                                            class="fa fa-external-link">
                                                                            Pending </i>

                                                                    </button>
                                                                @elseif($app->status==1)
                                                                    <button type="button" style="background-color: #03b25e"
                                                                            class="btn btn br2 btn-xs fs12"
                                                                            aria-expanded="false"><i style="color: white"
                                                                            class="fa fa-check">
                                                                            Approved </i>

                                                                    </button>
                                                                @else
                                                                    <button type="button"
                                                                            class="btn btn br2 btn-xs fs12" style="background-color: #f5393d"
                                                                            aria-expanded="false"><i style="color: white"
                                                                            class="fa fa-times">
                                                                            Disapproved </i>

                                                                    </button>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="12">
                                                        {!! $apply->links() !!}
                                                        {{--                                                        {!! $apply->links() !!}--}}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    @else
                                        <div class="row text-center">
                                            <p>No leaves to show</p>
                                        </div>
                                    @endif
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
