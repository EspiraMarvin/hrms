@extends('inc.base')

@section('content')

    <section id="content" class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading text-center">
                            <span class="panel-title"> Employees Contract Renewal List  </span>
                        </div>
                        <div class="table-responsive mt15">
                            <table id="example" class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                <thead>
                                <tr class="bg-light">
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Contract</th>
                                    <th class="text-center">Renewed Date</th>
                                    <th class="text-center">Due Time(Yrs)</th>
                                    <th class="text-center">Due Time(Days)</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i =0;?>
                                @if(isset($contracts))
                                    @foreach ($contracts as $cont)
                                        <tr>
                                            <td class="text-center">{{$i+=1}}</td>
                                            <td class="text-center">{{isset($cont->name) ? $cont->name:''}}</td>
                                            <td class="text-center">{{isset($cont->contract) ? $cont->contract:''}}</td>
                                            <td class="text-center">{{isset($cont->renewed_at) ? $cont->renewed_at:''}}</td>
                                            <td class="text-center">{{isset($cont->diffInYears) ? $cont->diffInYears:''}}</td>
                                            <td class="text-center">{{isset($cont->diffInDays) ? $cont->diffInDays:''}}</td>
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

    </script>

@endsection


