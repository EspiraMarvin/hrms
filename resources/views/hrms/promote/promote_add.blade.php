@extends('inc.base')

@section('content')
    <!-- START CONTENT -->
    <div class="content">

        {{--        <input type="hidden" value="{{csrf_token()}}" id="token">--}}

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
                        <a href=""> Promotion </a>
                    </li>
                    <li class="breadcrumb-current-item"> Promote</li>
                </ol>
            </div>
        </header>
        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn">
            <!-- -------------- Column Center -------------- -->
            <div class="chute-affix" data-offset-top="200">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                            <div class="panel">
                                <div class="panel-heading">
                                    <span class="panel-title hidden-xs"> Promote Employee </span>
                                </div>

                                <div class="panel-body pn">
                                    <div class="table-responsive panel-menu allcp-form theme-primary mtn">

                                        <div class="panel-body p25 pb10">
                                            @include('inc.messages')

                                            <form action="/employee_promote" method="GET" role="search">
                                                {{ csrf_field() }}
                                                <div class="col-md-8">
                                                    <input type="text" class="typeahead form-control"
                                                           placeholder="Search Employee " style="height:40px" value=""
                                                           name="q" autocomplete="off">
                                                </div>

                                                <div class="col-md-2 mt-2">
                                                    <input type="submit" value="Search" name="button" class="btn btn-primary">
                                                </div>

                                                <div class="col-md-2 mt-2">
                                                    <input type="reset" value="Reset" class="btn btn-warning">
                                                </div>

                                            </form>

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
