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

                                <b>ASSETS LIST</b>
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
                                                <th class="text-center">Asset</th>
                                                <th class="text-center">Serial Number</th>
                                                <th class="text-center">Description</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0;?>
                                            @foreach($assets as $ass)
                                                <tr>
                                                    <td class="text-center">{{$i+=1}}</td>
                                                    <td class="text-center">{{$ass->asset}}</td>
                                                    <td class="text-center">{{$ass->serial_number}}</td>
                                                    <td class="text-center">{{$ass->description}}</td>
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



