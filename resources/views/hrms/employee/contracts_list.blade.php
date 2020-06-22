@extends('inc.base')

@section('content')

    <section id="content" class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading text-center">
                            <span class="panel-title"> Employees Under Contracts Total No.
                                @if($contractsNumber > 0){{($contractsNumber)}}@endif
                            </span>
                        </div>
                        <div class="table-responsive mt15">
                            <table id="example" class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                <thead>
                                <tr class="bg-light">
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Contract</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i =0;?>
                                @if(count($employees) > 0)
                                    @foreach ($employees as $cont)
                                        <tr>
                                            <td class="text-center">{{$i+=1}}</td>
                                            <td class="text-center"><a style="text-decoration: none" href="/employee/{{$cont->user_id}}">{{$cont->name}}</a>
                                            </td>
                                            <td class="text-center">{{$cont->employment_type}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
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

        // Basic example
        $(document).ready(function() {
            $('#example1').DataTable();
        } );
    </script>
    <script>

    </script>

@endsection


