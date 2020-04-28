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
                        <a href=""> Employees </a>
                    </li>
                    <li class="breadcrumb-current-item"> Employee Manager</li>
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
                                    <span class="panel-title hidden-xs">Employee Lists (No. {{$totalEmployee}})</span>
                                </div>
                                <br/>

                                <div class="panel-menu allcp-form theme-primary mtn">
                                    <div class="row">
                                        <form action="/employee_search" method="GET" role="search">
                                            {{ csrf_field() }}
                                            <div class="col-md-6">
                                                <input type="text" class="typeahead form-control"
                                                       placeholder="Search any column" style="height:40px" value=""
                                                       name="q" autocomplete="off">
                                            </div>

                                            <div class="col-md-2">
                                                <input type="submit" value="Search" name="button"
                                                       class="btn btn-primary">
                                            </div>

                                            <div class="col-md-2 mt-4">
                                                <input type="reset" value="Reset" class="btn btn-warning">
                                            </div>

                                            <div class="col-md-2">
                                                <a class="btn btn-success" href="employee_manager/export">EXPORT</a>
                                            </div>
                                        </form>

                                    </div>
                                </div>


                                <div class="panel-body pn">
                                    @include('inc.messages')


                                    {{--                                    <button onclick="myFunction()" >Click Me</button>--}}

                                    {{-- <div style="display:none;" id="myDIV">
                                         This is my DIV element.
                                     </div>--}}


                                    <div class="table-responsive">
                                        <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                            <thead>
                                            <tr class="bg-light">
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Code</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Role</th>
                                                <th class="text-center">Date Joined</th>
                                                <th class="text-center">Supervisor</th>
                                                <th class="text-center">Mobile Number</th>
                                                <th class="text-center">Department</th>
                                                <th class="text-center">Duty Station</th>
                                                <th class="text-center">Date Posted</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0;?>
                                            @if(count($employee ?? '') > 0)
                                                @foreach($employee ?? '' as $emp)
                                                    <tr>
                                                        <td class="text-center">{{$i+=1}}</td>
                                                        <td class="text-center">{{$emp->code}}</td>
                                                        <td class="text-center">
                                                            <a href="/employee/{{$emp->id}}"> {{$emp->name}}</a>
                                                        </td>
                                                        <td class="text-center">{{$emp->userrole->role->role}}</td>
                                                        <td class="text-center">{{date_format(new DateTime($emp->date_of_joining), 'd-m-Y')}}</td>
                                                        <td class="text-center">{{$emp->supervisor}}</td>
                                                        <td class="text-center">{{$emp->phone_number}}</td>
                                                        <td class="text-center">{{$emp->department}}</td>
                                                        <td class="text-center">{{$emp->duty_station}}</td>
                                                        <td class="text-center">{{date_format(new DateTime($emp->posted_date), 'd-m-Y')}}</td>
                                                        {{--  <td class="text-center">
                                                                  <button onclick="myFunction()" type="button"
                                                                          class="btn btn-info br2 btn-xs fs12 dropdown-toggle daily_goal_activity"
                                                                          data-toggle="dropdown" aria-expanded="false">
                                                                      Action
                                                                  </button>
                                                              <div id="myDIV" class="col-md-12" style="display:none;">
                                                                  <span style="display: inline;margin-top: 5px">
                                                                      <a href="/employee/{{$emp->id}}/edit">
                                                                           <button type="button" class="btn btn-info br2 btn-xs fs12"
                                                                                   data-toggle="modal" data-target="#edit">Edit
                                                                           </button></a>
                                                                            <button type="button" class="btn btn-danger br2 btn-xs fs12"
                                                                                    data-depid={{$emp->id}} data-dir={{$emp->directorate}}
                                                                                        data-toggle="modal" data-target="#delete">Delete
                                                                            </button>
                                                                  </span>
                                                              </div>--}}

                                                        {{-- <span style="display: inline;">
                                                             <div id="myDIV" style="display:none;" class="dropdown" role="group" aria-label="...">
                                                                 <a href="/employee/{{$emp->id}}/edit">
                                                                     <button type="button" class="btn btn-info br2 btn-xs fs12"
                                                                             data-toggle="modal" data-target="#edit">
                                                                         Edit
                                                                     </button></a>
                                                                 <button type="button" class="btn btn-danger br2 btn-xs fs12"
                                                                         data-depid={{$emp->id}} data-dir={{$emp->directorate}}
                                                                             data-toggle="modal" data-target="#delete">Delete
                                                                             </button>
                                                             </div>
                                                         </span>--}}
                                                        {{--                                                        </td>--}}

                                                        <td class="text-center">
                                                            <span style="display: inline">
                                                            <div class="dropdown" role="group" aria-label="...">
                                                                <button type="button" class="btn btn-info br2 btn-xs fs12"

                                                                        data-toggle="modal" data-target="#edit">Edit</button>
                                                                <button type="button" class="btn btn-danger br2 btn-xs fs12"
                                                                        data-awardid={{$emp->id}} data-myaward="{{$emp->name}}"
                                                                        data-toggle="modal" data-target="#delete">Delete</button>
                                                            </div>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="12">
                                                        {!! $employee->render() !!}
                                                    </td>
                                                </tr>
                                            @else
                                                <p style="text-align: center">No Employees Found</p>
                                            @endif
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

    {{-- <div id="myDIV" style="display:none;" class="dropdown" role="group" aria-label="...">
         <a href="/department/{{$emp->id}}/edit">
             <button type="button" class="btn btn-info br2 btn-xs fs12"
                     data-toggle="modal" data-target="#edit">
                 Edit
             </button></a>
         <button type="button" class="btn btn-danger br2 btn-xs fs12"
                 data-depid={{$emp->id}} data-dir={{$emp->directorate}}
                     data-toggle="modal" data-target="#delete">Delete</button>
     </div>
 --}}

    {{--    <span style="display: inline;">
            <input type="submit" value="Post"/> <input type="button" value="Cancel"/>
        </span>--}}

    {{--   <div id="myDIV" style="display:none;">
           <span style="display: inline;">
               <input type="submit" value="Post"/> <input type="button" value="Cancel"/>
           </span>
       </div>--}}

    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";
        $('input.typeahead').typeahead({
            source: function (query, process) {
                return $.get(path, {query: query}, function (data) {
                    return process(data);
                });
            }
        });
    </script>
    <script>
        function myFunction() {
            var element = document.body;
            element.classList.toggle("dark-mode");
        }
    </script>
    {{-- <script>
         function myFunction() {
             var x = document.getElementById("myDIV");

             if (x.style.display === "none") {
                 x.style.display = "block";
             } else {
                 x.style.display = "none";
             }
         }
     </script>
 --}}
    <script>
        /* var $daily = $('.daily_goal_activity li');

         $daily.first().addClass('current');


         $('#activity_toggle').click(function() {
             var $next = $daily.filter('.current').removeClass('current').next('li');

             if ($next.length === 0) {
                 $next = $daily.first();
             }

             $next.addClass('current');
         });*/

        /*var $daily = $('.daily_goal_activity li');
        $daily.first().addClass('current');

        $('#activity_toggle').click(function () {
            $daily.filter('.current')
                .removeClass('current')
                .next('li').addClass('current');
        });

        var $next = $daily.filter('.current')
            .removeClass('current')
            .next('li');

        if($next.length === 0) {
            $next = $daily.first();
        }

        $next.addClass('current');*/
    </script>

@endsection



