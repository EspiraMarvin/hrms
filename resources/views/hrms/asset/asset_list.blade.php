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
                        <a href=""> Asset </a>
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
                                    <span class="panel-title hidden-xs"> Assets Lists </span>
                                </div>
                                <div class="panel-body pn">
                                    @include('inc.messages')

                                    {{--                                    @if(count($projects))--}}
                                    <div class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Asset</th>
                                                <th class="text-center">Description</th>
                                                <th class="text-center">Actions</th>  </tr>
                                            </thead>
                                            <body>
                                            <?php $i =0;?>
                                            @if(count($asset) > 0)
                                                @foreach($asset as $ass)
                                            <tr>
                                                <td class="text-center">{{$i+=1}}</td>

                                                <td class="text-center">{{$ass->name}}</td>
                                                <td class="text-center">{{$ass->description}}</td>
                                                <td class="text-center">
                                                    <div class="btn-group text-right">
                                                        <button type="button"
                                                                class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="false"> Action
                                                            <span class="caret ml5"></span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li>
                                                                <a href="/edit-project/">Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="/delete-project/">Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                                @endforeach
                                            <tr>
                                            </tr>
                                            </body>
                                        </table>
                                    </div>
                                    @else
                                    <h2 style="text-align: center">No assets found</h2>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
