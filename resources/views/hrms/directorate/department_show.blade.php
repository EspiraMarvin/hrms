@extends('inc.base')

@section('content')
    <a href="/department_list" class="btn btn-danger">Go Back</a>

    <section id="content" class="animated fadeIn">
        <div class="row">

            <div class="col-md-6">
                <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading text-center">
                            <span class="panel-title">{{isset($department->name)?$department->name:''}} Department</span>
                        </div>
                        <div class="panel-body pn pb5 text-center">

                        </div>
                        <p class="text-center no-margin"><span class="text-muted">Directorate:</span> {{isset($department->directorate) ? $department->directorate:''}}</p>
                        <p class="small text-center no-margin"><span class="text-muted">Department:</span> {{isset($department->name) ? $department->name:''}}</p>
                        <p class="small text-center no-margin"><span class="text-muted">Description:</span> {{isset($department->description) ? $department->description:''}}</p>
                    </div>
                   {{-- @if(isset($totalDep))
                        @foreach($totalDep as $dep)
                        <td>{{$dep->name}}</td>
                        @endforeach
                    @endif--}}
                </div>

            </div>

        </div>
    </section>

@endsection

