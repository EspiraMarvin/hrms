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
                    <li class="breadcrumb-current-item"> Asset Listings </li>
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
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">County/Region</th>
                                                <th class="text-center">Asset</th>
                                                <th class="text-center">Issuing Authority</th>
                                                <th class="text-center">Date of Assignment</th>
                                                <th class="text-center">Date of Release</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i =0;?>
                                            @if(count($asset) > 0)
                                                @foreach($asset as $ass)
                                            <tr>
                                                <td class="text-center">{{$i+=1}}</td>
                                                <td class="text-center">{{$ass->region}}</td>
                                                <td class="text-center">{{$ass->name}}</td>
                                                <td class="text-center">{{$ass->authority}}</td>
                                                <td class="text-center">{{$ass->assigned_date}}</td>
                                                <td class="text-center">{{$ass->released_date}}</td>
                                                <td class="text-center">
                                                    <div class="btn-group text-right">
                                                        <button type="button"
                                                                class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="false"> Action
                                                            <span class="caret ml5"></span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li>
                                                                <a href="/edit-asset-assignment/">Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="/delete-asset-assignment/">Delete</a>
{{--                                                                <a href="/delete-project-assignment/{{$project->id}}">Delete</a>--}}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                                @endforeach
                                            <tr>
                                                {{--                                                {!! $projects->render() !!}--}}
                                            </tr>
                                            </tbody>
                                        </table>
                                        @else
                                            <div class="row text-center">
                                                <h2>No Assigned Assets to show</h2>
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
