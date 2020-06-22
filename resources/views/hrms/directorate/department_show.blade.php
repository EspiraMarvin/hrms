@extends('inc.base')

@section('content')

    <section id="content" class="animated fadeIn">
        <div class="row">

            <div class="col-md-3">
                <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading text-center">
                            <span class="panel-title">{{isset($department->department)?$department->department:''}} Department</span>
                        </div>
                        <div class="panel-body pn pb5 text-center">

                        </div>
                        <p class="text-center no-margin"><span class="text-muted">Directorate:</span> {{isset($department->directorate->name) ? $department->directorate->name:''}}</p>
                        <p class="small text-center no-margin"><span class="text-muted">Department:</span> {{isset($department->department) ? $department->department:''}}</p>
                        <p class="small text-center no-margin"><span class="text-muted">Description:</span> {{isset($department->description) ? $department->description:''}}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                    <div class="box box-success">
                        <div class="panel">
                            <div class="panel-heading text-center">
                                <span class="panel-title"> Department Members Lists [Total No. {{$count}}] </span>
                            </div>
                            <div class="table-responsive mt15">
                                <table id="example" class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                    <thead>
                                    <tr class="bg-light">
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Supervisor</th>
                                        <th class="text-center">Targets</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i =0;?>
                                    @if(count($members) > 0)
                                        @foreach ($members as $member)
                                            <tr>
                                                <td class="text-center">{{$i+=1}}</td>
                                                <td class="text-center">
                                                    <a href="/employee/{{$member->id}}" style="text-decoration: none">
                                                        {{$member->name}}</a>
                                                </td>
                                                <td class="text-center">
                                                    @if(isset($member->roles[0]->role) != 'Supervisor')
                                                        {{isset($emp->roles[0]->role) ? $emp->roles[0]->role:''}}
                                                    @else
                                                        {{isset($member->roles[1]->role) ? $member->roles[1]->role:''}}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a style="text-decoration: none"
                                                       href="/supervisedBy_list/{{isset($member->user->supervisedBy[0]->id) ? $member->user->supervisedBy[0]->id:''}}/">
                                                        {{isset($member->user->supervisedBy[0]->name) ? $member->user->supervisedBy[0]->name:''}}</a></td>
                                                <td class="text-center">
                                                    <a href="/memberTarget/{{$member->id}}" style="text-decoration: none">
                                                        Targets</a>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                    <div class="row text-center">
                                        <p>No Members to show</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <script>
        // Basic example
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

@endsection

