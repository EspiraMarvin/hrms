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
                        <a href="/profile"> Profile</a>
                    </li>
                    <li class="breadcrumb-link">
                        <a href=""> Leaves </a>
                    </li>
                    <li class="breadcrumb-current-item"> My Leave List</li>
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
                                    <span class="panel-title hidden-xs"> My Leave Lists </span>
                                </div>
                                <div class="panel-body pn">
                                    @include('inc.messages')

                                    <div class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Training Program</th>
                                                <th class="text-center">Description</th>
                                                <th class="text-center">Date From</th>
                                                <th class="text-center">Date To</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0;?>
                                            @if(count($trainingInvite) > 0)
                                                @foreach($trainingInvite as $inv)

                                                    <tr>
                                                        <td class="text-center">{{$i+=1}}</td>
                                                        <td class="text-center">{{$inv->training->training}}</td>
                                                        <td class="text-center">{{$inv->description}}</td>
                                                        <td class="text-center">{{ date_format(new DateTime($inv->datefrom) ,'d-m-Y') }}</td>
                                                        <td class="text-center">{{ date_format(new DateTime($inv->dateto) ,'d-m-Y') }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    @else
                                        <div class="row text-center">
                                            <p>No Training Program Invited</p>
                                        </div>
                                    @endif
                                    <div style="text-align: center">
                                        {!! $trainingInvite->links() !!}
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
