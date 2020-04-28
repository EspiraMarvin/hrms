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
                    <li class="breadcrumb-current-item"> Total Leave Requests</li>
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
                                    <span class="panel-title hidden-xs"> Total Leave Lists </span><br/>
                                </div>
                                <br/>


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
                                                <th class="text-center">Remarks</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0;?>
                                            @if(count($data) > 0)

                                                @foreach($data as $app)
                                                    <tr>
                                                        <td class="text-center">{{$i+=1}}</td>
                                                        <td class="text-center">{{$app->employee_name}}</td>
                                                        <td class="text-center">{{$app->leaves->leave_type}}</td>
                                                        <td class="text-center">{{date_format(new DateTime($app->date_from), 'd-m-Y')}}</td>
                                                        <td class="text-center">{{date_format(new DateTime($app->date_to), 'd-m-Y')}}</td>
                                                        <td class="text-center">{{$app->number_of_days}}</td>
                                                        <td class="text-center">{{$app->remarks}}</td>
                                                        <td class="text-center">
                                                                @if($app->status==0)
                                                                    <button type="button"
                                                                            class="btn btn-info br2 btn-xs fs12"
                                                                            aria-expanded="false"><i
                                                                            class="fa fa-external-link">
                                                                            Pending </i>

                                                                    </button>
                                                                @elseif($app->status==1)
                                                                    <button type="button"
                                                                            class="btn btn-success br2 btn-xs fs12"
                                                                            aria-expanded="false"><i class="fa fa-check">
                                                                            Approved </i>

                                                                    </button>
                                                                @else
                                                                    <button type="button"
                                                                            class="btn btn-danger br2 btn-xs fs12"
                                                                            aria-expanded="false"><i class="fa fa-times">
                                                                            Disapproved </i>

                                                                    </button>
                                                                @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="8">
                                                        {!! $data->links() !!}
                                                        {{--                                                        {!! $apply->links() !!}--}}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    @else
                                        <div class="row text-center">
                                            <p>No leavees to show</p>
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

