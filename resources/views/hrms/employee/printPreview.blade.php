@extends('inc.base')

@section('content')
    <div class="content">

        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn">

            <!-- -------------- Column Center -------------- -->
            <div class="chute chute-center">

                <div class="row">
                    <div class="text-center" style="margin-top: -40px">
                        <div class="text-center mb20">
                            <p style="font-size: 20px">
                                <img src="/assets/img/favicon-96x96.png" height="60" width="60"> &nbsp; &nbsp;
                                <b>ICT AUTHORITY</b>

                                <b>EMPLOYEES LIST</b>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="box box-success">
                            <div class="panel">
                                <div class="panel-body pn" style="margin-top: -10px">
                                    <div style="margin-top: -5px" class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">PF No.</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Role</th>
                                                <th class="text-center">Supervisors</th>
                                                <th class="text-center">Department</th>
                                                <th class="text-center">Duty Station</th>
                                                <th class="text-center">Date Posted</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0;?>
                                                @foreach($employees as $emp)
                                                    <tr>
                                                        <td class="text-center">{{$i+=1}}</td>
                                                        <td class="text-center">{{$emp->pf_number}}</td>
                                                        <td class="text-center">{{$emp->name}}</td>
                                                        <td class="text-center">
                                                            @if(isset($emp->roles[1]->role))
                                                                {{isset($emp->roles[1]->role) ? $emp->roles[1]->role:''}}
                                                            @elseif(!isset($emp->roles[1]->role))
                                                                {{isset($emp->roles[0]->role) ? $emp->roles[0]->role:''}}
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                                {{isset($emp->user->supervisedBy[0]->name) ? $emp->user->supervisedBy[0]->name:''}}
                                                            <hr style="margin-top: 5px;margin-bottom: 5px">
                                                                {{isset($emp->user->supervisedBy[1]->name) ? $emp->user->supervisedBy[1]->name:''}}
                                                            </a>
                                                        </td>
{{--                                                        <td class="text-center">{{isset($emp->user->supervisedBy[0]->name) ? $emp->user->supervisedBy[0]->name:''}}</td>--}}
                                                        <td class="text-center">{{isset($emp->department->department) ? $emp->department->department:''}}</td>
                                                        <td class="text-center">{{isset($emp->duty_station) ? $emp->duty_station:''}}</td>
                                                        <td class="text-center">{{date_format(new DateTime($emp->posted_date), 'd-m-Y')}}</td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>




    {{--    print script--}}
    <script>
        $(document).ready(function () {
            $('.btnprn').printPage();
        })
    </script>
@endsection


