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
                <li class="breadcrumb-current-item"> Leave Type Listings </li>
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
                                <span class="panel-title hidden-xs"> Leave Type Lists </span>
                            </div>
                            <div class="panel-body pn">
                                @include('inc.messages')
                                {!! Form::open(['class' => 'form-horizontal']) !!}
                                <div class="table-responsive">
                                    <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                        <thead>
                                        <tr class="bg-light">
                                            <th class="text-center">Id</th>
                                            <th class="text-center">Leave Type</th>
                                            <th class="text-center">Description</th>
                                            @if(Auth::user()->isAdmin())
                                            <th class="text-center">Actions</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i =0;?>
                                        @if(count($leave) > 0)
                                            @foreach($leave as $lev)
                                        <tr>
                                            <td class="text-center">{{$i+=1}}</td>
                                            <td class="text-center">{{$lev->leave_type}}</td>
                                            <td class="text-center">{{$lev->description}}</td>
                                            @if(Auth::user()->isAdmin())
                                            <td class="text-center">
                                                <div class="btn-group text-right">
                                                    <button type="button"
                                                            class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                                            data-toggle="dropdown" aria-expanded="false"> Action
                                                        <span class="caret ml5"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li>
                                                            <a href="/leaves/{{ $lev->id }}/edit">Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="/delete-leave-type/{{ $lev->id }}">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                @else
                                    <p style="text-align: center">No Leave Type found</p>
                                @endif
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
