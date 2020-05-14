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
                        <a href=""> Assigned Target </a>
                    </li>
                    <li class="breadcrumb-current-item"> Target Assignment Listings</li>
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
                                    <span class="panel-title hidden-xs"> Target Assignment Listings </span>
                                </div>
                                <div class="panel-body pn">
                                    @include('inc.messages')
                                    {!! Form::open(['class' => 'form-horizontal']) !!}
                                    <div class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Targets</th>
                                                <th class="text-center">Date of Assignment</th>
                                                <th class="text-center">Expected Review Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0;?>
                                            @if(count($targets) > 0)
                                                @foreach($targets as $tar)
                                                    <tr>
                                                        <td class="text-center">{{$i+=1}}</td>
                                                        <td class="text-center">{{$tar->targets}}</td>
                                                        <td class="text-center">{{date_format(new DateTime($tar->assigned_date), 'd-m-Y')}}</td>
                                                        <td class="text-center">{{date_format(new DateTime($tar->review_date), 'd-m-Y')}}</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    @else
                                        <div class="row text-center">
                                            <p>No Targets to show</p>
                                        </div>
                                    @endif
                                    {!! Form::close() !!}
                                </div>
                                <div style="text-align: center">
                                    {!! $targets->links() !!}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
