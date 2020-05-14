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
                        <a href=""> Awards </a>
                    </li>
                    <li class="breadcrumb-current-item"> Awards Listings </li>
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
                                    <span class="panel-title hidden-xs"> My Awards list </span>
                                </div>
                                <div class="panel-body pn">
                                    @include('inc.messages')

                                    <div class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Employee</th>
                                                <th class="text-center">Award</th>
                                                <th class="text-center">Date Awarded</th>
                                                <th class="text-center">Reason</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php $i =0;?>
                                            @if(count($awards) > 0)
                                                @foreach($awards as $award)
                                                    <tr>
                                                        <td class="text-center">{{$i+=1}}</td>
                                                        <td class="text-center">{{$award->employee->name}}</td>
                                                        <td class="text-center">{{$award->award->award}}</td>
                                                        <td class="text-center">{{date_format(new DateTime($award->date), 'd-m-Y')}}</td>
                                                        <td class="text-center">{{$award->reason}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                    @else
                                        <div class="row text-center">
                                            <p>No Awards Awarded.&nbsp; Stay Motivated !</p>
                                        </div>
                                    @endif
                                    <div class="row text-center">
                                        {{$awards->links()}}
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

