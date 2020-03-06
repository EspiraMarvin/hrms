@extends('inc.base')

@section('content')
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
                        <a href="/"> Department </a>
                    </li>
                    <li class="breadcrumb-current-item"> Department List</li>
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
                                    <span class="panel-title hidden-xs">Department List</span><br />
                                </div><br />
                                @include('inc.messages')

                                <div class="panel-body pn">
                                    <div class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Department</th>
                                                <th class="text-center">Directorate</th>
                                                <th class="text-center">Description</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i =0;?>
                                            @if(count($department) > 0)
                                                @foreach($department as $dep)
                                            <tr>
                                                <td class="text-center">{{$i+=1}}</td>
                                                <td class="text-center"><a href="/department/{{$dep->id}}"> {{$dep->name}}</a></td>
                                                <td class="text-center">{{$dep->directorate}}</td>
                                                <td class="text-center">{{$dep->description}}</td>
                                                <td class="text-center">
                                                    <div class="btn-group text-right">
                                                        <button type="button"
                                                                class="btn btn-info br2 btn-xs fs12 dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="false"> Action
                                                            <span class="caret ml5"></span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li>
                                                                <a href="/department/{{$dep->id}}/edit">Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="/delete-dep/{{$dep->id}}">Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                                @endforeach

                                            <tr><td colspan="10">
                                                    {!! $department->render() !!}
{{--                                                    {{$department->links()}}--}}
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                        @else
                                        <div class="row text-center">
                                            <h2>No departments to show</h2>
                                        </div>
                                        @endif
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
