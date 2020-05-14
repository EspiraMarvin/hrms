@extends('inc.base')

@section('content')
    <!-- START CONTENT -->
    <div class="content">

        <header id="topbar" class="alt">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="breadcrumb-icon">
                        <a href="/profile">
                            <span class="fa fa-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-active">
                        <a href="/profile"> Profile </a>
                    </li>
                    <li class="breadcrumb-link">
                        <a href=""> Assets </a>
                    </li>
                    <li class="breadcrumb-current-item"> Asset Listings</li>
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
                                                {{--                                                <th class="text-center">Region</th>--}}
                                                <th class="text-center">County</th>
                                                <th class="text-center">Asset</th>
                                                <th class="text-center">Issued To</th>
                                                <th class="text-center">Issued By</th>
                                                <th class="text-center">Date of Assignment</th>
                                                <th class="text-center">Date of Release</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0;?>
                                            @if(count($assets) > 0)
                                                @foreach($assets as $ass)
                                                    <tr>
                                                        <td class="text-center">{{$i+=1}}</td>
                                                        {{--                                                <td class="text-center">{{$ass->region->region}}</td>--}}
                                                        <td class="text-center">{{$ass->county->county}}</td>
                                                        <td class="text-center">{{$ass->asset->asset}}</td>
                                                        <td class="text-center">{{$ass->employee->name}}</td>
                                                        <td class="text-center">{{$ass->authority}}</td>
                                                        <td class="text-center">{{date_format(new DateTime($ass->assigned_date),'d-m-Y')}}</td>
                                                        <td class="text-center">{{date_format(new DateTime($ass->released_date), 'd-m-Y')}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div style="text-align: center;">
                                            {!! $assets->links() !!}
                                        </div>
                                        @else
                                            <div class="row text-center">
                                                <p>No Assigned Assets to show</p>
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

@endsection
